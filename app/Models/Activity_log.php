<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity_log extends Model
{
    //use SoftDeletes;

    protected $table = "activity_log";
    protected $fillable = ["id", "user_id", "text", "ip_address"];
    protected $dates =	["created_at". "updated_at"];

}
