<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MStatus extends Model
{
    //

    protected $table = 'm_status';

    protected $fillable = ['id', 'status', 'tipe_status', 'is_active', 'UPDATED_DATE', 'status_index', 'Value'];

    public function infoBeaStatusMerged() {
        $lib = 'App\Models\User';
        return $this->hasMany($lib);
    }
}
