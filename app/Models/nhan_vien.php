<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhan_vien extends Model
{
    
    use HasFactory;
    protected $table="nhan_vien";
    public function quyen() {
        return $this->belongsTo(quyen::class);
    }
}
