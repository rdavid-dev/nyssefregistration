<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\UserMaster;

class ForgotRequest extends FormRequest {

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
            'email' => 'required|email',
			'user_type' => 'required',
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            if($this->user_type!='3')
            {
                if($this->school=="")
                {
                    $validator->errors()->add('school', 'The school field is required.');
                }
                $model = UserMaster::where('type_id', '=', $this->user_type)->where('school_id','=',$this->school)->where('event_id', '=', $this->event_id)->where('email', '=', $this->email)->where('status', '=', '1')->first();
                if (count($model) === 0)
                    $validator->errors()->add('email', 'We could not find the email that you are looking for.');
            }
            $model = UserMaster::where('type_id', '=', $this->user_type)->where('event_id', '=', $this->event_id)->where('email', '=', $this->email)->where('status', '=', '1')->first();
            if (count($model) === 0)
                $validator->errors()->add('email', 'We could not find the email that you are looking for.');
        });
    }

}
