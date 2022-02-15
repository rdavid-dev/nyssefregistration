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
use App\VolunteerPosition;

class VolunteerpositionController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::volunteerposition.index', $data);
    }

    public function get_volunteer_list_datatable()
    {
        $position_list = VolunteerPosition::where('status', '<>', '3');
        return Datatables::of($position_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('position_name', function ($model) {
                            return $model->position_name;
                        })
                        ->editColumn('position_description', function ($model) {
                            return $model->position_description;
                        })
                        ->editColumn('position_spots', function ($model) {
                            return $model->position_spots;
                        })
                        ->editColumn('position_date', function ($model) {
                            return date("d-M-Y", strtotime($model->position_date));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updatevolunteerposition', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteposition(this);" data-href="' . Route("admin-deletepotion", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_volunteerposition()
    {
        return view('admin::volunteerposition.add');
    }

    public function post_volunteerposition(Request $request)
    {
        $model = new VolunteerPosition;
        $validator = Validator::make($request->all(), [
            'position_name' => 'required',
            'position_spot' =>'required',
            'position_date' =>'required',
            'position_start_time' =>'required',
            'position_end_time' =>'required',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            
            $model->position_name=$request->input('position_name');
            $model->position_description=$request->input('description');
            $model->position_spots=$request->input('position_spot');
            $model->position_start_time=date("H:s", strtotime($request->input('position_start_time')));
            $model->position_end_time=date("H:s", strtotime($request->input('position_end_time')));
            $model->position_date=date("Y-m-d", strtotime($request->input('position_date')));
            $model->status=$request->input("status");
            $model->save();
            $request->session()->flash('success', 'Volunteer Position added successfully.');
            return redirect()->route('admin-volunteer-positions');
        }else{
            return redirect()->route('admin-addvolunteerposition')->withErrors($validator)->withInput();
        }
    }

    public function get_update(Request $request,$id)
    {
        $data = [];
        $data['model'] = $model = VolunteerPosition::findOrFail($id);
        if(count($model) > 0)
        {
            return view('admin::volunteerposition.update', $data);
        }else{
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-volunteer-positions');
        }
    }

    public function post_update(Request $request,$id)
    {
        $model = VolunteerPosition::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'position_name' => 'required',
            'position_spot' =>'required',
            'position_date' =>'required',
            'position_start_time' =>'required',
            'position_end_time' =>'required',
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
            
            $model->position_name=$request->input('position_name');
            $model->position_description=$request->input('description');
            $model->position_spots=$request->input('position_spot');
            $model->position_start_time=date("H:s", strtotime($request->input('position_start_time')));
            $model->position_end_time=date("H:s", strtotime($request->input('position_end_time')));
            $model->position_date=date("Y-m-d", strtotime($request->input('position_date')));
            $model->status=$request->input("status");
            $model->save();
            $request->session()->flash('success', 'Registration Setting Updated successfully.');
            return redirect()->route('admin-volunteer-positions');
        }else{
            return redirect()->route('admin-updatevolunteerposition',['id' => $id])->withErrors($validator)->withInput();
        }
    }

    public function delete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = VolunteerPosition::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Volunteer Position deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-volunteer-positions');
    }

}
