<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/* * ************Request***************** */
use App\Http\Requests\TeacherEventRegistrationRequest;
use App\Http\Requests\BroadcomRegistrationRequest;
/* * ****************Model*********************** */
use App\UserMaster;
use App\EventTeacherParticipants;
use App\EventParticipants;
use App\School;
use App\SchoolType;
use App\State;
use App\Division;
use App\Event;
use App\EventSchedule;
use App\Form;
use App\EventUploadedForm;

class RegistrationController extends Controller {

    public function teacher_event_registration() {
        $data = [];
        $phones = [];
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('type_id', '=', '2')->where('status', '<>', '3')->first();

        if (empty($data['model'])) {
            return redirect('/');
        }

        return view('registration.teacher_event_registration', $data);
    }

    private function broadcom_array($request) {
        if ($request->input('broadcom_judging') == "yes") {
            $array = array();
            if (($request->has('broadcom_category3'))) {
                $demo = array();
                $demo['option'] = $request->input('broadcom_category3');
                $demo['preference'] = ($request->has('broadcom_preference3')) ? $request->input('broadcom_preference3') : null;
                $array[] = $demo;
            }
            if ($request->has('broadcom_category1')) {
                $demo = array();
                $demo["option"] = $request->input('broadcom_category1');
                $demo["preference"] = ($request->has('broadcom_preference1')) ? $request->input('broadcom_preference1') : null;
                $array[] = $demo;
            }
            if ($request->has('broadcom_category2')) {
                $demo = array();
                $demo["option"] = $request->input('broadcom_category2');
                $demo["preference"] = ($request->has('broadcom_preference3')) ? $request->input('broadcom_preference2') : null;
                $array[] = $demo;
            }
            return $array;
        } else {
            return null;
        }
    }

    private function andromeda_array($request) {
        if ($request->input('andromeda_judging') == "yes") {
            $array = array();
            if (($request->has('andromeda_category1'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category1');
                $demo['preference'] = ($request->has('andromeda_preference1')) ? $request->input('andromeda_preference1') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category2'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category2');
                $demo['preference'] = ($request->has('andromeda_preference2')) ? $request->input('andromeda_preference2') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category3'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category3');
                $demo['preference'] = ($request->has('andromeda_preference3')) ? $request->input('andromeda_preference3') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category4'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category4');
                $demo['preference'] = ($request->has('andromeda_preference4')) ? $request->input('andromeda_preference4') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category5'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category5');
                $demo['preference'] = ($request->has('andromeda_preference5')) ? $request->input('andromeda_preference5') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category6'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category6');
                $demo['preference'] = ($request->has('andromeda_preference6')) ? $request->input('andromeda_preference6') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category7'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category7');
                $demo['preference'] = ($request->has('andromeda_preference7')) ? $request->input('andromeda_preference7') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category8'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category8');
                $demo['preference'] = ($request->has('andromeda_preference8')) ? $request->input('andromeda_preference8') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category9'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category9');
                $demo['preference'] = ($request->has('andromeda_preference9')) ? $request->input('andromeda_preference9') : null;
                $array[] = $demo;
            }
            if (($request->has('andromeda_category10'))) {
                $demo = array();
                $demo['option'] = $request->input('andromeda_category10');
                $demo['preference'] = ($request->has('andromeda_preference10')) ? $request->input('andromeda_preference10') : null;
                $array[] = $demo;
            }
            return $array;
        } else {
            return null;
        }
    }

    public function post_teacher_event_registration(TeacherEventRegistrationRequest $request) {
        if ($request->ajax()) {
            $data = [];
            $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
            if (!empty($user_id)) {
                $event_id = Auth()->guard('frontend')->user()->event_id;

                $input = $request->except(['_token']);

                $input['user_id'] = $user_id;
                $input['event_id'] = $event_id;
                $input['isef_divisions'] = ($request->input('isef_divisions')) ? serialize($request->input('isef_divisions')) : '';
                //$input['andromeda_broadcom_judging'] = ($request->input('andromeda_broadcom_judging')) ? serialize($request->input('andromeda_broadcom_judging')) : '';
                // $input['andromeda_broadcom_judging'] = $request->input('andromeda_broadcom_judging');
                $broadcom_array = $this->broadcom_array($request);
                if (!empty($broadcom_array)) {
                    $input['broadcom_judging'] = serialize($broadcom_array);
                }
                $andromeda_array = $this->andromeda_array($request);
                if (!empty($andromeda_array)) {
                    $input['andromeda_judging'] = serialize($andromeda_array);
                }
                $input['ip_address'] = $request->ip();
                $input['status'] = '1';
                $input['created_at'] = Carbon::now()->toDateTimeString();

                $participant = EventTeacherParticipants::create($input);

                if (isset($participant->id)) {
                    $url = Route('dashboard');
                    $data['msg'] = "Registration form submitted successfully";
                    $data['link'] = $url;
                    $data['status'] = "success";
                } else {
                    $data['errors'] = 'Sorry! some problem is there. Please try again';
                    $data['status'] = 422;
                }
            } else {
                $data['errors'] = 'Sorry! You have to login first';
                $data['status'] = 422;
            }

            return response()->json($data);
        }
    }

    public function broadcom_registration() {
        $data = [];
        $phones = [];
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('type_id', '=', '3')->where('status', '<>', '3')->first();

        if (empty($data['model'])) {
            return redirect('/');
        }

        return view('registration.broadcom_registration', $data);
    }

    public function applicationFormUpload(Request $request) {
        if ($request->hasFile('signed_application_form')) {  //check the file present or not
            $user_last_name = Auth()->guard('frontend')->user()->last_name;
            $division = Division::where('id', $request->division_id)->where('status', '1')->first();
            $division_name = str_replace(' ', '_', $division->name);
            $fapplicationfile = $request->file('signed_application_form'); //get the file
            $name = $user_last_name . "_" . date('m_d_Y') . "_" . time() . "_" . $division_name . "." . $fapplicationfile->getClientOriginalExtension(); //get the  file extention


            $destinationPath = public_path('uploads/frontend/registration_form/'); //public path folder dir
            //$path = public_path('uploads/frontend/profile_picture/');
            //Image::make($fapplicationfile->getRealPath())->resize(200, 200)->save($path . 'preview/' . $name);
            //Image::make($fapplicationfile->getRealPath())->resize(100, 100)->save($path . 'thumb/' . $name);
            $fapplicationfile->move($destinationPath, $name);
            return $name;
        }
    }

    public function post_registration(BroadcomRegistrationRequest $request) {
        if ($request->ajax()) {
            $data = [];

            $user_id = Auth()->guard('frontend')->user()->id;
            $event_id = Auth()->guard('frontend')->user()->event_id;
            $teacher_id = Auth()->guard('frontend')->user()->teacher_id;

            $input = $request->except(['_token']);

            if ($request->hasFile('signed_application_form')) {
                $input['signed_application_form'] = $this->applicationFormUpload($request);
            }
            $input['user_id'] = $user_id;
            $input['event_id'] = $event_id;
            $input['teacher_id'] = $teacher_id;
            //$input['form_submitted_date'] = date('Y-m-d', strtotime($request->input('form_submitted_date')));
            $input['ip_address'] = $request->ip();
            $input['status'] = '1';
            $input['created_at'] = Carbon::now()->toDateTimeString();

            $participant = EventParticipants::create($input);

            if (isset($participant->id)) {
                $url = Route('dashboard');
                $data['msg'] = "Registration form submitted successfully";
                $data['link'] = $url;
                $data['status'] = "success";
            } else {
                $data['errors'] = 'Sorry! some problem is there. Please try again';
                $data['status'] = 422;
            }

            return response()->json($data);
        }
    }

    public function andromeda_registration() {
        $data = [];
        $phones = [];
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('type_id', '=', '3')->where('status', '<>', '3')->first();

        if (empty($data['model'])) {
            return redirect('/');
        }

        return view('registration.andromeda_registration', $data);
    }

    public function isef_registration() {
        $data = [];
        $phones = [];
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('type_id', '=', '3')->where('status', '<>', '3')->first();

        if (empty($data['model'])) {
            return redirect('/');
        }

        $event_id = Auth()->guard('frontend')->user()->event_id;
        $teacher_id = Auth()->guard('frontend')->user()->teacher_id;
        $event_participant = EventParticipants::where('user_id', $user_id)->where('event_id', $event_id)->where('teacher_id', $teacher_id)->where('division_id', '=', '1')->where('status', '<>', '3')->first();

        if (count($event_participant) > 0) {
            return redirect('isef-form-upload'); //view('registration.isef_form_upload', $data);
        } else {
            return view('registration.isef_registration', $data);
        }
    }

    public function isef_form_upload() {
        $data = [];
        $phones = [];
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('type_id', '=', '3')->where('status', '<>', '3')->first();

        if (empty($data['model'])) {
            return redirect('/');
        }

        $event_id = Auth()->guard('frontend')->user()->event_id;
        $teacher_id = Auth()->guard('frontend')->user()->teacher_id;
        $event_participant = EventParticipants::where('user_id', $user_id)->where('event_id', $event_id)->where('teacher_id', $teacher_id)->where('division_id', '=', '1')->where('status', '<>', '3')->first();

        if (count($event_participant) == 0) {
            return redirect('isef-registration');
        }

        $data['event_participant'] = $event_participant;
        $data['all_forms'] = Form::where('status', '1')->get();

        return view('registration.isef_form_upload', $data);
    }

    public function post_isef_form_upload(Request $request) {
        if ($request->ajax()) {

            $division_id = $request->input('division_id');
            $event_id = Auth()->guard('frontend')->user()->event_id;
            $user_id = Auth()->guard('frontend')->user()->id;
            $teacher_id = Auth()->guard('frontend')->user()->teacher_id;
            $event_participant = EventParticipants::where('user_id', $user_id)->where('event_id', $event_id)->where('teacher_id', $teacher_id)->where('division_id', '=', '1')->where('status', '<>', '3')->first();
            // $response = $this->check_isef_form_upload($request);
            // print_r($request->file());
            // die();
            $validator = Validator::make($request->all(), [
                        'signed_application_form.*.*' => 'mimes:doc,pdf,docx|max:20000',
                        'participation_proof_filename' => 'mimes:doc,pdf,docx|max:20000',
                        'isef_abstract_filename' => 'mimes:doc,pdf,docx|max:20000',
                        'isef_rules_wizard_filename' => 'mimes:doc,pdf,docx|max:20000',
                        'research_plan_filename' => 'mimes:doc,pdf,docx|max:20000',
                        'research_paper_filename' => 'mimes:doc,pdf,docx|max:5000',
                            ], [
                        //'signed_application_form.*.required' => 'Please upload an image',
                        'signed_application_form.*.*.mimes' => 'Only doc, docx, and pdf file types are allowed',
                        'signed_application_form.*.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
                            ]
            );
            if ($validator->fails()) {
                $data['errors'] = $validator->errors()->getMessages();
                $data['status'] = 422;
            } else {
                if ($request->file('signed_application_form')) {
                    foreach ($request->file('signed_application_form') as $key => $file) {
                        $model = new EventUploadedForm;
                        $name = $this->rand_string(12) . '.' . $file[0]->getClientOriginalExtension();
                        $file[0]->move(public_path('uploads/frontend/user_isef_forms/'), $name);
                        $model->uploaded_filename = $name;
                        $model->user_id = $user_id;
                        $model->event_id = $event_id;
                        $model->teacher_id = $teacher_id;
                        $model->division_id = $division_id;
                        $model->form_id = $key;
                        $model->status = '1';
                        $model->created_at = Carbon::now()->toDateTimeString();
                        $model->event_participation_id = $event_participant->id;
                        $model->save();
                    }
                }
                if ($request->hasFile('participation_proof_filename')) {
                    $file = $request->file('participation_proof_filename');
                    $name = $this->rand_string(12) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/frontend/user_isef_forms/'), $name);
                    $event_participant->participation_proof_filename = $name;
                    $event_participant->updated_at = Carbon::now()->toDateTimeString();
                    $event_participant->save();
                }
                if ($request->hasFile('isef_abstract_filename')) {
                    $file = $request->file('isef_abstract_filename');
                    $name = $this->rand_string(12) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/frontend/user_isef_forms/'), $name);
                    $event_participant->isef_abstract_filename = $name;
                    $event_participant->updated_at = Carbon::now()->toDateTimeString();
                    $event_participant->save();
                }
                if ($request->hasFile('isef_rules_wizard_filename')) {
                    $file = $request->file('isef_rules_wizard_filename');
                    $name = $this->rand_string(12) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/frontend/user_isef_forms/'), $name);
                    $event_participant->isef_rules_wizard_filename = $name;
                    $event_participant->updated_at = Carbon::now()->toDateTimeString();
                    $event_participant->save();
                }
                if ($request->hasFile('research_plan_filename')) {
                    $file = $request->file('research_plan_filename');
                    $name = $this->rand_string(12) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/frontend/user_isef_forms/'), $name);
                    $event_participant->research_plan_filename = $name;
                    $event_participant->updated_at = Carbon::now()->toDateTimeString();
                    $event_participant->save();
                }
                if ($request->hasFile('research_paper_filename')) {
                    $file = $request->file('research_paper_filename');
                    $name = $this->rand_string(12) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/frontend/user_isef_forms/'), $name);
                    $event_participant->research_paper_filename = $name;
                    $event_participant->updated_at = Carbon::now()->toDateTimeString();
                    $event_participant->save();
                }
                $data['msg'] = " ISEF File successfully Uploaded";
                //$data['link'] = $url;
                $data['status'] = "success";
            }

            return response()->json($data);
        }
    }

    public function check_isef_form_upload($request) {
        $data = [];
        $validator = Validator::make($request->all(), [
                    'signed_application_form.*' => 'mimes:pdf,doc|max:20000'
        ]);
        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return $data;
    }

}
