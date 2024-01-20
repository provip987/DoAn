<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class khach_hang extends Authenticatable
{
    
    use HasFactory;
    protected $table="khach_hang";
    public function quyen() {
        return $this->belongsTo(quyen::class);
    }
    protected $hidden = [
        'password',];
}
