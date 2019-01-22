<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
//    use SoftDeletes;

    protected $primaryKey = 'DEPARTMENT_ID';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $table = 'mas_department';
    protected $fillable = [
       'DEPARTMENT_ID', 'DEPARTMENT_NAME', 'RECORD_STATUS', 'CREATE_DATE','CREATE_USER','LAST_DATE','LAST_USER',
    ];


}