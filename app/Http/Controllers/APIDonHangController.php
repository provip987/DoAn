<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dat_hang;
use App\Models\chi_tiet_dat_hang;
use Illuminate\Support\Facades\DB;

class APIDonHangController extends Controller
{
    public function danhSachDonHang(Request $request)
    {
        $dsDonHang = dat_hang::with(['chi_tiet'])->get();

        if ($dsDonHang->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Không có đơn hàng nào.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $dsDonHang
        ]);
    }


    public function datHang(Request $request)
    {
        // Bắt đầu transaction
        DB::beginTransaction();

        try {
            // Tạo đơn hàng mới
            $datHang = new dat_hang();
            $datHang->khachhang_id = $request->khachhang_id;
            $datHang->tong_tien = $request->tong_tien;
            $datHang->trang_thai = $request->trang_thai;
            $datHang->ghi_chu = $request->ghi_chu;
            $datHang->save();

            // Lưu chi tiết đơn hàng
            foreach ($request->chi_tiet as $chiTiet) {
                $chiTietDonHang = new chi_tiet_dat_hang();
                $chiTietDonHang->dat_hang_id = $datHang->id;
                $chiTietDonHang->san_pham_id = $chiTiet['san_pham_id'];
                $chiTietDonHang->size_id = $chiTiet['size_id'];
                $chiTietDonHang->so_luong = $chiTiet['so_luong'];
                $chiTietDonHang->tong_tien = $chiTiet['tong_tien'];
                $chiTietDonHang->save();
            }

            // Hoàn thành transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Đặt hàng thành công'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            // Ghi log lỗi
            \Log::error('Lỗi đặt hàng: ' . $e->getMessage());
    
            // Trả về thông báo lỗi cụ thể
            return response()->json([
                'success' => false,
                'message' => 'Lỗi trong quá trình đặt hàng: ' . $e->getMessage()
            ]);
        }
    }
}


