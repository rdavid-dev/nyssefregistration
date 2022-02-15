<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\UserMaster;
use App\EventParticipants;

class BroadcomRegistrationRequest extends FormRequest {

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
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:255',
            'grade' => 'required',
            'teacher_liaison' => 'required|max:50',
			'teacher_email' => 'required|email|max:255',
			//'form_submitted_date' =>'required',
			'school_name' =>'required|max:100',
			'school_address' =>'required|max:255',
			'school_city' =>'required|max:50',
			'school_zipcode' =>'required|max:10',
			'school_phone' =>'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
			'address_line1' =>'required|max:255',
			'city' =>'required|max:50',
			'zipcode' =>'required|required|max:10',
			'phone' =>'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
			'gender' =>'required',
			'meal_type' =>'required',
			'tshirt_size' =>'required',
			'project_title' =>'required|max:250',
			'project_category' =>'required',
			'project_type' =>'required',
			'partner1_name' =>'max:50',
			'partner1_school_name' =>'max:100',
			'partner2_name' =>'max:50',
			'partner2_school_name' =>'max:100',
			"signed_application_form" => "required|mimetypes:application/pdf"
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
			$user_id = Auth()->guard('frontend')->user()->id;
			$event_id = Auth()->guard('frontend')->user()->event_id;
			$teacher_id = Auth()->guard('frontend')->user()->teacher_id;
			if(!empty($user_id)){
				$checkUser = EventParticipants::where('user_id', $user_id)->where('event_id', $event_id)->where('teacher_id', $teacher_id)->where('division_id', $this->division_id)->where('status', '<>', '3')->first();
				if (count($checkUser) > 0){
					$validator->errors()->add('email', 'Sorry! you have already submitted this registration form under current event');
				}
			}
        });
    }

}
