<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = ['h_no','maker','surface','material', 'plate_thickness','model','good','bad', 'supplement' ];
}
}
