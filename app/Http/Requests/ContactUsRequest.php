<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize() {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255',
            'phone_no' => 'nullable|min:10|regex:/^[0-9\+\-\(\)\s]+$/', //'required|numeric|digits_between:10,15',
            'message' => 'required',
        ];
    }

}
