<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hinh_anh extends Model
{
    use HasFactory;
    protected $table='hinh_anh';
    public function san_pham(){
        return $this->belongsTo(hinh_anh::class);
    }

    
  
}
