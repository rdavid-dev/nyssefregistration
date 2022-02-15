<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use File;

use App\UserMaster;
use App\School;
use App\SchoolType;
use App\State;
use App\Event;
use App\EventSchedule;

class UserController extends Controller
{
	public function get_myprofile() {
        $data = [];
        $phones = [];
        $user_id = Auth()->guard('frontend')->user()->id;
        $data['model'] = $model = UserMaster::where('id', '=', $user_id)->where('status', '<>', '3')->first();
		$data['page'] = 'profile';
		
        if (empty($data['model'])) {
            return redirect('login');
        }
		
		if($model->type_id == '2'){
			return view('user.mypage_profile', $data);
		}else{
			return view('user.fan_mypage_profile', $data);
		}
    }

    public function change_password()
    {
        return view('user.change_password');
    }

    public function update_change_password(Request $request)
    {
        $user = Auth()->guard('frontend')->user();
        if ($request->ajax()) {
            $response = $this->check_change_password_form($request);
            if (isset($response['status']) && $response['status'] === 422) {
                $data['errors'] = $response['errors'];
                $data['status'] = "failed";
            }else{
                $user->password = Hash::make($request->input('new_password'));
                $user->updated_at = date('Y-m-d H:i:s');
                $user->save();
                $data['msg'] = "Password Successfully Changed";
                $data['status'] = "success";
            }
            return response()->json($data);
        }
    }

    public function check_change_password_form($request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'required|min:6|same:new_password'
        ]);
        $validator->after(function($validator)use ($request) {
            $user = Auth()->guard('frontend')->user();
            if (Hash::check($request->input('old_password'), $user->password) != 1)
                $validator->errors()->add('old_password', 'Old password is incorrect.');
        });
        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return $data;
    }

    public function manage_account()
    {
        $model = new UserMaster;
        $user = Auth()->guard('frontend')->user();
        $data['model'] = $user;
        return view('user.manage_account',$data);
    }

    public function post_manage_account(Request $request)
    {
        if ($request->ajax()) {
            $user = Auth()->guard('frontend')->user();
            $response = $this->check_manage_account($request);
            if (isset($response['status']) && $response['status'] === 422) {
                $data['errors'] = $response['errors'];
                $data['status'] = "failed";
            }else{
                if ($request->file('profile_picture')) {
                    File::delete(public_path('uploads/frontend/profile_picture/original/' . $user->profile_picture));
                    File::delete(public_path('uploads/frontend/profile_picture/preview/' . $user->profile_picture));
                    File::delete(public_path('uploads/frontend/profile_picture/thumb/' . $user->profile_picture));
                    $img_name = $this->rand_string(12) . '.' . $request->file('profile_picture')->getClientOriginalExtension();
                    $file = $request->file('profile_picture');
                    $file->move(public_path('uploads/frontend/profile_picture/original/'), $img_name);
                    Image::make(public_path('uploads/frontend/profile_picture/original/') . $img_name)->resize(500, 500)->save(public_path('uploads/frontend/profile_picture/preview/') . $img_name);
                    Image::make(public_path('uploads/frontend/profile_picture/original/') . $img_name)->resize(200, 200)->save(public_path('uploads/frontend/profile_picture/thumb/') . $img_name);
                    $user->profile_picture = $img_name;
                }
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->email = strtolower($request->input('email'));
                $user->updated_at = date('Y-m-d H:i:s');
                $user->save();
                $data['msg'] = "Account Details successfully Updated";
                $data['status'] = "success";
            }
            return response()->json($data);
        }
    }
    

    public function check_manage_account($request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'profile_picture' => 'mimes:jpeg,bmp,png',
        ]);
        if ($validator->fails()) {
            $data['errors'] = $validator->errors()->getMessages();
            $data['status'] = 422;
        }
        return $data;
    }
    
    
    public function teacher_further_registration() {
        return view('user.teacher_further_registration');
    }
}
