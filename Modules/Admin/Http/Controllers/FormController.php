<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Validator;
use URL;
use File;
use Yajra\Datatables\Datatables;

use App\Form;

class FormController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::form.index', $data);
    }

    public function admin_form_list_datatable()
    {
        $position_list = Form::where('status', '<>', '3');
        return Datatables::of($position_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('form_name', function ($model) {
                            return $model->form_name;
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y h:i A", strtotime($model->created_at));
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updateform', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteForm(this);" data-href="' . Route("admin-deleteform", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>'
                                    . '<a href="'.URL::asset("public/uploads/frontend/isef_forms/".$model->form_filename).'" download class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="Dowbload">'
                                    . '<i class="fa fa-download"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_form()
    {
        return view('admin::form.add');
    }

    public function post_form(Request $request)
    {
        $model = new Form;
        $validator = Validator::make($request->all(), [
            'form_name' => 'required',
            'form_upload' =>'required|mimes:pdf,doc,docx',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            $model->form_name=$request->input('form_name');
            $img_name = $this->rand_string(12) . '.' . $request->file('form_upload')->getClientOriginalExtension();
            $file = $request->file('form_upload');
            $file->move(public_path('uploads/frontend/isef_forms/'), $img_name);
            $model->form_filename = $img_name;
            $model->status=$request->input("status");
            $model->created_at=date('Y-m-d H:i:s');
            $model->save();
            $request->session()->flash('success', '2020 Form added successfully.');
            return redirect()->route('admin-form');
        }else{
            return redirect()->route('admin-addform')->withErrors($validator)->withInput();
        }
    }

    public function get_update(Request $request,$id)
    {
        $data = [];
        $data['model'] = $model = Form::findOrFail($id);
        if(count($model) > 0)
        {
            return view('admin::form.update', $data);
        }else{
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-form');
        }
    }

    public function post_update(Request $request,$id)
    {
        $model = Form::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'form_name' => 'required',
            'form_upload' =>'mimes:pdf,doc,docx',
            'status' => 'required'
        ]);

        if ($validator->passes()) {
            $model->form_name=$request->input('form_name');
            if ($request->file('form_upload')) {
                if(file_exists(public_path('uploads/frontend/isef_forms/'.$model->form_filename)))
                {
                    File::delete(public_path('uploads/frontend/isef_forms/' . $model->form_filename));
                }
                $img_name = $this->rand_string(12) . '.' . $request->file('form_upload')->getClientOriginalExtension();
                $file = $request->file('form_upload');
                $file->move(public_path('uploads/frontend/isef_forms/'), $img_name);
                $model->form_filename = $img_name;
            }
            $model->status=$request->input("status");
            $model->updated_at=date('Y-m-d H:i:s');
            $model->save();
            $request->session()->flash('success', 'Form Updated successfully.');
            return redirect()->route('admin-form');
        }else{
            return redirect()->route('admin-updateform',['id' => $id])->withErrors($validator)->withInput();
        }
    }

    public function delete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = Form::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', '2020 Form deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-form');
    }

}
