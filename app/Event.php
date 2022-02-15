<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_title','event_start_date','event_end_date','division_categories','address_line1','address_line2','city','state','country','zipcode','latitude','longitude','is_map_show','parking_notes','event_judge_schedule','event_guideline_file','facebook_link','status','second_event_title','second_event_address','is_second_event_show'];
}
