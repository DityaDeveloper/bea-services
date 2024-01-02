<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
     //

     protected $table = 'sps.RequestType';

     protected $fillable = ['Id', 'Keterangan', 'Code'];
	
     public function requestDocMerged() {
        $lib = 'App\Models\RequestDoc';
        return $this->hasMany($lib);
    }

}
