<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\EventTeacherParticipants;

class TeacherEventRegistrationRequest extends FormRequest {

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
            'school_type_id' => 'required',
            'school_name' => 'required|max:100',
            'school_address' => 'required|max:255',
            'school_city' => 'required|max:50',
            'school_state' => 'required',
            'school_zipcode' => 'required|max:10',
            'school_district' => 'required|max:50',
            'school_county' => 'required|max:50',
            'school_phone' => 'required|min:10',
            'school_prinicipal_name' => 'required|max:100',
            'school_principal_email' => 'required|email|max:255',
            'isef_divisions' => 'required|array',
            //'andromeda_broadcom_judging' => 'required|array',
            // 'andromeda_broadcom_judging' => 'required',
            'payment_method' => 'required', 
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
			$user_id = Auth()->guard('frontend')->user()->id;
			$event_id = Auth()->guard('frontend')->user()->event_id;
			if(!empty($user_id)){
				$checkUser = EventTeacherParticipants::where('user_id', $user_id)->where('event_id', $event_id)->where('status', '<>', '3')->first();
				if (count($checkUser) > 0){
					$validator->errors()->add('email', 'Sorry! you have already submitted this registration form under current event');
				}
			}
        });
    }

}
