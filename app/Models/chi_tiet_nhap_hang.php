<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chi_tiet_nhap_hang extends Model
{
    use HasFactory;
    protected $table='chi_tiet_nhap_hang';
    public function sanPham() {
        return $this->belongsTo(san_pham::class, 'san_pham_id');
    }
}
