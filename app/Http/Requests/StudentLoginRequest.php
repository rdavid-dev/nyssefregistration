<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\UserMaster;

class StudentLoginRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required',
            'password' => 'required',
			'teacher' => 'required'
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {			
            $model = UserMaster::where('email', '=', $this->email)->where('type_id', '=', '3')->where('event_id', '=', $this->current_event_id)->where('teacher_id', '=', $this->teacher)->first();
            if (count($model) === 1) {
                if (Hash::check($this->password, $model->password)) {
                    if (Auth::attempt(['email' => $model->email, 'password' => $this->password, 'status' => '0']))
                        $validator->errors()->add('password', "Your account is not activated. Please verify your email first.");
                    else if (Auth::attempt(['email' => $model->email, 'password' => $this->password, 'status' => '2']))
                        $validator->errors()->add('password', "Your account is suspended. Please contact to admin.");
                    else {
                        
                    }
                } else
                    $validator->errors()->add('password', "Incorrect Email or Password.");
            } else {
                $validator->errors()->add('password', "User not found. Please sign up to login.");
			}
        });
    }

}
