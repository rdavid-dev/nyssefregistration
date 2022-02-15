<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\UserMaster;

class StudentRegistrationRequest extends FormRequest {

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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'confirm_email' => 'required|same:email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
			'agree' =>'required'
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
			if(!empty($this->email)){
				$checkUser = UserMaster::where('email', $this->email)->where('type_id', '3')->where('event_id', $this->event_id)->where('teacher_id', $this->teacher_id)->where('status', '<>', '3')->first();
				if (count($checkUser) > 0){
					$validator->errors()->add('email', 'This email already in use under current event and teacher.');
				}
			}
        });
    }

}
