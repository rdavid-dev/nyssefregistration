<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model{

    use \Illuminate\Auth\Authenticatable;

    public $timestamps = false;
    protected $table = 'slider';
    
    
   

}
