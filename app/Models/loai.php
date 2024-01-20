<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    use HasFactory;
    protected $table = "loai";


    
    function ds_san_pham()
    {
        return $this->hasMany(san_pham::class);
    }
    public function sanPhams()
{
    return $this->hasMany(san_pham::class, 'loai_san_pham_id');
}

}
