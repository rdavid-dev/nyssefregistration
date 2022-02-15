<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model {

    protected $fillable = ['name', 'email', 'phone_no', 'message'];
    protected $table = 'contact_us';

}
