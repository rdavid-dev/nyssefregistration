<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\UserMaster;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Event;
use App\School;
use App\Division;

class DivisionController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        return view('admin::division.index');
    }

    public function get_divisions_list_datatable() {
        $division_list = Division::where('status', '<>', '3');
        return Datatables::of($division_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('name', function ($model) {
                            return $model->name;
                        })
                        ->editColumn('description', function ($model) {
                            return $model->description;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y h:i A", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            /* if ($model->status == '0') {
                              $status = '<span class="label label-sm label-warning">Inactive</span>';
                              } else if ($model->status == '1') {
                              $status = '<span class="label label-sm label-success">Active</span>';
                              } else if ($model->status == '2') {
                              $status = '<span class="label label-sm label-danger">Suspended</span>';
                              } else {
                              $status = '';
                              }
                              return $status; */
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-viewdivision', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>'
                                    . '<a href="' . Route('admin-updatedivision', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteDivision(this);" data-href="' . Route("admin-deletedivision", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view(Request $request, $id) {
        $data = [];
        $data['model'] = $model = Division::findOrFail($id);
        if (!empty($model) && $model->status != '3') {
            return view('admin::division.view', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-division');
        }
    }

    public function add_division() {
        return view('admin::division.add');
    }

    public function post_add_division(Request $request) {
        $model = new Division;
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'description' => 'required',
                    'status' => 'required'
        ]);

        if ($validator->passes()) {
            $model->name = $request->input('name');
            $model->description = $request->input('description');
            $model->status = $request->input('status');
            $model->created_at = date('Y-m-d H:i:s');
            $model->save();

////            $link = '<a href = "' . Route('active-account', ['id' => base64_encode($model->id), 'token' => $model->active_token]) . '" style = "text-decoration: none;">Click Here</a>';
//            $email_setting = $this->get_email_data('new_account_create', array('NAME' => $model->first_name, 'EMAIL' => $model->email, 'PASSWORD' => $password));
//            $email_data = [
//                'to' => $model->email,
//                'subject' => $email_setting['subject'],
//                'template' => 'signup',
//                'data' => ['message' => $email_setting['body']]
//            ];
//            $this->SendMail($email_data);

            $request->session()->flash('success', 'Division added successfully.');
            return redirect()->route('admin-division');
        }
        return redirect()->route('admin-adddivision')->withErrors($validator)->withInput();
    }

    public function get_update(Request $request, $id) {
        $data = [];
        $data['model'] = $model = Division::findOrFail($id);
        if (!empty($model) && $model->status != '3') {
//            $data['all_country'] = MetaLocation::where('type', '=', "CO")->where('Status', '=', '1')->orderBy('local_name', 'ASC')->get();
            return view('admin::division.update', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-division');
        }
    }

    public function post_update(Request $request, $id) {
        $data = [];
        $model = Division::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'status' => 'required'
        ]);
        if ($validator->passes()) {
            $model->description = $request->input('description');
            $model->status = $request->input('status');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            $request->session()->flash('success', 'Details updated successfully.');
            return redirect()->route('admin-division');
        }
        return redirect()->route('admin-updatedivision', ['id' => $id])->withErrors($validator)->withInput();
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = Division::findOrFail($_GET['id']);
            if (!empty($model) && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Division deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-division');
    }

}
