<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $primaryKey = 'FACULTY_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'hrd_mas_faculty';
    protected $fillable = [
       'FACULTY_ID', 'FACULTY_CODE', 'FACULTY_NAME_TH', 'FACULTY_NAME_EN','CAMPUS_ID','WORK_TYPE','FACULTY_TYPE','RECORD_STATUS','LAST_DATE',
    ];
}
