<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MProgramBeasiswa extends Model
{
     //

    protected $table = 'dbo.m_program_beasiswa';

    protected $fillable = ['id', 'program_beasiswa', 'is_active', 'template_sp', 'template_sk', 'UPDATED_DATE'];
}
