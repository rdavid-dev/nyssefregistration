<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
/* * ********Models*************** */
Use App\UserMaster;
use App\Event;
use App\Division;
use App\EventTeacherParticipants;
use App\EventParticipants;
use App\Form;
use App\EventUploadedForm;

class DashboardController extends Controller {

    public function dashboard() {
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('status', '<>', '3')->first();

        if (empty($model)) {
            return redirect('/');
        }

        if (Auth()->guard('frontend')->user()->type_id === '2') {

            if (empty($model->get_teacher_event_registration)) {
                return redirect('teacher-event-registration');
            }

            $data['all_divisions'] = Division::where('status', '1')->get();
            $data['total_registration'] = UserMaster::where(['teacher_id' => $user_id, 'status' => '1'])->count();
            $data['total_andromeda_registration'] = EventParticipants::where(['teacher_id' => $user_id, 'division_id' => 2, 'status' => '1'])->count();
            $data['total_broadcom_registration'] = EventParticipants::where(['teacher_id' => $user_id, 'division_id' => 3, 'status' => '1'])->count();
            $data['total_nyssef_registration'] = EventParticipants::where(['teacher_id' => $user_id, 'division_id' => 1, 'status' => '1'])->count();
        } elseif (Auth()->guard('frontend')->user()->type_id === '3') {
            $data['andromeda_registration'] = EventParticipants::select('created_at')->where(['user_id' => $user_id, 'division_id' => 2])->first();
            $data['broadcom_registration'] = EventParticipants::select('created_at')->where(['user_id' => $user_id, 'division_id' => 3])->first();
            $data['nyssef_registration'] = EventParticipants::select('created_at')->where(['user_id' => $user_id, 'division_id' => 1])->first();
        }
        $data['event'] = Event::select('event_start_date', 'event_end_date')->where(['id' => Auth()->guard('frontend')->user()->event_id])->first();

        return view("user.dashboard", $data);
    }

    public function students_list_datatable() {
        $event = Event::where('status', '1')->first();
        $teacher_id = Auth::guard('frontend')->user()->id;
        $user_list = UserMaster::where('type_id', '=', '3')->where('event_id', $event->id)->where("status", '1')->where("teacher_id", $teacher_id);
        return Datatables::of($user_list)
                        ->addIndexColumn()
                        ->editColumn('first_name', function ($model) {
                            $action_html = '<a href="' . Route('student-details', ['id' => base64_encode($model->id)]) . '">' . $model->first_name . ''
                                    . '</a>';
                            return $action_html;
                        })
                        ->editColumn('last_name', function ($model) {
                            return $model->last_name;
                        })
                        ->editColumn('email', function ($model) {
                            return $model->email;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("jS F Y h:s A", strtotime($model->created_at));
                        })
                        ->addColumn('action', function ($model) {
                            $action_html1 = '<a href="' . Route('student-details', ['id' => base64_encode($model->id)]) . '" target="_blank" class="btn btn-outline btn-view" data-toggle="tooltip" title="View Details">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0)" class="btn btn-outline btn-delete" title="Delete" onclick="deleteStudent(' . $model->id . ', \'' . $model->first_name . '\');">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html1;
                        })
                        ->make(true);
    }

    public function post_student_delete(Request $request) {
        if ($request->ajax()) {
            $data = [];

            $teacher_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
            $student_id = $request->input('student_id');

            $model = UserMaster::where('id', '=', $student_id)->where('type_id', '=', '3')->where('teacher_id', '=', $teacher_id)->where('status', '<>', '1')->first();

            if (count($model) > 0) {
                $model->ip_address = $request->ip();
                $model->status = '3';
                $model->updated_by = $teacher_id;
                $model->updated_at = Carbon::now()->toDateTimeString();
                $model->save();

                $event_participants = EventParticipants::where('user_id', '=', $model->id)->where('teacher_id', '=', $teacher_id)->get();
                if (count($event_participants) > 0) {
                    foreach ($event_participants as $participant) {
                        $participant->ip_address = $request->ip();
                        $participant->status = '3';
                        $participant->updated_at = Carbon::now()->toDateTimeString();
                        $participant->save();
                    }
                }

                $event_uploaded_forms = EventUploadedForm::where('user_id', '=', $model->id)->where('teacher_id', '=', $teacher_id)->get();
                if (count($event_uploaded_forms) > 0) {
                    foreach ($event_uploaded_forms as $uploaded_form) {
                        $uploaded_form->status = '3';
                        $uploaded_form->updated_at = Carbon::now()->toDateTimeString();
                        $uploaded_form->save();
                    }
                }

                $data['status'] = 200;
                $data['msg'] = 'Student deleted successfully.';
            } else {
                $data['msg'] = 'Sorry! your selected student is not found';
                $data['status'] = 422;
            }

            return response()->json($data);
        }
    }

    public function get_online_registration_list(Request $request, $id) {
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $loginusermodel = UserMaster::where('id', '=', $user_id)->where('status', '<>', '3')->first();
        if (empty($loginusermodel)) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $division = Division::findorFail($id);
        if (empty($id) || empty($division) || Auth()->guard('frontend')->user()->type_id !== '2') {
            abort(404);
        }

        if (empty($loginusermodel->get_teacher_event_registration)) {
            return redirect('teacher-event-registration');
        }

        if ($request->ajax()) {
            $user_id = Auth()->guard('frontend')->user()->id;
            $event_id = Auth()->guard('frontend')->user()->event_id;
            $registration_list = EventParticipants::
                    select(DB::raw('CONCAT(first_name," ",last_name) as full_name'), 'id', 'email', 'created_at', 'school_name', 'project_type', 'project_category')
                    ->where(['teacher_id' => $user_id, 'division_id' => $id, 'event_id' => $event_id, 'status' => '1']);
            return Datatables::of($registration_list)
                            ->addIndexColumn()
                            ->editColumn('first_name', function ($model) {
                                return $model->full_name;
                            })
                            ->editColumn('email', function ($model) {
                                return $model->email;
                            })
                            ->editColumn('school_name', function ($model) {
                                return $model->school_name;
                            })
                            ->editColumn('project_type', function ($model) {
                                return $model->project_type;
                            })
                            ->editColumn('project_category', function ($model) {
                                return $model->project_category;
                            })
                            ->editColumn('created_at', function ($model) {
                                return date("jS F Y h:s A", strtotime($model->created_at));
                            })
                            ->addColumn('action', function ($model) {
                                $action_html = '<a href="' . route('online-registration-details', ['id' => base64_encode($model->id)]) . '" target="_blank" class="btn btn-outline btn-view" data-toggle="tooltip" title="View Details">'
                                        . '<i class="fa fa-eye"></i>'
                                        . '</a>';
                                return $action_html;
                            })
                            ->make(true);
        }

        return view('user.teacher_online_registration_list', compact('division'));
    }

    public function registration_details($id) {
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $loginusermodel = UserMaster::where('id', '=', $user_id)->where('status', '<>', '3')->first();
        if (empty($loginusermodel)) {
            return redirect('/');
        }

        if (empty($loginusermodel->get_teacher_event_registration)) {
            return redirect('teacher-event-registration');
        }

        $id = base64_decode($id);
        $model = EventParticipants::where('status', '1')->findorFail($id);
        if (empty($id) || empty($model) || Auth()->guard('frontend')->user()->type_id !== '2') {
            abort(404);
        }

        if ($model->division_id == '1') {
            
        }
        $all_forms = Form::where('status', '1')->get();

        return view('user.registration_details', compact('model', 'all_forms'));
    }

    public function student_details($id) {
        $user_id = (Auth()->guard('frontend')->user()) ? Auth()->guard('frontend')->user()->id : '';
        $loginusermodel = UserMaster::where('id', '=', $user_id)->where('status', '<>', '3')->first();
        if (empty($loginusermodel)) {
            return redirect('/');
        }

        if (empty($loginusermodel->get_teacher_event_registration)) {
            return redirect('teacher-event-registration');
        }

        $id = base64_decode($id);
        $model = UserMaster::where('status', '1')->findorFail($id);
        if (empty($id) || empty($model) || Auth()->guard('frontend')->user()->type_id !== '2') {
            abort(404);
        }
        $user_id = Auth()->guard('frontend')->user()->id;
        $event_id = Auth()->guard('frontend')->user()->event_id;
        $division1 = EventParticipants::where('status', '1')->where(['user_id' => $id, 'teacher_id' => $user_id, 'division_id' => '1', "event_id" => $event_id])->first();
        $division2 = EventParticipants::where('status', '1')->where(['user_id' => $id, 'teacher_id' => $user_id, 'division_id' => '2', "event_id" => $event_id])->first();
        $division3 = EventParticipants::where('status', '1')->where(['user_id' => $id, 'teacher_id' => $user_id, 'division_id' => '3', "event_id" => $event_id])->first();
        // print_r($division1);die();
        return view('user.student_details', compact('model', 'division1', 'division2', 'division3'));
    }

}
