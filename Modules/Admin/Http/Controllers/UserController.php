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

class UserController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        $data['user_type'] = $user_type = isset($_GET['user_type']) ? $_GET['user_type'] : "";
        $data['first_name'] = $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : "";
        $data['last_name'] = $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : "";
        $data['email'] = $email = isset($_GET['email']) ? $_GET['email'] : "";
        $data['phone'] = $phone = isset($_GET['phone']) ? $_GET['phone'] : "";
        $data['status'] = $status = isset($_GET['status']) ? $_GET['status'] : "";
        $data['search_filter'] = isset($_GET['search_filter']) ? $_GET['search_filter'] : "";

        if ($user_type != "") {
            if ($user_type == 'visa_agent') {
                $query = UserMaster::where('type_id', '=', '2');
            } else if ($user_type == 'travel_agent') {
                $query = UserMaster::where('type_id', '=', '3');
            } else if ($user_type == 'customer') {
                $query = UserMaster::where('type_id', '=', '4');
            } else {
                $query = UserMaster::where('type_id', '<>', '1');
            }
        } else {
            $query = UserMaster::where('type_id', '<>', '1');
        }
        if ($first_name != "") {
            $query->where('first_name', 'like', '%' . $first_name . '%');
        }
        if ($last_name != "") {
            $query->where('last_name', 'like', '%' . $last_name . '%');
        }
        if ($email != "") {
            $query->where('email', 'like', '%' . $email . '%');
        }
        if ($phone != "") {
            $query->where('phone', 'like', '%' . $phone . '%');
        }
        if ($status != "") {
            if ($status == 'inactive') {
                $query->where('status', '=', '0');
            } else if ($status == 'active') {
                $query->where('status', '=', '1');
            } else if ($status == 'suspended') {
                $query->where('status', '=', '2');
            } else {
                $query->where('status', '<>', '3');
            }
        } else {
            $query->where('status', '<>', '3');
        }
        $query->orderBy('id', 'DESC');
        $model = $query->paginate(10);
        $data['model'] = $model;
        //return view('admin::user.index', $data);
        return view('admin::user.index');
    }

    public function get_users_list_datatable() {
        $user_list = UserMaster::where('type_id', '<>', '1')->where('status', '<>', '3');
        return Datatables::of($user_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('type_id', function ($model) {
                            if ($model->type_id == '2') {
                                $type_id = '<span class="label label-sm label-success">Advicer</span>';
                            } else if ($model->type_id == '3') {
                                $type_id = '<span class="label label-sm label-info">Customer</span>';
                            } else {
                                $type_id = '';
                            }
                            return $type_id;
                        })
                        ->editColumn('first_name', function ($model) {
                            return $model->first_name;
                        })
                        ->editColumn('last_name', function ($model) {
                            return $model->last_name;
                        })
                        ->editColumn('email', function ($model) {
                            return $model->email;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("Y-m-d H:i:s", strtotime($model->created_at));
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
                            $action_html = '<a href="' . Route('admin-viewuser', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>'
                                    . '<a href="' . Route('admin-updateuser', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteUser(this);" data-href="' . Route("admin-deleteuser", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view(Request $request, $id) {
        $data = [];
        $data['model'] = $model = UserMaster::findOrFail($id);
        if (count($model) > 0 && $model->status != '3') {
            return view('admin::user.view', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-users');
        }
    }

    public function add_user() {
        return view('admin::user.add');
    }

    public function post_add_user(Request $request) {
        $model = new UserMaster;
        $validator = Validator::make($request->all(), [
                    'type_id' => 'required',
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'email' => 'required|email|max:255',
                    'phone' => 'numeric|digits_between:10,15',
                    'dob' => 'required|date_format:m/d/Y|before:' . date('m/d/Y'),
                    'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request, $model) {
            $checkUser = UserMaster::where('email', $request->email)->where('status', '<>', '3')->first();
            if (count($checkUser) > 0) {
                $validator->errors()->add('email', 'Email already in use.');
            }
        });

        if ($validator->passes()) {
            $password = $this->rand_string(6);
            $model->type_id = $request->input('type_id');
            $model->first_name = $request->input('first_name');
            $model->last_name = $request->input('last_name');
            $model->email = $request->input('email');
            $model->password = Hash::make($password);
            $model->phone = ($request->input('phone') != "") ? $request->input('phone') : NULL;
            $model->dob = date("Y-m-d", strtotime($request->input('dob')));
            $model->active_token = $this->rand_string(20);
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

            $request->session()->flash('success', 'User added successfully.');
        }
        return redirect()->route('admin-adduser')->withErrors($validator)->withInput();
    }

    public function get_update(Request $request, $id) {
        $data = [];
        $data['model'] = $model = UserMaster::findOrFail($id);
        if (count($model) > 0 && $model->status != '3') {
//            $data['all_country'] = MetaLocation::where('type', '=', "CO")->where('Status', '=', '1')->orderBy('local_name', 'ASC')->get();
            return view('admin::user.update', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-users');
        }
    }

    public function post_update(Request $request, $id) {
        $data = [];
        $model = UserMaster::findOrFail($id);
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'email' => 'required|email|max:255',
                    'phone' => 'numeric|digits_between:10,15',
                    'dob' => 'required|date_format:m/d/Y|before:' . date('m/d/Y'),
        ]);
        $validator->after(function($validator)use ($request, $model) {
            $checkUser = UserMaster::where('id', '<>', $model->id)->where('email', $request->input('email'))->where('status', '<>', '3')->first();
            if (count($checkUser) > 0) {
                $validator->errors()->add('email', 'Email already in use.');
            }
            if ($model->type_id === '2') {
                if ($request->input('shop_name') == "") {
                    $validator->errors()->add('shop_name', 'Shop name field is required.');
                } else if (strlen($request->input('shop_name')) > 250) {
                    $validator->errors()->add('shop_name', 'Shop name not to be greater than 250 character.');
                }
                if ($model->shop_image === NULL && !$request->hasFile('shop_image')) {
                    $validator->errors()->add('shop_image', 'Shop image field is required.');
                }
            }
        });
        if ($validator->passes()) {
            $model->first_name = $request->input('first_name');
            $model->last_name = $request->input('last_name');
            $model->email = $request->input('email');
            $model->phone = ($request->input('phone') != "") ? $request->input('phone') : NULL;
            $model->dob = date("Y-m-d", strtotime($request->input('dob')));
            if ($model->type_id === '2') {
                $model->shop_name = ucfirst($request->input('shop_name'));
                if ($request->hasFile('shop_image')) {
                    $model->shop_image = $this->ShopImageUpload($request);
                }
            }
            $model->status = $request->input('status');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            $request->session()->flash('success', 'Details updated successfully.');
        }
        return redirect()->route('admin-updateuser', ['id' => $id])->withErrors($validator)->withInput();
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = UserMaster::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'User deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-users');
    }

    function ShopImageUpload(Request $request) {
        if ($request->hasFile('shop_image')) {  //check the file present or not
            $image = $request->file('shop_image'); //get the file
            $name = $this->rand_string(15) . time() . '.' . $image->getClientOriginalExtension(); //get the  file extention
            $destinationPath = public_path('uploads/frontend/shop/original/'); //public path folder dir
            $path = public_path('uploads/frontend/shop/');
            Image::make($image->getRealPath())->resize(200, 200)->save($path . 'preview/' . $name);
            Image::make($image->getRealPath())->resize(100, 100)->save($path . 'thumb/' . $name);
            $image->move($destinationPath, $name);
            return $name;
        }
    }

}
