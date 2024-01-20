<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{

    use HasFactory;
    protected $table = "admin";
    public function quyen()
    {
        return $this->belongsTo(quyen::class);
    }
}
