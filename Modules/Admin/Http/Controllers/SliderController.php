<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\UserMaster;
use App\MetaLocation;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Slider;
use Illuminate\Support\Facades\URL;

use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::slider.index');
    }

    public function get_sliders_list_datatable() {
        $slider_list = Slider::where('status', '<>', '3');
        return Datatables::of($slider_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('image', function ($model) {
                            return '<img alt="" class="img-responsive" src="'.URL::asset('public/uploads/frontend/slider/thumb/' . $model->image).'"  style="width:210px"/>';
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("Y-m-d H:i:s", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-viewslider', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>'
                                    . '<a href="' . Route('admin-updateslider', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deleteUser(this);" data-href="' . Route("admin-deleteslider", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view(Request $request, $id) {
        $data = [];
        $data['model'] = $model = Slider::findOrFail($id);
        if (count($model) > 0 && $model->status != '3') {
            return view('admin::slider.view', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-sliders');
        }
    }

    public function add_slider() {
        return view('admin::slider.add');
    }

    public function post_add_slider(Request $request) {
        $data_msg=[];
        $model = new Slider;
        $validator = Validator::make($request->all(), [
                    'status' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->passes()) {
            if ($request->hasFile('image')) {
                    $model->image = $this->imageUpload($request);
                }
            $model->status = $request->input('status');
            $model->created_at = date('Y-m-d H:i:s');
            $model->save();

            $data_msg['type'] = 'success';
            $data_msg['msg'] = 'Slider successfully added.';
            $data_msg['link'] = route('admin-sliders');
        }else {
            $data_msg['type'] = 'failed';
            $error_arr = $validator->errors()->getMessages();
            foreach ($error_arr as $key => $val) {
                if (isset($val[0]) && $val[0] != "") {
                    $data_msg['error'][$key] = $val[0];
                }
            }
        }
        return response()->json($data_msg);
    }
    function imageUpload(Request $request) {
        if ($request->hasFile('image')) {  //check the file present or not
            $image = $request->file('image'); //get the file
            $name = $this->rand_string(15) . time() . '.' . $image->getClientOriginalExtension(); //get the  file extention
            $destinationPath = public_path('uploads/frontend/slider/original/'); //public path folder dir
            $path = public_path('uploads/frontend/slider/');
            Image::make($image->getRealPath())->resize(1440, 500)->save($path . 'preview/' . $name);
            Image::make($image->getRealPath())->resize(210, 70)->save($path . 'thumb/' . $name);
            $image->move($destinationPath, $name);
            return $name;
        }
    }

    public function get_update(Request $request, $id) {
        $data = [];
        $data['model'] = $model = Slider::findOrFail($id);
        if (count($model) > 0 && $model->status != '3') {
            return view('admin::slider.update', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-sliders');
        }
    }

    public function post_update(Request $request, $id) {
        $data_msg = [];
        $model = Slider::findOrFail($id);
        $validator = Validator::make($request->all(), [
                    'status' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->passes()) {
            if ($request->hasFile('image')) {
                    $model->image = $this->imageUpload($request);
                }
            $model->status = $request->input('status');
            $model->created_at = date('Y-m-d H:i:s');
            $model->save();

            $data_msg['type'] = 'success';
            $data_msg['msg'] = 'Slider successfully updated.';
            $data_msg['link'] = route('admin-sliders');
        }else {
            $data_msg['type'] = 'failed';
            $error_arr = $validator->errors()->getMessages();
            foreach ($error_arr as $key => $val) {
                if (isset($val[0]) && $val[0] != "") {
                    $data_msg['error'][$key] = $val[0];
                }
            }
        }
        return response()->json($data_msg);
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = Slider::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Slider deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-sliders');
    }

}
