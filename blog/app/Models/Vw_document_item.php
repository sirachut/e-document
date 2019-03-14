<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vw_document_item extends Model
{

    public $incrementing = true;
    public $timestamps = false;
    
    protected $table = 'vw_document_item';
    protected $fillable = [
       'DOCUMENT_ID', 'DOCUMENT_PRIORITY', 'DOCUMENT_ST_NUMBER', 'DOCUMENT_NAME','FACULTY_ID',
        'DOCUMENT_NUMBER', 'DATE_IN', 'DOCUMENT_TO', 'DOCUMENT_NOTATION','CREATE_DATE',
        'CREATE_USER', 'LAST_DATE', 'LAST_USER', 'DOCUMENT_ITEM_ID','STATUS_ID',
        'ITEM_DATE_IN', 'DEPARTMENT_ID', 'ITEM_CREATE_DATE', 'ITEM_CREATE_USER','ITEM_LAST_DATE',
        'ITEM_LAST_USER', 'ITEM_DATE_OUT', 'DETAIL','DEPARTMENT_NAME','STATUS_NAME','RECEIVE_USER','SENT_USER',
];

}
