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
       'USER_ID', 'USERNAME', 'DISPLAY_NAME', 'DEPARTMENT_ID','FACULTY_ID','MOBILE',
    ];


}
