<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use Yajra\Datatables\Datatables;

use App\Event;
use App\State;
use App\EventSchedule;

class EventController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::event.index', $data);
    }

    public function admin_events_list_datatable()
    {
        $event_list = Event::where('status', '<>', '3');
        return Datatables::of($event_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('event_title', function ($model) {
                            return $model->event_title;
                        })
                        ->editColumn('address_line1', function ($model) {
                            return $model->address_line1;
                        })
                        ->editColumn('city', function ($model) {
                            return $model->city;
                        })
                        ->editColumn('state', function ($model) {
                            $state=State::where('code',$model->state)->first();
                            return $state->name;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y h:i A", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updateevent', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    .'<a href="' . Route('admin-listschedule', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Schedule">'
                                    . '<i class="fa fa-calendar"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deletePlan(this);" data-href="' . Route("admin-deleteevent", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function list_schedule($id)
    {
        $data['id'] = $id;
        return view('admin::event.list_schedule', $data);
    }

    public function admin_schedule_list_datatable($id)
    {
        $event_list = EventSchedule::where('status', '<>', '3')->where('event_id','=',$id);
        return Datatables::of($event_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('event_id', function ($model) {
                            $title=Event::where('id',$model->event_id)->first();
                            return $title->event_title;
                        })
                        ->editColumn('scheduled_date', function ($model) {
                            return date("d-M-Y", strtotime($model->scheduled_date));
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("d-M-Y h:i A", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-updateschedule', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteSchedule(this);" data-href="' . Route("admin-deleteschedule", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function add_event()
    {
        $data['state']=State::where('status',1)->get();
        return view('admin::event.add',$data);
    }

    public function post_event(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'is_map_show' => 'required',
            'is_second_event_show' => 'required',
            'division_categories' => 'required',
            'event_judge_schedule' => 'required',
            'event_guideline_file' => 'required|mimes:pdf,doc',
            'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request) {
            if ($request->input('is_second_event_show')=="1") {
                if($request->input('second_event_title')=="")
                {
                    $validator->errors()->add('second_event_title', 'Second event title field is required.');
                }
                if($request->input('second_event_address')=="")
                {
                    $validator->errors()->add('second_event_address', 'Second event address field is required.');
                }
            }
        });
        if ($validator->passes()) {
            $input = $request->input();
            if ($request->file('event_guideline_file')) {
                $img_name = $this->rand_string(12) . '.' . $request->file('event_guideline_file')->getClientOriginalExtension();
                $file = $request->file('event_guideline_file');
                $file->move(public_path('uploads/admin/event_guideline_file/'), $img_name);
                $input['event_guideline_file'] = $img_name;
            }
            $input['event_start_date']=date("Y-m-d", strtotime($request->input('start_date')));
            $input['event_end_date']=date("Y-m-d", strtotime($request->input('end_date')));
            Event::create($input);
            $request->session()->flash('success', 'Event added successfully.');
            return redirect()->route('admin-events');
        }else{
            return redirect()->route('admin-addevent')->withErrors($validator)->withInput();
        }
    }

    public function update_event(Request $request,$id)
    {
        $data = [];
        $data['model'] = $model = Event::findOrFail($id);
        if(count($model) > 0)
        {
            $data['state']=State::where('status',1)->get();
            return view('admin::event.update', $data);
        }else{
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-events');
        }
    }

    public function post_update_event(Request $request,$id)
    {
        // print_r($request->input());
        // $address=$request->input('address_line2')."".$request->input("city")." ".$request->input('state')." ".$request->input('zipcode');
        // echo $address;
        // $prepAddr = str_replace(' ','+',$address);
        // $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        // $output= json_decode($geocode);
        // $latitude = $output->results[0]->geometry->location->lat;
        // $longitude = $output->results[0]->geometry->location->lng;
        // echo $latitude;
        // echo $longitude;
        // die();
        $model = Event::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'is_map_show' => 'required',
            'is_second_event_show' => 'required',
            'division_categories' => 'required',
            'event_judge_schedule' => 'required',
            'event_guideline_file' => 'mimes:pdf,doc',
            'status' => 'required'
        ]);
        $validator->after(function($validator)use ($request) {
            if ($request->input('is_second_event_show')=="1") {
                if($request->input('second_event_title')=="")
                {
                    $validator->errors()->add('second_event_title', 'Second event title field is required.');
                }
                if($request->input('second_event_address')=="")
                {
                    $validator->errors()->add('second_event_address', 'Second event address field is required.');
                }
            }
        });
        if ($validator->passes()) {
            $input = $request->input();
            if ($request->file('event_guideline_file')) {
                $img_name = $this->rand_string(12) . '.' . $request->file('event_guideline_file')->getClientOriginalExtension();
                $file = $request->file('event_guideline_file');
                $file->move(public_path('uploads/admin/event_guideline_file/'), $img_name);
                $input['event_guideline_file'] = $img_name;
            }
            $input['event_start_date']=date("Y-m-d", strtotime($request->input('start_date')));
            $input['event_end_date']=date("Y-m-d", strtotime($request->input('end_date')));
            $model->update($input);
            $request->session()->flash('success', 'Event updated successfully.');
            return redirect()->route('admin-events');
        }else{
            return redirect()->route('admin-updateevent',['id' => $id])->withErrors($validator)->withInput();
        }
    }

    public function add_schedule(Request $request,$id)
    {
        $data['event'] = $event = Event::findOrFail($id);
        return view('admin::event.add_schedule',$data);
    }

    public function post_schedule(Request $request,$id)
    {
        // print_r($request->input());die();
        $model = new EventSchedule;
        $model->event_id = $id;
        $model->scheduled_date=date("Y-m-d", strtotime($request->input('scheduled_date')));
        $array['start_time']=$request->input('start_time');
        $array['end_time']=$request->input('end_time');
        $array['description']=$request->input('description');
        $serialized_array=serialize($array);
        $model->schedules=$serialized_array;
        $model->event_judge_schedule=$request->input("event_judge_schedule");
        $model->status=$request->input("status");
        $model->save();
        $request->session()->flash('success', 'Scheduled added successfully.');
        return redirect()->route('admin-listschedule',['id' => $id]);
    }

    public function update_schedule(Request $request,$id)
    {
        $data['schedules'] = $schedules = EventSchedule::findOrFail($id);
        $data['event'] = Event::findOrFail($schedules->event_id);
        return view('admin::event.update_schedule',$data);
    }

    public function post_update_schedule(Request $request,$id)
    {
        $schedule_id=$request->input("id");
        $model = EventSchedule::findOrFail($schedule_id);
        $model->event_id = $id;
        $model->scheduled_date=date("Y-m-d", strtotime($request->input('scheduled_date')));
        $array['start_time']=$request->input('start_time');
        $array['end_time']=$request->input('end_time');
        $array['description']=$request->input('description');
        $serialized_array=serialize($array);
        $model->schedules=$serialized_array;
        $model->event_judge_schedule=$request->input("event_judge_schedule");
        $model->status=$request->input("status");
        $model->save();
        $request->session()->flash('success', 'Scheduled Updated successfully.');
        return redirect()->route('admin-listschedule',['id' => $id]);
    }

    public function delete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = Event::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Event deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-events');
    }

    public function scheduledelete(Request $request)
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = EventSchedule::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Schedule deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-listschedule',['id' => $model->event_id]);
    }

}
