<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class EventParticipants extends Model implements Authenticatable {

    use \Illuminate\Auth\Authenticatable;

    public $timestamps = false;
    protected $table = 'event_participants';

    protected $fillable = ['user_id', 'event_id', 'teacher_id', 'division_id', 'division_category_id', 'first_name', 'last_name', 'email', 'phone', 'grade', 'gender', 'meal_type', 'tshirt_size', 'phone', 'race', 'address_line1', 'city', 'zipcode', 'teacher_liaison', 'teacher_email', 'school_name', 'school_address', 'school_city', 'school_zipcode', 'school_phone', 'project_title', 'project_category', 'project_type', 'partner1_name', 'partner1_school_name', 'partner2_name', 'partner2_school_name', 'partner3_name', 'partner3_school_name', 'signed_application_form', 'ip_address', 'status', 'created_at', 'updated_at'];


    /*public function productcount() {
        return $this->hasMany('App\ProductMaster', 'user_id', 'id')->select('id')->where('status', 1);
    }*/

    public function divison() {
        return $this->belongsTo('App\Division', 'division_id', 'id');
    }
	
	public function get_division_uploaded_form(){
		return $this->hasMany('App\EventUploadedForm', 'event_participation_id', 'id');
	}

}
