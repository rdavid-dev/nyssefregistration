<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class UserMaster extends Model implements Authenticatable {

    use \Illuminate\Auth\Authenticatable;

    public $timestamps = false;
    protected $table = 'user_master';

    protected $fillable = ['type_id', 'school_id', 'event_id', 'teacher_id', 'first_name', 'last_name', 'email', 'password', 'phone', 'participation_at_our_fair', 'teacher_generated_code', 'profile_picture', 'grade', 'gender', 'dob', 'address_line1', 'city', 'state', 'zipcode', 'county', 'country', 'student_used_code', 'ip_address', 'status', 'created_at', 'updated_at'];


    public function get_teacher_event_registration() {
        return $this->hasOne('App\EventTeacherParticipants', 'user_id', 'id')->select('id')->where('status', '<>', '3');
    }

    public function get_state()
    {
    	return $this->belongsTo('App\State', 'state', 'code');
    }

}
