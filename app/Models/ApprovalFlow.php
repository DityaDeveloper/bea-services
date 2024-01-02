<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalFlow extends Model
{
    //
    protected $table = 'sps.ApprovalFlow';

    protected $fillable = ['ReqType', 'Status', 'Keterangan', 'NextStatus', 'Role', 'IdModule'];
}
