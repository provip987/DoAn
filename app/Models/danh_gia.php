<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danh_gia extends Model
{
    use HasFactory;
    protected $table='danh_gia';
    public function khach_hang()
    {
        return $this->belongsTo(khach_hang::class); 
    }
   

}
