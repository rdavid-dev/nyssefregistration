<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Validator;

use App\School;
use App\SchoolType;
use App\State;

class SchoolController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::school.index', $data);
    }

    public function admin_school_list_datatable()
    {
        $school_list = School::where('status', '<>', '3');
        return Datatables::of($school_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('name', function ($model) {
                            return $model->name;
                        })
                        ->editColumn('city', function ($model) {
                            return $model->city;
                        })
                        ->editColumn('phone', function ($model) {
                            return $model->phone;
                        })
                        ->editColumn('address', function ($model) {
                            return $model->address;
                        })
                        ->editColumn('type_id', function ($model) {
                            $type=SchoolType::where('id',$model->type_id)->first();
                            return $type->type;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("Y-m-d H:i:s", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updateschool', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteSchool(this);" data-href="' . Route("admin-deleteschool", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_school()
    {
        $data=[];
        $data['types']=SchoolType::where('status','1')->get();
        $data['states']=State::where('status','1')->get();
        return view('admin::school.add',$data);
    }

    public function post_school(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'district' => 'required',
            'county' => 'required',
            'phone' => 'required',
            'own_science_fair' => 'required',
            'school_participation_at_our_fair' => 'required',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            $input = $request->input();
            $input['type_id']=$request->input('type');
            $input['address_line1']=$request->input('address');
            School::create($input);
            $request->session()->flash('success', 'School added successfully.');
            return redirect()->route('admin-school');
        }else{
            return redirect()->route('admin-addschool')->withErrors($validator)->withInput();
        }
    }

    public function update_school(Request $request,$id)
    {
        $data=[];
        $data['types']=SchoolType::where('status','1')->get();
        $data['states']=State::where('status','1')->get();
        $data['school']=School::findOrFail($id);
        return view('admin::school.update',$data);
    }

    public function post_updateschool(Request $request,$id)
    {
        $model = School::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'district' => 'required',
            'county' => 'required',
            'phone' => 'required',
            'own_science_fair' => 'required',
            'school_participation_at_our_fair' => 'required',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            $input = $request->input();
            $input['type_id']=$request->input('type');
            $input['address_line1']=$request->input('address');
            $model->update($input);
            $request->session()->flash('success', 'School Updated successfully.');
            return redirect()->route('admin-school');
        }else{
            return redirect()->route('admin-updateschool',['id' => $id])->withErrors($validator)->withInput();
        }
    }

    public function schooldelete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = School::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'School deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-school');
    }

}
