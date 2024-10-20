<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Gaji extends Model
{
    use HasFactory;

    protected $dates = ['tgl_gajian'];
    protected $guarded = [];

    
}
