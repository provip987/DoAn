<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chi_tiet_dat_hang extends Model
{
    use HasFactory;


    protected $table='chi_tiet_dat_hang';
    public function datHang()
    {
        return $this->belongsTo(dat_hang::class, 'dat_hang_id', 'id');
    }
}
