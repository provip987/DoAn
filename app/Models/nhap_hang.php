<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhap_hang extends Model
{
    use HasFactory;
    
    protected $table="nhap_hang";


    public function chiTietNhapHang() {
        return $this->hasMany(chi_tiet_nhap_hang::class, 'nhap_hang_id');
    }
}
