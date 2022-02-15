<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationSetting extends Model
{
    protected $table = 'registration_settings';
    protected $fillable = ['title','started_at','closed_at','final_revision_closed_at','registration_status','status'];
}
