<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'sps.Status';

    protected $fillable = ['id', 'type', 'desc'];

    public function fundRequestStatusMerged() {
        $lib = 'App\Models\FundRequest';
        return $this->hasMany($lib);
    }
}
