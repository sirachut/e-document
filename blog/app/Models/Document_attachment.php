<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Document_attachment extends Model
{

    protected $primaryKey = 'ATTACHMENT_ID';
    public $incrementing = true;
    public $timestamps = false;
    
    protected $table = 'document_attachment';
    protected $fillable = [
       'ATTACHMENT_ID', 'DOCUMENT_ID', 'ATTACHMENT_NAME', 'ATTACHMENT_FILE','ATTACHMENT_DETAIL','RECORD_STATUS','CREATE_DATE','CREATE_USER','LAST_DATE','LAST_USER',
    ];


}