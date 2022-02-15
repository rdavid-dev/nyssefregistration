<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipationFrom extends Model
{
    protected $table = 'participation_form';
    protected $fillable = ['form_name','form_description','form_filename','status'];
}
