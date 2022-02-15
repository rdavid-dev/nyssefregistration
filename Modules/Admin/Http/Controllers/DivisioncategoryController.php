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
use App\DivisionCategory;

class DivisioncategoryController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        return view('admin::divisionCategory.index');
    }

    public function get_divisioncategories_list_datatable() {
        $division_list = DivisionCategory::where('status', '<>', '3');
        return Datatables::of($division_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('division_id', function ($model) {
                            $division=Division::findOrFail($model->division_id);
                            return $division->name;
                        })
                        ->editColumn('category_code', function ($model) {
                            return $model->category_code;
                        })
                        ->editColumn('category_name', function ($model) {
                            return $model->category_name;
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
                            $action_html = '<a href="' . Route('admin-updatedivisioncategory', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteDivisioncategory(this);" data-href="' . Route("admin-deletedivisioncategory", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
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

    public function add_divisioncategory() {
        $data['division']=Division::where("status",'1')->get();
        return view('admin::divisionCategory.add',$data);
    }

    public function post_divisioncategory(Request $request) {
        $model = new DivisionCategory;
        $validator = Validator::make($request->all(), [
                    'division_name' => 'required',
                    'name' => 'required',
                    'code' => 'required',
                    'status' => 'required'
        ]);

        if ($validator->passes()) {
            $model->category_name = $request->input('name');
            $model->division_id = $request->input('division_name');
            $model->category_code = $request->input('code');
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

            $request->session()->flash('success', 'Division Category added successfully.');
            return redirect()->route('admin-division-category');
        }
        return redirect()->route('admin-adddivisioncatyegory')->withErrors($validator)->withInput();
    }

    public function get_update(Request $request, $id) {
        $data = [];
        $data['division']=Division::where("status",'1')->get();
        $data['model'] = $model = DivisionCategory::select('division_categories.*','divisions.name')->join('divisions','divisions.id',"=","division_categories.division_id")->where('division_categories.id',$id)->first();
        // print_r($data);die();
        if (!empty($model) && $model->status != '3') {
//            $data['all_country'] = MetaLocation::where('type', '=', "CO")->where('Status', '=', '1')->orderBy('local_name', 'ASC')->get();
            return view('admin::divisionCategory.update', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-division-category');
        }
    }

    public function post_update(Request $request, $id) {
        $data = [];
        $model = DivisionCategory::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'division_name' => 'required',
            'name' => 'required',
            'code' => 'required',
            'status' => 'required'
        ]);
        if ($validator->passes()) {
            $model->category_name = $request->input('name');
            $model->division_id = $request->input('division_name');
            $model->category_code = $request->input('code');
            $model->status = $request->input('status');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            $request->session()->flash('success', 'Details updated successfully.');
            return redirect()->route('admin-division-category');
        }
        return redirect()->route('admin-updatedivisioncategory', ['id' => $id])->withErrors($validator)->withInput();
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = DivisionCategory::findOrFail($_GET['id']);
            if (!empty($model) && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Division Category deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-division-category');
    }

}
