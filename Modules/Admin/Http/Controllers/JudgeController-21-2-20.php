<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Validator;
use Yajra\Datatables\Datatables;

use App\UserMaster;
use App\VolunteerPosition;
use App\QualificationDegree;
use App\UserDetail;
use App\DivisionCategory;
use App\Event;

class JudgeController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::judge.index', $data);
    }

    public function get_judge_list_datatable()
    {
        $event=Event::where("status",'1')->first();
        $position_list = UserMaster::where('status', '<>', '3')->where('type_id','4')->where("event_id",$event->id);
        return Datatables::of($position_list)
                        ->addIndexColumn()
                        ->editColumn('first_name', function ($model) {
                            return $model->first_name;
                        })
                        ->editColumn('last_name', function ($model) {
                            return $model->last_name;
                        })
                        ->editColumn('email', function ($model) {
                            return $model->email;
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y h:i A", strtotime($model->created_at));
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-viewjudgeregistration', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>';
                                    // . '<a href="javascript:void(0);" onclick="deleteposition(this);" data-href="' . Route("admin-deletepotion", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    // . '<i class="fa fa-trash"></i>'
                                    // . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_judgeregistration()
    {
        return view('admin::judge.add');
    }


    public function view(Request $request,$id)
    {
        $data = [];
        $data['model'] = $model = UserMaster::findOrFail($id);
        $data['details']=UserDetail::where("user_id",$model->id)->first();
        $data['degree']= QualificationDegree::where('status','1')->get();
        $data['category']=DivisionCategory::where('status','1')->get();
        if(count($model) > 0)
        {
            return view('admin::judge.view', $data);
        }else{
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-judgeregistration');
        }
    }

  
    public function delete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = VolunteerPosition::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Volunteer Position deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-volunteer-positions');
    }

    public function export(Request $request)
    {
        $event=Event::where("status",'1')->first();
        $list = UserMaster::join('user_details', 'user_master.id', '=', 'user_details.user_id')
        ->where('user_master.status', '<>', '3')->where('user_master.type_id','4')->where('user_master.event_id',$event->id)->get();
        // print_r($list);die();
        if(count($list)>0)
        {
            $delimiter = ",";
            $filename = "Judges-" . date('Y-m-d') . ".csv";
            
            //create a file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array('Name', 'Email', 'Phone','Gender','Highest Degree Completed','Dietary Restrictions','Is Retired','Organization You Are Representing','Participate As A Judge At Our Fair','Parking Pass','Category 1','Category 2','Category 3','Field Of Study','Experience Do You Have In This Field','Status' ,'Created At');
            fputcsv($f, $fields, $delimiter);
            //output each row of the data, format line as csv and write to file pointer
            for($i=0;$i<count($list);$i++){
                $lineData = array($list[$i]->first_name." ".$list[$i]->last_name, $list[$i]->email, $list[$i]->phone,(($list[$i]->gender=="M")?"Male":(($list[$i]->gender=="F"?"Female":"Other"))));
                $lineData[]=QualificationDegree::where("degree_code",$list[$i]->degree)->first()->degree;
                $lineData[]=$list[$i]->dietary_restrictions;
                $lineData[]=($list[$i]->is_retired=="0")?"No":"Yes";
                $lineData[]=$list[$i]->organization;
                $lineData[]=$list[$i]->participation_at_our_fair;
                $lineData[]=($list[$i]->require_parking_pass=="0")?"No":"Yes";
                $lineData[]=DivisionCategory::where('category_code',$list[$i]->judge_category_1)->first()->category_name;
                $lineData[]=DivisionCategory::where('category_code',$list[$i]->judge_category_2)->first()->category_name;
                $lineData[]=DivisionCategory::where('category_code',$list[$i]->judge_category_3)->first()->category_name;
                $lineData[]=$list[$i]->study_field;
                $lineData[]=$list[$i]->experience_in_study_field;
                $lineData[]=(($list[$i]->status=='1')?"Active":(($list[$i]->status=='0')?"Inactive":"Suspended"));
                $lineData[]=date("d-m-Y h:sa", strtotime($list[$i]->created_at));
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
            return redirect()->route('admin-judgeregistration');
        }
        exit;
    }

}
