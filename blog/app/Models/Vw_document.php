<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vw_document extends Model
{

    public $incrementing = true;
    public $timestamps = false;
    
    protected $table = 'vw_document';
    protected $fillable = [
       'DOCUMENT_ID', 'DOCUMENT_PRIORITY', 'DOCUMENT_ST_NUMBER', 'DOCUMENT_NAME','FACULTY_ID',
        'DOCUMENT_NUMBER', 'DATE_IN', 'DOCUMENT_TO', 'DOCUMENT_NOTATION','CREATE_DATE',
        'CREATE_USER', 'LAST_DATE', 'LAST_USER', 'FACULTY_NAME_TH','FACULTY_NAME_EN','DOCUMENT_DATE',
];

}
