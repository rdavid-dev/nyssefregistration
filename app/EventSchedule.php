<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    protected $table = 'event_schedules';
    protected $fillable = ['event_id','scheduled_date','schedules','event_judge_schedule'];
}
