<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chi_tiet_san_pham extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_san_pham';


    public function sanPham()
    {
        return $this->belongsTo(san_pham::class, 'san_pham_id');
    }
}
