<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Sys_Department extends Model
{
//    use SoftDeletes;

    protected $primaryKey = 'DEPARTMENT_ID';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $table = 'sys_department';
    protected $fillable = [
       'DEPARTMENT_ID', 'DEPARTMENT_NAME', 'RECORD_STATUS', 'CREATE_DATE','CREATE_USER','LAST_DATE','LAST_USER',
    ];


}
