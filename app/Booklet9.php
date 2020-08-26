<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklet9 extends Model
{
    protected $table = 'd_f63';

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
        'LINENO',
        'MEALCD',
        'WRCODE',
        'RFCODE',
        'FOODCODE',
        'FOODEX',
        'FOODDESC',
        'FOODWEIGHT',
        'RCC',
        'CMC',
        'SUPCODE',
        'SRCCODE',
        'OTH_SRC',
        'PW_WGT',
        'PW_RCC',
        'PW_CMC',
        'PURCODE',
        'GO_WGT',
        'GO_RCC',
        'GO_CMC',
        'LO_WGT',
        'LO_RCC',
        'LO_CMC',
        'UNITCOST',
        'UNITWGT',
        'APWT',
        'EPWT',
        'NETEP',
        'ENERGY',
        'PROTEIN',
        'FAT',
        'CARBOHYDRATES',
        'CALCIUM',
        'IRON',
        'THIAMIN',
        'RIBOFLAVIN',
        'NIACIN',
        'VITAMIN_A',
        'VITAMIN_C',
        'PHOSPHORUS',
        'FOODGROUP',
        'PW_APWT',
        'PW_EPWT',
        'PW_ENERGY',
        'PW_PROTEIN',
        'PW_FAT',
        'PW_CARBOHYDRATES',
        'PW_CALCIUM',
        'PW_IRON',
        'PW_THIAMIN',
        'PW_RIBOFLAVIN',
        'PW_NIACIN',
        'PW_VITAMIN_A',
        'PW_VITAMIN_C',
        'PW_PHOSPHORUS',
        'CLEAN',
        'DATEENC',
        'status',
        'BRANDNAME',
        'MAINIGNT',
        'BRANDCODE',
        'FOOD_ITEM',
        'FOODITEM',
        'DESCRIPTION',
        'DATE_EDIT',
        'UNIT',
        'FOOITEM',
        'created_at',
        'updated_at',
        );
    
    public function scopeExclude($query,$value = array()) 
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }
}
