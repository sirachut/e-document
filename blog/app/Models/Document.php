<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
//    use SoftDeletes;

    // protected $primaryKey = 'DOCUMENT_ID';
    // public $incrementing = false;
    // public $timestamps = false;

    protected $table = 'document';
    protected $fillable = [
       'DOCUMENT_ID', 'DOCUMENT_PRIORITY', 'DOCUMENT_ST_NUMBER', 'DOCUMENT_NAME','FACULTY_ID','DOCUMENT_NUMBER','DATE_IN','DOCUMENT_TO','DOCUMENT_NOTATION','RECORD_STATUS',
        'CREATE_DATE','CREATE_USER','LAST_DATE','LAST_USER',
    ];



}
