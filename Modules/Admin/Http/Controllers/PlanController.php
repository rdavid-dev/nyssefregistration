<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Plan;
use Yajra\Datatables\Datatables;

class PlanController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        return view('admin::plan.index');
    }

    public function get_plans_list_datatable() {
        $plan_list = Plan::where('status', '<>', '3');
        return Datatables::of($plan_list)
                        ->editColumn('id', function ($model) {
                            return $model->id;
                        })
                        ->editColumn('name', function ($model) {
                            return $model->name;
                        })
                        ->editColumn('ticker', function ($model) {
                            return $model->ticker;
                        })
                        ->editColumn('created_at', function ($model) {
                            return date("Y-m-d H:i:s", strtotime($model->created_at));
                        })
                        ->editColumn('status', function ($model) {
                            return $model->status;
                        })
                        ->addColumn('action', function ($model) {
                            $action_html = '<a href="' . Route('admin-viewplan', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm blue" data-toggle="tooltip" title="View">'
                                    . '<i class="fa fa-eye"></i>'
                                    . '</a>'
                                    . '<a href="' . Route('admin-updateplan', ['id' => $model->id]) . '" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" title="Edit">'
                                    . '<i class="fa fa-edit"></i>'
                                    . '</a>'
                                    . '<a href="javascript:void(0);" onclick="deletePlan(this);" data-href="' . Route("admin-deleteplan", ['id' => $model->id]) . '" data-id="' . $model->id . '" class="btn btn-outline btn-circle btn-sm dark" data-toggle="tooltip" title="Delete">'
                                    . '<i class="fa fa-trash"></i>'
                                    . '</a>';
                            return $action_html;
                        })
                        ->make(true);
    }

    public function view(Request $request, $id) {
        $data = [];
        $data['model'] = $model = Plan::findOrFail($id);
        if (count($model) > 0 && $model->status != '3') {
            return view('admin::plan.view', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-plans');
        }
    }

    public function add_plan() {
        return view('admin::plan.add');
    }

    public function post_add_plan(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:250',
                    'ticker' => 'required|max:250',
                    'status' => 'required'
        ]);

        if ($validator->passes()) {
            $input = $request->input();
            $input['state'] = 'mi';
            Plan::create($input);
            $request->session()->flash('success', 'Plan added successfully.');
        }
        return redirect()->route('admin-addplan')->withErrors($validator)->withInput();
    }

    public function get_update(Request $request, $id) {
        $data = [];
        $data['model'] = $model = Plan::findOrFail($id);
        if (count($model) > 0 && $model->status != '3') {
//            $data['all_country'] = MetaLocation::where('type', '=', "CO")->where('Status', '=', '1')->orderBy('local_name', 'ASC')->get();
            return view('admin::plan.update', $data);
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
            return redirect()->route('admin-plans');
        }
    }

    public function post_update(Request $request, $id) {
        $data = [];
        $model = Plan::findOrFail($id);
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:250',
                    'ticker' => 'required|max:250',
                    'status' => 'required'
        ]);
        if ($validator->passes()) {
            $input = $request->input();
            $model->update($input);
            $request->session()->flash('success', 'Plan updated successfully.');
        }
        return redirect()->route('admin-updateplan', ['id' => $id])->withErrors($validator)->withInput();
    }

    public function delete(Request $request) {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $model = Plan::findOrFail($_GET['id']);
            if (count($model) > 0 && $model->status != '3') {
                $model->status = '3';
                $model->save();
                $request->session()->flash('success', 'Plan deleted successfully.');
            } else {
                $request->session()->flash('danger', 'Oops. Something went wrong.');
            }
        } else {
            $request->session()->flash('danger', 'Oops. Something went wrong.');
        }
        return redirect()->route('admin-plans');
    }

}
