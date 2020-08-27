<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class F60 extends Model
{
    use HasUpsertQueries;

    
    protected $table = 'd_f60';

    
    /**
    * Exclude method
    * 
    * 
    */
    protected $columns = array(
        'id',
        'eacode',
        'hcn',
        'shsn',
        'REFDATE',
        'PETS',
        'MEALPATTERN',
        'INTERVIEW_STATUS',
        'DATEENC',
        'INTERVIEW_STATUS_IND',
        'DATE_EDIT',
        'refdate_recall',
        'REFDAY',
        'yearref',
        'dayref',
        'monthref',
        'created_at',
        'updated_at',
        );
    
    public function scopeExclude($query,$value = array()) 
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }
}
