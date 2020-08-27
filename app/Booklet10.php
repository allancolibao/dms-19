<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Booklet10 extends Model
{
    use HasUpsertQueries;

    protected $table = 'd_f71';


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
    'MEMBER_CODE',
    'RECDAY',
    'LINENO',
    'FIC', 
    'FOODITEM',
    'FOODDESC',
    'FOODBRND',
    'FVS',
    'ISFORTIFIED',
    'VITA',
    'IRON',
    'OTHF',
    'FOODMAINING',
    'FOODBRNDCD',
    'AMTSIZEMEAS',
    'MEALCD',
    'RFCODE',
    'FOODCODE',
    'FOODEX',
    'FOODWEIGHT',
    'RCC',
    'CMC',
    'SUPCODE',
    'SRCCODE',
    'OTH_SRC',
    'CPC',
    'UNITCOST',
    'UNITWGT',
    'UNITMEAS', 
    'CLEAN',
    'status', 
    'refday',
    'memkey',
    'DATEENC',
    'FOOD_ITEM',
    'DATE_EDIT',
    'yearref',
    'dayref',
    'monthref',
    'created_at',
    'updated_at'
    );

  public function scopeExclude($query,$value = array()) {

    return $query->select( array_diff( $this->columns,(array) $value) );
    
  }


   public function getTheForm71PerEacode($eacode, $hcn, $shsn){

    return $this->where('eacode', $eacode)
            ->where('hcn', $hcn)
            ->where('shsn', $shsn)
            ->distinct()
            ->get(['eacode','hcn','shsn', 'MEMBER_CODE'])
            ->count();

  }

}
