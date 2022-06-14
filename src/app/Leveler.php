<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leveler extends Model
{
    protected $fillable = ['h_no','maker','surface','material', 'plate_thickness','size','number_of_sheets', 'supplement' ];
}
