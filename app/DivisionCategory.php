<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionCategory extends Model
{
    protected $table = 'division_categories';
    protected $fillable = ['code','division_id','category_code','category_name','status'];
}
