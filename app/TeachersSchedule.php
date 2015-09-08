<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersSchedule extends Model
{
    protected $fillable = ['user_id','start_at','end_at'];
}
