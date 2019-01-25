<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $primaryKey = 'USER_ID';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $table = 'sys_user';
    protected $fillable = [
       'USER_ID', 'USERNAME', 'DISPLAY_NAME', 'DEPARTMENT_ID','FACULTY_ID','USER_CODE','TELEPHONE','MOBILE','EMAIL','IS_ACTIVE','USER_TYPE','RECORD_STATUS','CREATE_DATE',
        'CREATE_USER','LAST_DATE','LAST_USER',
    ];


}
