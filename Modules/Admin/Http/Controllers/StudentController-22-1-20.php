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
use App\State;

class StudentController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        return view('admin::student.index');
    }

    public function get_students_list_datatable() {
        $event=Event::where("status",'1')->first();
        $user_list = UserMaster::where('type_id', '=', '3')->where('status', '<>', '3')->where('event_id',$event->id);
        return Datatables::of($user_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
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
                            return date("d-M-Y h:ia", strtotime($model->created_at));
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
                            $action_html = '<a href="' . Route('admin-viewstudent', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>'
                                    . '<a href="' . Route('admin-updatestudents', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteStudent(this);" data-href="' . Route("admin-deletestudent", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view(Request $request, $id) {
        $data = [];
        $data['model'] = $model = UserMaster::with('get_state')->findOrFail($id);
        $data['teacher']  = UserMaster::findOrFail($model->teacher_id);
        $data['state']=State::where("code",$model->state)->first();
        if (!empty($model) && $model->status != '3') {
            return view('admin::student.view', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-students');
        }
    }

    public function add_student() {
        return view('admin::student.add');
    }

    public function post_student(Request $request) {
        // print_r($request->input());die();
        $model = new UserMaster;
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'email' => 'required|email|max:255',
                    'phone' => 'numeric|digits:10|regex:/^([0-9\s\-\+\(\)]*)$/',
                    'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request, $model) {
            $checkUser = UserMaster::where('email', $request->email)->where('school_id',$request->school_id)->where('status', '<>', '3')->first();
            if (count($checkUser) > 0) {
                $validator->errors()->add('email', 'Email already in use.');
            }
        });

        if ($validator->passes()) {
            $password = $this->rand_string(8);
            $code = $this->rand_string(6);
            $model->type_id='3';
            $model->event_id=$request->input("event_id");
            $model->teacher_id=$request->input("teacher_id");
            $model->first_name = $request->input('first_name');
            $model->last_name = $request->input('last_name');
            $model->email = $request->input('email');
            $model->password = Hash::make($password);
            $model->phone=$request->input("phone");
            $model->active_token = $this->rand_string(20);
            $model->status = $request->input('status');
            $model->created_at = date('Y-m-d H:i:s');
            $model->created_by='1';
            $model->save();

////            $link = '<a href = "' . Route('active-account', ['id' => base64_encode($model->id), 'token' => $model->active_token]) . '" style = "text-decoration: none;">Click Here</a>';
           $email_setting = $this->get_email_data('student_registration_by_admin', array('NAME' => $model->first_name, 'EMAIL' => $model->email, 'PASSWORD' => $password));
        //    print_r($email_setting);die();
           $email_data = [
               'to' => $model->email,
               'subject' => $email_setting['subject'],
               'template' => 'signup',
               'data' => ['message' => $email_setting['body']]
           ];
           $this->SendMail($email_data);
           $data['link'] = route('admin-students');
            $data['status'] = "success";
            $request->session()->flash('success', 'Student added successfully.');
        }else{
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return response()->json($data);
    }

    public function get_update(Request $request, $id) {
        $data = [];
        $data['model'] = $model = UserMaster::findOrFail($id);
        $data['state']=State::where('status','1')->get();
        if (!empty($model) && $model->status != '3') {
//            $data['all_country'] = MetaLocation::where('type', '=', "CO")->where('Status', '=', '1')->orderBy('local_name', 'ASC')->get();
            return view('admin::student.update', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-students');
        }
    }

    public function post_update(Request $request, $id) {
        $data = [];
        $model = UserMaster::findOrFail($id);
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'phone' => 'required|numeric|digits:10',
                    'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request, $model) {
            $checkUser = UserMaster::where('id', '<>', $model->id)->where('email', $request->input('email'))->where('school_id',$request->school_id)->where('status', '<>', '3')->first();
            if (count($checkUser) > 0) {
                $validator->errors()->add('email', 'Email already in use.');
            }
        });
        if ($validator->passes()) {
            $model->first_name = $request->input('first_name');
            $model->last_name = $request->input('last_name');
            $model->gender = $request->input('gender');
            $model->address_line1 = $request->input('address');
            $model->city = $request->input('city');
            $model->state = $request->input('state');
            $model->zipcode = $request->input('zipcode');
            $model->county = $request->input('county');
            $model->phone = ($request->input('phone') != "") ? $request->input('phone') : NULL;
            $model->participation_at_our_fair = $request->input('participation_at_our_fair');
            $model->status = $request->input('status');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->updated_by='1';
            $model->save();
            $request->session()->flash('success', 'Details updated successfully.');
            return redirect()->route('admin-students');
        }
        return redirect()->route('admin-updatestudents', ['id' => $id])->withErrors($validator)->withInput();
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = UserMaster::findOrFail($_GET['id']);
            if (!empty($model) && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Student deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-students');
    }

    public function check_teacher_code_verify(Request $request)
    {
        $response = $this->check_teacher_generate_code($request);
        // print_r($response);die();
        if (isset($response['status']) && $response['status'] === 422) {
            $data['errors'] = $response['errors'];
            $data['status']="failed";
        } else {
            $code=$request->input("code");
            $event=Event::where('status','1')->first();
            $check=UserMaster::where('event_id',$event->id)->where('teacher_generated_code',$code)->where('status','1')->first();
            if(!empty($check))
            {
                $data['user'] = $check;
                $data['status']="success";
            }else{
                $data['msg'] = "Invalid Code";
                $data['status']="error";
            }
        }
        return response()->json($data);
    }

    public function check_teacher_generate_code($request)
    {
        $data=[];
        $validator = Validator::make($request->all(), [
            'code' =>'required'
        ]);
        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return $data;
    }

    public function export(Request $request)
    {
        $event=Event::where("status",'1')->first();
        $list = UserMaster::with('get_state')->where('status', '<>', '3')->where('type_id','3')->where('event_id',$event->id)->get();
        // print_r($list);die();
        if(count($list)>0)
        {
            $delimiter = ",";
            $filename = "Students-" . date('Y-m-d') . ".csv";
            
            //create a file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array('Name', 'Email', 'Phone','Gender','Address','City','State','Zip Code','County','Participation At Our Fair','Status' ,'Created At');
            fputcsv($f, $fields, $delimiter);
            //output each row of the data, format line as csv and write to file pointer
            for($i=0;$i<count($list);$i++){
                $lineData = array($list[$i]->first_name." ".$list[$i]->last_name, $list[$i]->email, $list[$i]->phone);
                $lineData[]=(($list[$i]->gender=="M")?"Male":(($list[$i]->gender=="F"?"Female":(($list[$i]->gender=="O"?"Other":"")))));
                $lineData[]=$list[$i]->address_line1;
                $lineData[]=$list[$i]->city;
                $lineData[]=(isset($list[$i]->get_state) && $list[$i]->get_state!="")?$list[$i]->get_state->name:"";
                $lineData[]=$list[$i]->zipcode;
                $lineData[]=$list[$i]->county;
                $lineData[]=(isset($list[$i]->participation_at_our_fair) && $list[$i]->participation_at_our_fair!="")?$list[$i]->participation_at_our_fair." Years":"";
                $lineData[]=(($list[$i]->status=='1')?"Active":(($list[$i]->status=='0')?"Inactive":"Suspended"));
                $lineData[]=date("d-m-Y h:ia",strtotime($list[$i]->created_at));
                fputcsv($f, $lineData, $delimiter);
            }
            
            //move back to beginning of file
            fseek($f, 0);
            
            //set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            
            //output all remaining data on a file pointer
            fpassthru($f);
        }else{
            $request->session()->flash('danger', 'Data not Found.');
            return redirect()->route('admin-students');
        }
        exit;
    }

}
