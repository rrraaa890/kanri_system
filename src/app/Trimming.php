<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trimming extends Model
{
    protected $fillable = ['h_no','maker','surface','material', 'plate_thickness','model','number_of_sheets','supplement' ];
}
