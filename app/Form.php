<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';
	
	public function get_event_uploaded_form()
    {
    	return $this->hasOne('App\EventUploadedForm', 'form_id', 'id')->select('id')->where('status', '<>', '3');
    }
}
