<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danh_gia;
use App\Models\khach_hang;

class DanhGiaController extends Controller
{
   
    public function DanhSach()
{
    $idKhachHang = session('id_khach_hang'); 
    // Lấy danh sách đánh giá
    $dsDanhGia = danh_gia::with('khach_hang')->latest()->get();
    // Chuyển biến $idKhachHang cho view
    return view('Danh_Gia.danh-sach', compact('dsDanhGia', 'idKhachHang'));
}
    
 
    public function Them(Request $rq)
    {
        // Lấy thông tin khách hàng dựa trên ID từ form
        $idKhachHang = $rq->input('khach_hang_id');
        $khachHang = khach_hang::find($idKhachHang);
    
        // Kiểm tra xem khách hàng có tồn tại hay không
        if (!$khachHang) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin khách hàng.');
        }
        $dsDanhGia = new danh_gia();
        $dsDanhGia->noi_dung = $rq->noi_dung;
        // Liên kết đánh giá với khách hàng
        $dsDanhGia->khach_hang()->associate($khachHang);
        $dsDanhGia->save(); 
        return redirect()->route('DanhGia.DanhSach')->with('success', 'Bình luận đã được thêm thành công.');
    }
    public function Xoa($id)
    {
        $danhGia = danh_gia::find($id);
        $danhGia->delete();
        return redirect()->route('DanhGia.DanhSach')->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }

}
