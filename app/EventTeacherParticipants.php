<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class EventTeacherParticipants extends Model implements Authenticatable {

    use \Illuminate\Auth\Authenticatable;

    public $timestamps = false;
    protected $table = 'event_teacher_participants';

    protected $fillable = ['user_id', 'event_id', 'school_type_id', 'school_name', 'school_address', 'school_city', 'school_state', 'school_zipcode', 'school_district', 'school_county', 'school_country', 'school_phone', 'school_prinicipal_name', 'school_principal_email', 'payment_method', 'isef_divisions', 'broadcom_judging','andromeda_judging', 'ip_address', 'status', 'created_at', 'updated_at'];

    public function get_teacher_details() {
        return $this->belongsTo('App\UserMaster', 'user_id', 'id');
    }
}
