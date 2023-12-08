<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostItem extends Model
{
    //
    protected $table = 'sps.CostItem';

    protected $fillable = ['id', 'idType', 'costitem', 'costItemEnglish', 'remarks'];

    public function fundRequestCostItemMerged() {
        $lib = 'App\Models\FundRequest';
        return $this->hasMany($lib);
    }
}
