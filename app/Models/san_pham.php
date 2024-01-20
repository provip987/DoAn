<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hinh_anh;
use App\Models\chi_tiet_san_pham;
class san_pham extends Model
{
    use HasFactory;
    protected $table = 'san_pham';

    public function hinh_anh()
    {
        return $this->hasMany(hinh_anh::class);

    }
    public function chiTietSanPham()
    {
        return $this->hasMany(chi_tiet_san_pham::class, 'san_pham_id');
    }

    public function loai()
    {
        return $this->belongsTo(loai::class);
    }
    public function nha_cung_cap()
    {
        return $this->belongsTo(nha_cung_cap::class);
    }
    public function chiTietNhapHang()
    {
        return $this->hasMany(chi_tiet_nhap_hang::class, 'san_pham_id');
    }
    public function loaiSanPham()
    {
        return $this->belongsTo(loai::class, 'loai_san_pham_id');
    }
}

