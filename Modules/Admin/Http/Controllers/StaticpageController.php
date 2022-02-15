<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use App\StaticPage;

class StaticpageController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        $data = [];
        $data['page_name'] = $page_name = isset($_GET['page_name']) ? $_GET['page_name'] : "";
        $data['search_filter'] = isset($_GET['search_filter']) ? $_GET['search_filter'] : "";
        $query = StaticPage::where('slug', 'like', '%');
        if ($page_name != "") {
            $query->where('page_name', 'like', '%' . $page_name . '%');
        }
        $model = $query->paginate(10);
        $data['model'] = $model;
        return view('admin::staticpage.index', $data);
    }

    public function view($id) {
        $data = [];
        $data['model'] = StaticPage::findOrFail($id);
        return view('admin::staticpage.view', $data);
    }

    public function get_update($id) {
        $data = [];
        $data['model'] = StaticPage::findOrFail($id);
        return view('admin::staticpage.update', $data);
    }

    public function post_update(Request $request, $id) {
        $data = [];
        $model = StaticPage::findOrFail($id);
        $validator = Validator::make($request->all(), [
                    'page_name' => 'required|max:100',
                    'content' => 'required',
        ]);
        if ($validator->passes()) {
            $model->page_name = $request->input('page_name');
            $model->content = $request->input('content');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            $request->session()->flash('success', 'Content updated successfully.');
        }
        return redirect()->route('admin-updatestaticpage', ['id' => $id])->withErrors($validator)->withInput();
    }

}
