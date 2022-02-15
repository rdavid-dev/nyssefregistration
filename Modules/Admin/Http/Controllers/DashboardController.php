<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\UserMaster;

class DashboardController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        $data['total_teachers'] = UserMaster::where('type_id', '=', '2')->where('status', '<>', '3')->count();
        $data['total_students'] = UserMaster::where('type_id', '=', '3')->where('status', '<>', '3')->count();
        $data['total_judges'] = UserMaster::where('type_id', '=', '4')->where('status', '<>', '3')->count();
        $data['total_volunteers'] = UserMaster::where('type_id', '=', '5')->where('status', '<>', '3')->count();
        //$data['total_plans'] = Plan::where('status', '<>', '3')->count();
        return view('admin::dashboard.index', $data);
    }

}
