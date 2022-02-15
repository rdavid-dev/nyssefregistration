<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Validator;
use File;
use Yajra\Datatables\Datatables;

use App\Event;
use App\RegistrationSetting;
use App\ParticipationFrom;

class ParticipationformController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::participationform.index', $data);
    }

    public function get_participation_list_datatable()
    {
        $event_list = ParticipationFrom::where('status', '<>', '3');
        return Datatables::of($event_list)
                        ->addIndexColumn()
                        ->editColumn('form_name', function ($model) {
                            return $model->form_name;
                        })
                        ->editColumn('form_description', function ($model) {
                            return $model->form_description;
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y h:i A", strtotime($model->created_at));
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updateparticipation', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteparticipation(this);" data-href="' . Route("admin-deleteparticipation", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_participation()
    {
        return view('admin::participationform.add');
    }

    public function post_participation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'form_file' => 'required|mimes:pdf,doc,docx',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            $model = new ParticipationFrom;
            $model->form_name=$request->input('name');
            $model->form_description=$request->input('description');
            $model->status=$request->input("status");
            if ($request->file('form_file')) {
                $img_name = $this->rand_string(12) . '.' . $request->file('form_file')->getClientOriginalExtension();
                $file = $request->file('form_file');
                $file->move(public_path('uploads/frontend/participation_file/'), $img_name);
                $model->form_filename= $img_name;
            }
            $model->save();
            $request->session()->flash('success', 'Participation Form added successfully.');
            return redirect()->route('admin-participationform');
        }else{
            return redirect()->route('admin-addparticipation')->withErrors($validator)->withInput();
        }
    }

    public function get_update(Request $request,$id)
    {
        $data = [];
        $data['model'] = $model = ParticipationFrom::findOrFail($id);
        if(count($model) > 0)
        {
            return view('admin::participationform.update', $data);
        }else{
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-participationform');
        }
    }

    public function post_update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'form_file' => 'mimes:pdf,doc,docx',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            $model = ParticipationFrom::findOrFail($id);
            $model->form_name=$request->input('name');
            $model->form_description=$request->input('description');
            $model->status=$request->input("status");
            if ($request->file('form_file')) {
                File::delete(public_path('uploads/frontend/participation_file/' . $model->form_filename));
                $img_name = $this->rand_string(12) . '.' . $request->file('form_file')->getClientOriginalExtension();
                $file = $request->file('form_file');
                $file->move(public_path('uploads/frontend/participation_file/'), $img_name);
                $model->form_filename= $img_name;
            }
            $model->save();
            $request->session()->flash('success', 'Participation Form Updated successfully.');
            return redirect()->route('admin-participationform');
        }else{
            return redirect()->route('admin-updateparticipation',['id' => $id])->withErrors($validator)->withInput();
        }
    }

    public function delete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = ParticipationFrom::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Participation Form deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-participationform');
    }

}
