<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Document_Item extends Model
{
//    use SoftDeletes;

    protected $primaryKey = 'DOCUMENT_ITEM_ID';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $table = 'document_item';
    protected $fillable = [
       'STATUS_ID', 'DATE_IN', 'DEPARTMENT_ID', 'RECORD_STATUS','CREATE_USER','LAST_DATE','LAST_USER','DATE_OUT','ROUTE_NO','DETAIL',
        'DOCUMENT_ID',
    ];


}
