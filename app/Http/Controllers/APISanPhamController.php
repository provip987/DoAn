<?php

namespace App\Http\Controllers;
use App\Models\san_pham;
use Illuminate\Http\Request;

class APISanPhamController extends Controller
{
    public function layDanhSach(){
       $dsSanPham = san_pham::with(['hinh_anh', 'chiTietSanPham'])->get();

        return response()->json([
            'success' => true,
            'data' => $dsSanPham
        ]);
    }
    public function chitietsanpham($id) {
        $sanPham = san_pham::with(['hinh_anh', 'chiTietSanPham'])->find($id);
    
        if (empty($sanPham)) {
            return response()->json([
                'success' => false,
                'message' => "San pham id {$id} khong ton tai"
            ]);
        }
    
        return response()->json([
            'success' => true,
            'data' => $sanPham
        ]);
    }
    
}
