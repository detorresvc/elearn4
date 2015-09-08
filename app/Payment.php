<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected  $fillable = ['payment_id','hash','user_id','state'];
}
