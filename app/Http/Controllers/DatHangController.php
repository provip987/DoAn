<?php

namespace App\Http\Controllers;
use App\Models\dat_hang;
use Illuminate\Http\Request;
use App\Models\chi_tiet_dat_hang;
class DatHangController extends Controller
{
    public function DanhSachDH()
    {
       $DsDh=dat_hang::all();
       return view('Dat_Hang.danh-sach',compact('DsDh'));
    }
    public function danhSachChiTietDH($id)
    {
        $datHang = dat_hang::find($id);


   
        
        $chiTietDatHang = chi_tiet_dat_hang::where('dat_hang_id', $datHang->id)->get();

        if (!$datHang) {
            // Xử lý nếu không tìm thấy nhap_hang
        }

        return view('Dat_Hang/danh-sach-chi-tiet', compact('datHang','chiTietDatHang'));
    }

}
