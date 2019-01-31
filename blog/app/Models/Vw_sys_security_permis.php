<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vw_sys_security_permis extends Model
{


//    protected $primaryKey = 'DOCUMENT_ID';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $table = 'vw_sys_security_permis';
    protected $fillable = [
       'DEPARTMENT_ID', 'PERMIS_ID', 'ACTION_ADD', 'ACTION_EDIT','ACTION_VIEW','MOD_ID','MOD_NAME','MOD_PARENT_ID','MOD_ORDER','MOD_LEVEL',
        'MOD_PAGE','IS_ACTIVE','CREATE_DATE','CREATE_USER','LAST_DATE','LAST_USER',
        ];


}
