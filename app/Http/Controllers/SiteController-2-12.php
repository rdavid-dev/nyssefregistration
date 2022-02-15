<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
/* * ************Request***************** */
use App\Http\Requests\TeacherLoginRequest;
use App\Http\Requests\StudentRegistrationRequest;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
/* * ****************Model*********************** */
use App\RegistrationSetting;
use App\Event;
use App\EventSchedule;
use App\UserMaster;
use App\School;
use App\SchoolType;
use App\State;
use App\ParticipationFrom;

class SiteController extends Controller {

    public function index() {
        $data = [];
        $data['event'] = $event = Event::where('status', '1')->orderBy('created_at', 'DESC')->first();
        $data['participation'] = ParticipationFrom::where('status', '1')->get();
        if ($event != "") {
            $data['schedule'] = EventSchedule::where("event_id", $event->id)->where("status", "=", '1')->get();
            ;
        } else {
            $data['schedule'] = [];
        }
        $data['register_setting'] = RegistrationSetting::where('status', '1')->get();
        return view('site.index', $data);
    }
    
    public function get_register(){
        $data=[];
        $data['register_setting'] = RegistrationSetting::where('status', '1')->get();
        return view('site.register',$data);
    }

    public function teacher_registration() {
        return view('site.teacher_registration');
    }

    public function post_teacher_registration(Request $request) {
        // print_r($request->input());die();
        if ($request->ajax()) {
            $school_name = $request->input('school_name');
            $data = [];
            if ($school_name == "not") {
                $response = $this->check_teacher_form_with_school($request);
            } else {
                $response = $this->check_teacher_form($request);
            }
            if (isset($response['status']) && $response['status'] === 422) {
                $data['errors'] = $response['errors'];
                $data['status'] = "failed";
            } else {
                if ($school_name == "not") {
                    $event = Event::where('status', '1')->orderBy('created_at', 'DESC')->first();
                    if (count($event) > 0) {
                        $input1 = $request->input();
                        $input1['type_id'] = $request->input('school_type');
                        $input1['address_line1'] = $request->input('address');
                        $input1['status'] = '1';
                        $input1['created_at'] = Carbon::now()->toDateTimeString();
                        $school = School::create($input1);

                        $input = $request->input();
                        $input['event_id'] = $event->id;
                        $input['school_id'] = $school->id;
                        $input['type_id'] = "2";
                        $input['teacher_generated_code'] = $request->input('teacher_generated_code');
                        $input['phone'] = $request->input('phone_number');
                        $input['password'] = Hash::make($request->input("password"));
                        $input['ip_address'] = $request->ip();
                        $input['status'] = '1';
                        $input['created_at'] = Carbon::now()->toDateTimeString();
                        $user = UserMaster::create($input);

                        $school->created_by = $user->id;
                        $school->save();

                        $url = route('teacher-login');
                         $email_setting = $this->get_email_data('teacher_registration', array('NAME' => $user->first_name, 'LINK' =>$url));
                          // print_r($email_setting);die();
                          $email_data = [
                          'to' => $user->email,
                          'subject' => $email_setting['subject'],
                          'template' => 'signup',
                          'data' => ['message' => $email_setting['body']]
                          ];
                          $this->SendMail($email_data); 
                        $data['msg'] = "Successfully Submitted";
                        $data['link'] = $url;
                        $data['status'] = "success";
                    } else {
                        $data['errors'] = 'Sorry! currently no event is going on';
                        $data['status'] = 422;
                    }
                } else {
                    $event = Event::where('status', '1')->orderBy('created_at', 'DESC')->first();
                    if (count($event) > 0) {
                        $input = $request->input();
                        $input['event_id'] = $event->id;
                        $input['school_id'] = $school_name;
                        $input['type_id'] = "2";
                        $input['phone'] = $request->input('phone_number');
                        $input['password'] = Hash::make($request->input("password"));
                        $input['teacher_generated_code'] = $request->input('teacher_generated_code');
                        $input['ip_address'] = $request->ip();
                        $input['status'] = '1';
                        $input['created_at'] = Carbon::now()->toDateTimeString();
                        //$input['participation_at_our_fair']=$request->input("participation_at_our_fair");
                        $user = UserMaster::create($input);
                        $url = route('teacher-login');
                        $email_setting = $this->get_email_data('teacher_registration', array('NAME' => $user->first_name, 'LINK' =>$url));
                          // print_r($email_setting);die();
                          $email_data = [
                          'to' => $user->email,
                          'subject' => $email_setting['subject'],
                          'template' => 'signup',
                          'data' => ['message' => $email_setting['body']]
                          ];
                          $this->SendMail($email_data); 

                        $data['msg'] = "Successfully Submitted";
                        $data['link'] = $url;
                        $data['status'] = "success";
                    } else {
                        $data['errors'] = 'Sorry! currently no event is going on';
                        $data['status'] = 422;
                    }
                }
            }

            return response()->json($data);
        }
    }

    public function check_teacher_form_with_school($request) {
        $data = [];
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'email' => 'required|email|max:255',
                    'phone_number' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
                    'confirm_email' => 'required|same:email',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
                    'school_name' => 'required',
                    'participation_at_our_fair' => 'required',
                    'school_type' => 'required',
                    'name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required',
                    'district' => 'required',
                    'country' => 'required',
                    'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
                    'own_science_fair' => 'required',
                    'school_participation_at_our_fair' => 'required',
                    'teacher_generated_code' => 'required|unique:user_master|min:6|max:12',
                    'agree' => 'required'
        ]);

        $validator->after(function($validator)use ($request) {
            $checkUser = UserMaster::where('email', $request->input('email'))->where('type_id', '2')->where('event_id', $request->input('current_event_id'))->where('school_id', $request->input('school_name'))->where('status', '<>', '3')->first();
            if (count($checkUser) > 0) {
                $validator->errors()->add('email', 'This email already in use under current event and school.');
            }
        });


        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return $data;
    }

    /*
      public function check_login_form($request)
      {
      $data=[];
      $validator = Validator::make($request->all(), [
      'email' => 'required|max:255',
      'password' => 'required|min:6',
      'school_name' => 'required'
      ]);
      if ($validator->fails()) {
      $data['errors'] = $validator->errors()->getMessages();
      $data['status'] = 422;
      }
      return $data;
      } */

    public function check_teacher_form($request) {
        $data = [];
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:100',
                    'last_name' => 'required|max:100',
                    'email' => 'required|email|max:255',
                    'phone_number' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
                    'confirm_email' => 'required|same:email',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
                    'school_name' => 'required',
                    'participation_at_our_fair' => 'required',
                    'teacher_generated_code' => 'required|unique:user_master|min:6|max:12',
                    'agree' => 'required'
        ]);
        $validator->after(function($validator)use ($request) {
            $checkUser = UserMaster::where('email', $request->input('email'))->where('type_id', '2')->where('event_id', $request->input('current_event_id'))->where('school_id', $request->input('school_name'))->where('status', '<>', '3')->first();
            if (count($checkUser) > 0) {
                $validator->errors()->add('email', 'This email already in use under current event and school.');
            }
        });
        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return $data;
    }

    public function get_school() {
        $school = School::where('status', '1')->get();
        $data['status'] = "success";
        $data['content'] = view('site.school_name_list', compact("school"))->render();
        return response()->json($data);
    }

    public function get_school_type() {
        $school_type = SchoolType::where('status', '1')->get();
        $data['status'] = "success";
        $data['content'] = view('site.school_type_list', compact("school_type"))->render();
        return response()->json($data);
    }

    public function get_all_state() {
        $state = State::where('status', '1')->get();
        $data['status'] = "success";
        $data['content'] = view('site.state_list', compact("state"))->render();
        return response()->json($data);
    }

    public function teacher_login() {
        $data['school'] = School::where('status', '1')->get();
        return view("site.teacher_login", $data);
    }

    public function post_teacher_login(TeacherLoginRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            $input = $request->input(); //$request->only('email');
            $model = UserMaster::where('email', $input['email'])->where('type_id', '2')->where('event_id', $input['current_event_id'])->where('school_id', $input['school'])->where('status', '1')->first();

            /* if ($request->input('rememberMe') !== '') {
              $expire = time() + 172800;
              setcookie('sciencefair_teacher_email', $request->input('email'), $expire);
              setcookie('sciencefair_teacher_password', $request->input('password'), $expire);
              } else {
              $expire = time() - 172800;
              setcookie('sciencefair_teacher_email', '', $expire);
              setcookie('sciencefair_teacher_password', '', $expire);
              } */
            Auth::guard('frontend')->login($model);
            $model->last_login = Carbon::now()->toDateTimeString();
            $model->ip_address = request()->ip();
            $model->save();
            $request->session()->flash('success', 'You are successfully logged in.');
            $data_msg['link'] = Route('dashboard');
            return response()->json($data_msg);
        }
    }

    public function student_registration() {
        return view('site.student_registration');
    }

    public function post_verify_teacher_given_code(Request $request) {
        if ($request->ajax()) {
            $data = [];

            $validator = Validator::make($request->all(), [
                        'teacher_generated_code' => 'required|max:100',
            ]);
            $validator->after(function($validator)use ($request) {
                if (!empty($request->input('teacher_generated_code'))) {
                    $get_teacher_by_code = UserMaster::where('type_id', '=', '2')->where('event_id', '=', $request->input('event_id'))->where('teacher_generated_code', '=', $request->input('teacher_generated_code'))->first();

                    if (count($get_teacher_by_code) == 0) {
                        $validator->errors()->add('teacher_generated_code', 'This teacher code is not valid.');
                    }
                }
            });

            if ($validator->fails()) {
                $data['errors'] = $validator->errors()->getMessages();
                $data['status'] = 422;
            } else {
                $get_teacher = UserMaster::where('type_id', '=', '2')->where('event_id', '=', $request->input('event_id'))->where('teacher_generated_code', '=', $request->input('teacher_generated_code'))->first();
                $data['status'] = 200;
                $data['teacher_id'] = ($get_teacher->id) ? $get_teacher->id : '';
                $data['msg'] = 'Teacher code applied successfully.';
            }

            return response()->json($data);
        }
    }

    public function post_student_registration(StudentRegistrationRequest $request) {
        if ($request->ajax()) {
            $data = [];
            /* echo $request->input('phone').'***';
              $input = $request->except(['_token', 'confirm_email', 'confirm_password', 'agree']);
             */

            $user = new UserMaster;
            $user->type_id = '3';
            $user->event_id = $request->input('event_id');
            $user->teacher_id = $request->input('teacher_id');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->student_used_code = $request->input('teacher_generated_code');
            //$user->active_token = $this->rand_string(20);
            $user->ip_address = $request->ip();
            $user->status = '1';
            $user->created_at = Carbon::now()->toDateTimeString(); //date("Y-m-d H:i:s");
            $user->save();

            if (isset($user->id)) {
                $url = Route('student-login');
                $email_setting = $this->get_email_data('student_registration', array('NAME' => $user->first_name, 'LINK' =>$url));
                  // print_r($email_setting);die();
                  $email_data = [
                  'to' => $user->email,
                  'subject' => $email_setting['subject'],
                  'template' => 'signup',
                  'data' => ['message' => $email_setting['body']]
                  ];
                  $this->SendMail($email_data); 

                $data['msg'] = "Account created successfully";
                $data['link'] = $url;
                $data['status'] = "success";
            } else {
                $data['errors'] = 'Sorry! some problem is there. Please try again';
                $data['status'] = 422;
            }

            return response()->json($data);
        }
    }

    public function student_login() {
        $event = Event::where('status', '1')->orderBy('created_at', 'DESC')->first();
        if (count($event)) {
            $data['all_teachers'] = UserMaster::where('type_id', '2')->where('event_id', $event->id)->where('status', '1')->get();
            return view("site.student_login", $data);
        } else {
            return back();
        }
    }

    public function post_student_login(StudentLoginRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];

            $input = $request->input(); //$request->only('email');
            $model = UserMaster::where('email', $input['email'])->where('type_id', '3')->where('event_id', $input['current_event_id'])->where('teacher_id', $input['teacher'])->where('status', '1')->first();
            /* if ($request->input('rememberMe') !== '') {
              $expire = time() + 172800;
              setcookie('sciencefair_teacher_email', $request->input('email'), $expire);
              setcookie('sciencefair_teacher_password', $request->input('password'), $expire);
              } else {
              $expire = time() - 172800;
              setcookie('sciencefair_teacher_email', '', $expire);
              setcookie('sciencefair_teacher_password', '', $expire);
              } */
            Auth::guard('frontend')->login($model);
            $model->last_login = Carbon::now()->toDateTimeString();
            //$model->ip_address = $request()->ip();
            $model->save();
            $request->session()->flash('success', 'You are successfully logged in.');
            $data_msg['link'] = Route('dashboard');
            return response()->json($data_msg);
        }
    }

    public function logout() {
        Auth::guard('frontend')->logout();
        return redirect('/')->with('success', 'You are successfully logged out.');
    }

}
