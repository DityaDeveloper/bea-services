<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MAlasanTolak extends Model
{
    //

    protected $table = 'sps.M_AlasanTolak';

    protected $fillable = ['Id', 'AlasanPenolakan', 'IsActive', 'CreatedDate', 'CreatedById', 'UpdatedDate', 'UpdatedById','DeletedDate', 'DeletedById', 'Module'];


}
