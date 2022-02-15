<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Carbon\Carbon;
/* * ************Request***************** */
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\TeacherLoginRequest;
use App\Http\Requests\StudentRegistrationRequest;
use App\Http\Requests\JudgeRegistrationRequest;
use App\Http\Requests\VolunteerRegistrationRequest;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
/* * ****************Model*********************** */
use App\RegistrationSetting;
use App\Event;
use App\EventSchedule;
use App\UserMaster;
use App\UserDetail;
use App\School;
use App\SchoolType;
use App\State;
use App\ParticipationFrom;
use App\DivisionCategory;
use App\QualificationDegree;
use App\VolunteerPosition;
use App\ContactUs;

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
	
	public function get_contact_page(){
		$data = [];
		$data['event'] = $event = Event::where('status', '1')->orderBy('created_at', 'DESC')->first();
		
        return view('site.contact', $data);
	}
	
	public function post_contact(ContactUsRequest $request) {
        if ($request->ajax()) {
            $data = [];
			
            $admin_email = \App\Settings::where('slug', '=', 'contact_email')->first();
            			
			$contact = new ContactUs;
			$contact->name = $request->input('name');
			$contact->email = $request->input('email');
			$contact->phone_no = $request->input('phone_no');
			//$contact->subject = $request->input('subject');
			$contact->message = $request->input('message');
			$contact->created_at = Carbon::now()->toDateTimeString();
			$contact->save();				
			
			if (isset($contact->id)) {
                $email_setting = $this->get_email_data('contact_us', array('ADMIN' => "Admin", 'NAME' => $contact->name, 'EMAIL' => $contact->email, 'PHONE' => ($contact->phone_no != "") ? $contact->phone_no : 'Not Provided', 'MESSAGE' => $contact->message));
                $email_data = [
                    'to' => $admin_email->value,
                    'subject' => $email_setting['subject'],
                    'template' => 'contact_us',
                    'data' => ['message' => $email_setting['body']]
                ];
				
                $this->SendMail($email_data);
				
				$url = Route('contact-us');
                $data['status'] = "success";
                $data['msg'] = 'Thank you for contacting us. We will Contact you soon.';
                $data['link'] = $url;
            } else {
                $data['errors']['message'] = 'Sorry! some problem is there. Please try again';
                $data['status'] = 422;
            }			
			
            return response()->json($data);
        }
    }
    
    public function get_register(){
        $data=[];
        $data['register_setting'] = RegistrationSetting::where('status', '1')->where('under_tab', 'teacher_student')->get();
        return view('site.register',$data);
    }

    public function get_judge_volunteer()
    {
        $data=[];
        $data['register_setting'] = RegistrationSetting::where('status', '1')->where('under_tab', 'judge_volunteer')->get();
        return view('site.judge_volunteer',$data);
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
                    'county' => 'required',
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
            $model = UserMaster::where('email', $input['email'])->where('type_id', '2')->where('event_id', $input['current_event_id'])->where('school_id', $input['school'])->where('status', '<>', '3')->first();
			
			if (count($model) == 1) {
				if (Hash::check($request->input('password'), $model->password)) {
					if ($model->status == '0') {
						$data_msg['type'] = "failure";
						$data_msg['error']['password'] = "Your account is not activated. Please verify your email first.";
					} else if ($model->status == '2') {
						$data_msg['type'] = "failure";
						$data_msg['error']['password'] = "Your account is suspended. Please contact to admin.";
					} else {
						/*if ($request->input('rememberMe') != '') {
							$expire = time() + 172800;
							setcookie('familyties_user_email', $request->input('email'), $expire, '/');
							setcookie('familyties_user_password', $request->input('password'), $expire, '/');
						} else {
							$expire = time() - 172800;
							setcookie('familyties_user_email', '', $expire, '/');
							setcookie('familyties_user_password', '', $expire, '/');
						}*/
						
						Auth::guard('frontend')->login($model);
						$model->last_login = Carbon::now()->toDateTimeString();
						$model->ip_address = request()->ip();
						$model->save();
						$data_msg['type'] = "success";
						$data_msg['link'] = Route('dashboard');
						$request->session()->flash('success', 'You are successfully logged in.');
					}
				} else {
					$data_msg['type'] = "failure";
					$data_msg['error']['password'] = "Incorrect Email or Password.";
				}
			} else {
				$data_msg['type'] = "failure";
				$data_msg['error']['password'] = "User not found. Please sign up to login.";
			}
			
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
            $model = UserMaster::where('email', $input['email'])->where('type_id', '3')->where('event_id', $input['current_event_id'])->where('teacher_id', $input['teacher'])->where('status', '<>', '3')->first();
            
			if (count($model) == 1) {
				if (Hash::check($request->input('password'), $model->password)) {
					if ($model->status == '0') {
						$data_msg['type'] = "failure";
						$data_msg['error']['password'] = "Your account is not activated. Please verify your email first.";
					} else if ($model->status == '2') {
						$data_msg['type'] = "failure";
						$data_msg['error']['password'] = "Your account is suspended. Please contact to admin.";
					} else {						
						Auth::guard('frontend')->login($model);
						$model->last_login = Carbon::now()->toDateTimeString();
						$model->ip_address = request()->ip();
						$model->save();
						$data_msg['type'] = "success";
						$data_msg['link'] = Route('dashboard');
						$request->session()->flash('success', 'You are successfully logged in.');
					}
				} else {
					$data_msg['type'] = "failure";
					$data_msg['error']['password'] = "Incorrect Email or Password.";
				}
			} else {
				$data_msg['type'] = "failure";
				$data_msg['error']['password'] = "User not found. Please sign up to login.";
			}
            return response()->json($data_msg);
        }
    }
	
	public function judge_registration(){
		$data['degrees'] = QualificationDegree::where('status', '1')->get();
		$data['categories'] = DivisionCategory::where('status', '1')->get();
		return view('site.judge_registration', $data);
	}
	
	public function post_judge_registration(JudgeRegistrationRequest $request) {
        if ($request->ajax()) {
            $data = [];			
			
            /* echo $request->input('phone').'***';
              $input = $request->except(['_token', 'confirm_email', 'confirm_password', 'agree']);
             */

            $user = new UserMaster;
            $user->type_id = '4';
            $user->event_id = $request->input('event_id');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->gender = $request->input('gender');
            $user->participation_at_our_fair = $request->input('participation_at_our_fair');
            //$user->active_token = $this->rand_string(20);
            $user->ip_address = $request->ip();
            $user->status = '1';
            $user->created_at = Carbon::now()->toDateTimeString(); //date("Y-m-d H:i:s");
            $user->save();

            if (isset($user->id)) {
				$userdetail = new UserDetail;
				$userdetail->user_id = $user->id;
				$userdetail->degree = $request->input('degree');
				$userdetail->dietary_restrictions = $request->input('dietary_restrictions');
				$userdetail->is_retired = ($request->input('is_retired')) ? $request->input('is_retired') : '0';
				$userdetail->organization = $request->input('organization');
				$userdetail->require_parking_pass = ($request->input('require_parking_pass')) ? $request->input('require_parking_pass') : '0';
				$userdetail->judge_any_category = ($request->input('judge_any_category')) ? $request->input('judge_any_category') : '0';
				$userdetail->judge_category_1 = $request->input('judge_category_1');
				$userdetail->judge_category_2 = $request->input('judge_category_2');
				$userdetail->judge_category_3 = $request->input('judge_category_3');
				$userdetail->study_field = $request->input('study_field');
				$userdetail->experience_in_study_field = ($request->input('experience_in_study_field')) ? $request->input('experience_in_study_field') : '';
				$userdetail->created_at = Carbon::now()->toDateTimeString();
				$userdetail->save();
				
                $url = ''; //Route('student-login');
                $email_setting = $this->get_email_data('user_registration', array('NAME' => $user->first_name, 'LINK' =>$url));
                  // print_r($email_setting);die();
                  $email_data = [
                  'to' => $user->email,
                  'subject' => $email_setting['subject'],
                  'template' => 'signup',
                  'data' => ['message' => $email_setting['body']]
                  ];
                $this->SendMail($email_data); 

                $data['msg'] = "Account created successfully";
                //$data['link'] = $url;
                $data['status'] = "success";
            } else {
                $data['errors'] = 'Sorry! some problem is there. Please try again';
                $data['status'] = 422;
            }

            return response()->json($data);
        }
    }
	
	public function volunteer_registration(){
		$data['model'] = VolunteerPosition::where('status', '1')->get();
		return view('site.volunteer_registration', $data);
	}
	
	public function post_volunteer_registration(VolunteerRegistrationRequest $request) {
        if ($request->ajax()) {
            $data = [];			
			
            /* echo $request->input('phone').'***';
              $input = $request->except(['_token', 'confirm_email', 'confirm_password', 'agree']);
             */

            $user = new UserMaster;
            $user->type_id = '5';
            $user->event_id = $request->input('event_id');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->gender = $request->input('gender');
            $user->participation_at_our_fair = $request->input('participation_at_our_fair');
            //$user->active_token = $this->rand_string(20);
            $user->ip_address = $request->ip();
            $user->status = '1';
            $user->created_at = Carbon::now()->toDateTimeString(); //date("Y-m-d H:i:s");
            $user->save();

            if (isset($user->id)) {
				$userdetail = new UserDetail;
				$userdetail->user_id = $user->id;
				$userdetail->hear_about_us = $request->input('hear_about_us');
				$userdetail->recommendations = $request->input('recommendations');
				$userdetail->positions = ($request->input('positions')) ? serialize($request->input('positions')) : '';
				$userdetail->created_at = Carbon::now()->toDateTimeString();
				$userdetail->save();
				
                $url = ''; //Route('student-login');
                $email_setting = $this->get_email_data('user_registration', array('NAME' => $user->first_name, 'LINK' =>$url));
                  // print_r($email_setting);die();
                  $email_data = [
                  'to' => $user->email,
                  'subject' => $email_setting['subject'],
                  'template' => 'signup',
                  'data' => ['message' => $email_setting['body']]
                  ];
                $this->SendMail($email_data); 

                $data['msg'] = "Account created successfully";
                //$data['link'] = $url;
                $data['status'] = "success";
            } else {
                $data['errors'] = 'Sorry! some problem is there. Please try again';
                $data['status'] = 422;
            }

            return response()->json($data);
        }
    }

    public function logout() {
        Auth::guard('frontend')->logout();
        return redirect('/')->with('success', 'You are successfully logged out.');
    }

	public function get_forgot_password() {
        $data = [];
        $data['school'] = School::where('status', '1')->get();
        return view('site.forgot_password', $data);
    }

    public function post_forgot_password(ForgotRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
            
            $event_id = $request->input('event_id');
            $user_type = $request->input('user_type');
            $school_id=$request->input('school');
            $email = $request->input('email');
            if($user_type!='3')
            {
                $model = UserMaster::where('email', '=', $email)->where('type_id', '=', $user_type)->where('school_id','=',$school_id)->where('event_id', '=', $event_id)->where('status', '=', '1')->first();
            }else{
                $model = UserMaster::where('email', '=', $email)->where('type_id', '=', $user_type)->where('school_id','=',$school_id)->where('event_id', '=', $event_id)->where('status', '=', '1')->first();
            }
            
			if(count($model)>0){
				$model->reset_password_token = $this->rand_string(20);
				$model->ip_address = $request->ip();
				$model->save();
				
				$link = '<a href = "' . Route('reset-password', ['id' => base64_encode($model->id), 'token' => $model->reset_password_token]) . '" style = "text-decoration: none;">Click here</a>';
				$email_setting = $this->get_email_data('user_forgot_password', array('NAME' => $model->first_name, 'LINK' => $link));
				$email_data = [
					'to' => $model->email,
					'subject' => $email_setting['subject'],
					'template' => 'forgot_password',
					'data' => ['message' => $email_setting['body']]
                ];				
				$this->SendMail($email_data);
				
				$data_msg['status'] = 'success';
				$data_msg['msg'] = 'Your reset password link has been sent to your email.';
				//$data_msg['link'] = Route('verify', ['id' => base64_encode($model->id)]);
				//$request->session()->flash('success', 'Your reset password link has been sent to your email');
			} else {
                $data_msg['errors'] = 'Sorry! some problem is there. Please try again';
                $data_msg['status'] = 422;
            }
            
            return response()->json($data_msg);
        }
    }

    public function get_reset_password() {
        $id=$_GET['id'];
        $token=$_GET['token'];
        if ($id == "" && $token == "") {
            return redirect()->route('index')->with('error', 'oops!something went wrong in this url.');
        }
        $id = base64_decode($id);
        $model = UserMaster::where('id', $id)->where('reset_password_token', $token)->first();
        if (count($model) == 0) {
            return redirect()->route('index')->with('error', 'oops!something went wrong in this url.');
        } else {
            Session::put('user_id', $id);
            Session::put('forgot_token', $token);
            $data = [];
            return view('site.reset_password', $data);
        }
    }

    public function post_reset_password(ResetRequest $request) {
        if ($request->ajax()) {
            $data_msg = [];
         
            $user_id = Session::get('user_id');
            $forgot_token = Session::get('forgot_token');
            $model = UserMaster::where([['id', '=', $user_id], ['reset_password_token', '=', $forgot_token]])->first();
            if (count($model) > 0) {                
                $model->password = Hash::make($request->password);
                $model->reset_password_token = NULL;
				$model->ip_address = $request->ip();
				$model->updated_at = Carbon::now()->toDateTimeString();
                $model->save();
				
                Session::remove('user_id');
                Session::remove('forgot_token');
				
                $data_msg['msg'] = 'Your password changed successfully.';
                $data_msg['link'] = Route('index');
                $data_msg['status'] = 'success';                
            }else{
				$data_msg['errors'] = 'Sorry! some problem is there. Please try again';
                $data_msg['status'] = 422;
			}
            return response()->json($data_msg);
        }
    }
}
