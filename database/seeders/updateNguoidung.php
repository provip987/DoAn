<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\admin;

class updateNguoidung extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->ten = "vip";
        $admin->ten_dang_nhap = "vip";
        $admin->email="haha@gmail.com";
        $admin->quyen_id = "2";
        $admin->password = Hash::make("123");
        $admin->sdt = "1";
        $admin->dia_chi = "1";
        $admin->save();
    }
}
