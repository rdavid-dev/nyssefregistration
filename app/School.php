<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['type_id','name','address_line1','address_line2','city','district','state','zipcode','county','country','phone','own_science_fair','school_participation_at_our_fair','status'];
}
