<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransmissionLog extends Model
{
    protected $table = 'transmissionlog';

    protected $fillable = ['name', 'areaname', 'status','dstarted','dfinished'];
}
