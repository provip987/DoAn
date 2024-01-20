<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dat_hang extends Model
{
    use HasFactory;

    protected $table='dat_hang';
    public function chi_tiet()
    {
        return $this->hasMany(chi_tiet_dat_hang::class, 'dat_hang_id', 'id');
    }
}
