<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Encoding extends Model
{
    use HasUpsertQueries;

    protected $table = 'd_f11';

}
