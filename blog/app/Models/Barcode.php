<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{

    protected $primaryKey = 'BARCODE_ID';
    public $incrementing = true;
    public $timestamps = false;
    
    protected $table = 'barcode';
    protected $fillable = [
       'BARCODE_ID', 'NUM_FROM', 'NUM_TO', 'RECORD_STATUS','CREATE_DATE',
    ];


}
