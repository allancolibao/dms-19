<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Members extends Model
{
    use HasUpsertQueries;
    
    protected $table = 'd_f61';

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
        'MP',
        'MEMBER_CODE',
        'SURNAME',
        'GIVENNAME',
        'AGE',
        'SEX',
        'PSC',
        'BF',
        'AMSNCK',
        'LUNCH',
        'PMSNCK',
        'SUPPER',
        'LATESNCK',
        'LOCKED',
        'INTERVIEW_STATUS',
        'DATE_ENC',
        'DATE_EDIT',
        'VISITOR',
        'created_at',
        'updated_at',
        );
    
    public function scopeExclude($query,$value = array()) 
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }
}
