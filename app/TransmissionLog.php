<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class TransmissionLog extends Model
{
    use HasUpsertQueries;

    
    protected $connection = 'mysqltrd';


    /**
     * Name of the table.
     *
     * 
     */
    protected $table = 'logs';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eacode',
        'hcn',
        'shsn',
        'trans_cat',
        'full_name',
        'f60_count',
        'f61_count',
        'f63_count',
        'f71_count',
        'f76_count',
    ];
}
