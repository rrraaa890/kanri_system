<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coil extends Model
{
    protected $fillable = ['h_no','maker','surface','material', 'plate_thickness', 'supplement' ];
}
