<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Validator;
use Yajra\Datatables\Datatables;

use App\Event;
use App\RegistrationSetting;

class RegistrationsettingController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::registrationsetting.index', $data);
    }

    public function admin_registrations_list_datatable()
    {
        $event_list = RegistrationSetting::where('status', '<>', '3');
        return Datatables::of($event_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('title', function ($model) {
                            return $model->title;
                        })
                        ->editColumn('started_at', function ($model) {
                            return date("d-M-Y", strtotime($model->started_at));
                        })
                        ->editColumn('closed_at', function ($model) {
                            return (($model->closed_at)?date("d-M-Y", strtotime($model->closed_at)):"n/a");
                        })
                        ->editColumn('final_revision_closed_at', function ($model) {
                            return (($model->final_revision_closed_at)?date("d-M-Y", strtotime($model->final_revision_closed_at)):"n/a");
                        })
                        ->editColumn('registration_status', function ($model) {
                            return $model->registration_status;
                        })
                        ->editColumn('under_tab', function ($model) {
                            return $model->under_tab;
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updateregistersetting', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deletesetting(this);" data-href="' . Route("admin-deletesetting", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_registersetting()
    {
        return view('admin::registrationsetting.add');
    }

    public function post_registersetting(Request $request)
    {
        $model = new RegistrationSetting;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'closed_at' => 'required',
            'registration_status' => 'required',
            'show_link' => 'required',
            'under_tab' => 'required',
            'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request, $model) {
            if ($request->input('show_link')=="1") {
                if($request->input('link')=="")
                {
                    $validator->errors()->add('link', 'Registration Link field is required.');
                }
            }
        });

        if ($validator->passes()) {
            
            $model->title=$request->input('title');
            $model->description=$request->input('description');
            $model->notes=$request->input('note');
            $model->registration_link=$request->input('link');
            $model->show_registration_link=$request->input('show_link');
            $model->under_tab=$request->input('under_tab');
            $model->started_at=date("Y-m-d", strtotime($request->input('started_at')));
            $model->closed_at=date("Y-m-d", strtotime($request->input('closed_at')));
            if($request->input('final_revision_closed_at')!=""){
                $model->final_revision_closed_at=date("Y-m-d", strtotime($request->input('final_revision_closed_at')));
            }
            $model->registration_status=$request->input('registration_status');
            $model->status=$request->input("status");
            $model->save();
            $request->session()->flash('success', 'Registration Setting added successfully.');
            return redirect()->route('admin-registration-setting');
        }else{
            return redirect()->route('admin-addregistersetting')->withErrors($validator)->withInput();
        }
    }

    public function update_registersetting(Request $request,$id)
    {
        $data = [];
        $data['model'] = $model = RegistrationSetting::findOrFail($id);
        if(count($model) > 0)
        {
            return view('admin::registrationsetting.update', $data);
        }else{
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-registration-setting');
        }
    }

    public function post_update_registersetting(Request $request,$id)
    {
        $model = RegistrationSetting::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'closed_at' => 'required',
            'registration_status' => 'required',
            'show_link' => 'required',
            'under_tab' => 'required',
            'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request, $model) {
            if ($request->input('show_link')=="1") {
                if($request->input('link')=="")
                {
                    $validator->errors()->add('link', 'Registration Link field is required.');
                }
            }
        });

        if ($validator->passes()) {
            
            $model->title=$request->input('title');
            $model->description=$request->input('description');
            $model->notes=$request->input('note');
            $model->registration_link=$request->input('link');
            $model->show_registration_link=$request->input('show_link');
            $model->under_tab=$request->input('under_tab');
            $model->started_at=date("Y-m-d", strtotime($request->input('started_at')));
            if($request->input('closed_at')!=""){
                $model->closed_at=date("Y-m-d", strtotime($request->input('closed_at')));
            }else{
                $model->closed_at=null;
            }
            if($request->input('final_revision_closed_at')!=""){
                $model->final_revision_closed_at=date("Y-m-d", strtotime($request->input('final_revision_closed_at')));
            }else{
                $model->final_revision_closed_at=null;
            }
            $model->registration_status=$request->input('registration_status');
            $model->status=$request->input("status");
            $model->save();
            $request->session()->flash('success', 'Registration Setting Updated successfully.');
            return redirect()->route('admin-registration-setting');
        }else{
            return redirect()->route('admin-updateregistersetting',['id' => $id])->withErrors($validator)->withInput();
        }
    }

    public function delete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = RegistrationSetting::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Registration Setting deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-registration-setting');
    }

}
