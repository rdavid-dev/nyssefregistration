<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use URL;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\UserMaster;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Event;
use App\School;
use App\Division;
use App\EventParticipants;
use App\EventTeacherParticipants;
use App\State;
use App\SchoolType;
use App\Form;

class RegistrationController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id) {
        $data['division_id']=$id;
        $data['division']=Division::findOrFail($id);
        return view('admin::division_registration.index',$data);
    }

    public function get_registration_list_datatable($id) {
        $event=Event::where("status",'1')->first();
        $register_list =EventParticipants::where('status', '<>', '3')->where('event_id',$event->id)->where("division_id",$id);
        return Datatables::of($register_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('first_name', function ($model) {
                            return $model->first_name;
                        })
                        ->editColumn('last_name', function ($model) {
                            return $model->last_name;
                        })
                        ->editColumn('school_name', function ($model) {
                            return $model->school_name;
                        })
                        ->editColumn('email', function ($model) {
                            return $model->email;
                        })
                        ->editColumn('form_submitted_date', function ($model) {
                            return date("d-M-Y", strtotime($model->form_submitted_date));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-viewdivisionregistration', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view(Request $request, $id) {
        $data = [];
        $data['model'] = $model = EventParticipants::findOrFail($id);
        $data['division']=Division::findOrFail($model->division_id);
        if (!empty($model) && $model->status != '3') {
			$data['all_forms'] = Form::where('status', '1')->get();
			
            return view('admin::division_registration.view', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-division');
        }
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = EventParticipants::findOrFail($_GET['id']);
            if (!empty($model) && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Division Registration deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-divisionRegistration',['id' => $model->division_id]);
    }

    public function teacher_registration()
    {
        return view('admin::division_registration.teacher_registration');
    }

    public function get_teacherregistration_list_datatable()
    {
        $event=Event::where("status",'1')->first();
        $register_list =EventTeacherParticipants::with('get_teacher_details')->where('status', '<>', '3')->where('event_id',$event->id)->get();
        // print_r($register_list);die();
        return Datatables::of($register_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('first_name', function ($model) {
                            return $model->get_teacher_details->first_name;
                        })
                        ->editColumn('last_name', function ($model) {
                            return $model->get_teacher_details->last_name;
                        })
                        ->editColumn('school_name', function ($model) {
                            return $model->school_name;
                        })
                        ->editColumn('email', function ($model) {
                            return $model->get_teacher_details->email;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-viewteacherregistration', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view_teacher_registration(Request $request,$id)
    {
        $data['model'] =$model=EventTeacherParticipants::with('get_teacher_details')->findOrFail($id);
        $data['state']=State::where('status','1')->where('code',$model->school_state)->first();
        // print_r($data);die();
        return view('admin::division_registration.view_teacher_registration',$data);
    }

    public function export_division_registration(Request $request,$id)
    {
        $event=Event::where("status",'1')->first();
        $list =EventParticipants::where('status', '<>', '3')->where('event_id',$event->id)->where("division_id",$id)->get();
        // print_r($list);die();
        if(count($list)>0)
        {
            $delimiter = ",";
            if($id=='1')
            {
                $filename = "NYSSEFRegistration-" . date('Y-m-d') . ".csv";
            }elseif ($id=='2') {
                $filename = "AndromedaRegistration-" . date('Y-m-d') . ".csv";
            }else{
                $filename = "BroadcomRegistration-" . date('Y-m-d') . ".csv";
            }
            //create a file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array('Form Submission Date','Name', 'Email', 'Grade','Teacher Liaison','Teacher Email','School Name','School Address','School City','School Zip Code','School Phone','Student Address','Student City','Student Zip Code','Student Phone','Student Gender','Meal type','T-Shirt Size','Race','Project title','Project Category','Project Type','Partner 1 Name','Partner 1 School Name','Partner 2 Name','Partner 2 School Name','Completed Form File','Register On');
            fputcsv($f, $fields, $delimiter);
            //output each row of the data, format line as csv and write to file pointer
            for($i=0;$i<count($list);$i++){
                $lineData = array($list[$i]->form_submitted_date,$list[$i]->first_name." ".$list[$i]->last_name, $list[$i]->email,$list[$i]->grade);
                $lineData[]=$list[$i]->teacher_liaison;
                $lineData[]=$list[$i]->teacher_email;
                $lineData[]=$list[$i]->school_name;
                $lineData[]=$list[$i]->school_address;
                $lineData[]=$list[$i]->school_city;
                $lineData[]=$list[$i]->school_zipcode;
                $lineData[]=$list[$i]->school_phone;
                $lineData[]=$list[$i]->address_line1;
                $lineData[]=$list[$i]->city;
                $lineData[]=$list[$i]->zipcode;
                $lineData[]=$list[$i]->phone;
                $lineData[]=$list[$i]->gender;
                $lineData[]=$list[$i]->meal_type;
                $lineData[]=$list[$i]->tshirt_size;
                $lineData[]=$list[$i]->race;
                $lineData[]=$list[$i]->project_title;
                $lineData[]=$list[$i]->project_category;
                $lineData[]=$list[$i]->project_type;
                $lineData[]=$list[$i]->partner1_name;
                $lineData[]=$list[$i]->partner1_school_name;
                $lineData[]=$list[$i]->partner2_name;
                $lineData[]=$list[$i]->partner2_school_name;
                $lineData[]=URL::asset('public/uploads/frontend/registration_form/'.$list[$i]->signed_application_form);
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
            return redirect()->route('admin-teachers');
        }
        exit;
    }

    public function export_teacher_registration(Request $request)
    {
        $event=Event::where("status",'1')->first();
        $list =EventTeacherParticipants::with('get_teacher_details')->where('status', '<>', '3')->where('event_id',$event->id)->get();
        // print_r($list);die();
        if(count($list)>0)
        {
            $delimiter = ",";
            $filename = "TeacherRegistration-" . date('Y-m-d') . ".csv";
            
            //create a file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array('Teacher Name', 'Teacher Email', 'Teacher Phone','School Type','School Name','School Address','School City','School State','School District','School County','School Phone','School Prinicipal Name','School Prinicipal Email','Payment Method','NYSSEF IFES Divisions','Andromeda Judging','Broadcom Judging','Register On');
            fputcsv($f, $fields, $delimiter);
            //output each row of the data, format line as csv and write to file pointer
            for($i=0;$i<count($list);$i++){
                $lineData = array($list[$i]->get_teacher_details->first_name." ".$list[$i]->get_teacher_details->last_name, $list[$i]->get_teacher_details->email, $list[$i]->get_teacher_details->phone);
                $type=SchoolType::where('id',$list[$i]->school_type_id)->first()->type;
                $lineData[]=$type;
                $lineData[]=$list[$i]->school_name;
                $lineData[]=$list[$i]->school_address;
                $lineData[]=$list[$i]->school_city;
                $state=State::where('status','1')->where('code',$list[$i]->school_state)->first();
                $lineData[]=$state->name;
                $lineData[]=$list[$i]->school_district;
                $lineData[]=$list[$i]->school_county;
                $lineData[]=$list[$i]->school_phone;
                $lineData[]=$list[$i]->school_prinicipal_name;
                $lineData[]=$list[$i]->school_principal_email;
                $lineData[]=$list[$i]->payment_method;
                $isef=unserialize($list[$i]->isef_divisions);
                $isef_data=implode(",",$isef);
                $lineData[]=$isef_data;
                $judge=$list[$i]->andromeda_judging; //unserialize($list[$i]->andromeda_broadcom_judging);
                $judge1=$list[$i]->broadcom_judging; //unserialize($list[$i]->andromeda_broadcom_judging);
                $lineData[]=$judge;
                $lineData[]=$judge1;
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
            return redirect()->route('admin-teachers');
        }
        exit;
    }

}
