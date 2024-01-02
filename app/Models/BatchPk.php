<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchPk extends Model
{
    //

    protected $table = 'sps.BatchPK';

    protected $fillable = ['BatchPK', 'AwalPeriode', 'AkhirPeriode', 'TglSubmit', 'Undangan', 'IsSigning', 'LogSigning', 'Media'];
}
