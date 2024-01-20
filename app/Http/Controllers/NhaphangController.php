<?php

namespace App\Http\Controllers;

use App\Models\chi_tiet_san_pham;
use Illuminate\Http\Request;
use Controllers\NhaCungCapController;
use App\Models\nha_cung_cap;
use App\Models\chi_tiet_nhap_hang;
use App\Models\san_pham;

use App\Models\size;
use App\Models\nhap_hang;


use Controllers\SanPhamController;

class NhaphangController extends Controller
{
    public function nhap()
    {
        $dsSize = size::all();
        $dsSanPham = san_pham::all();
        $dsNCC = nha_cung_cap::all();
        return view('Nhap-Hang/nhap-hang', compact('dsNCC', 'dsSanPham', 'dsSize'));
    }
    function DanhSach(Request $request)
    {
        $dsSize = size::all();
        $dsSanPham = san_pham::all();
        $dsNCC = nha_cung_cap::all();
        $DsPhieuNhap = nhap_hang::all();
        return view('Nhap-Hang/danh-sach', compact('dsNCC', 'dsSanPham', 'dsSize', 'DsPhieuNhap'));
    }

    public function xuLyNhap(Request $rq)
    {
        // dd($rq);
        // Tạo một bản ghi mới trong bảng NhapHang
        $nhapHang = new nhap_hang();
        $nhapHang->nha_cung_cap_id = $rq->ncc;
        $nhapHang->ngay_nhap = $rq->ngayNhap; // Có thể điều chỉnh dựa trên yêu cầu của bạn
        $nhapHang->tong_tien = 0; // Khởi tạo tổng số tiền
        $nhapHang->save();

        $tongTien = 0;
        // dd(count((array)$rq->spID));
        // Lặp qua các sản phẩm được gửi
        for ($i = 0; $i < count($rq->spID); $i++) {
            // Tạo một bản ghi mới trong bảng ChiTietNhapHang

            $chiTietNhapHang = new chi_tiet_nhap_hang();
            $chiTietNhapHang->nhap_hang_id = $nhapHang->id;
            $chiTietNhapHang->san_pham_id = $rq->spID[$i];
            $chiTietNhapHang->size_id = $rq->sizeID[$i];
            $chiTietNhapHang->so_luong = $rq->soLuong[$i];
            $chiTietNhapHang->gia_nhap = $rq->giaNhap[$i];
            $chiTietNhapHang->gia_ban = $rq->giaBan[$i];
            $chiTietNhapHang->thanh_tien = $rq->soLuong[$i] * $rq->giaNhap[$i];
            // dd($chiTietNhapHang);
            $chiTietNhapHang->save();


            $chiTietSanPham = chi_tiet_san_pham::where('san_pham_id', $rq->spID[$i])
                ->where('size_id', $rq->sizeID[$i])
                ->first();
            if ($chiTietSanPham) {
                $chiTietSanPham->so_luong += $rq->soLuong[$i];
                $chiTietSanPham->gia = $rq->giaBan[$i];
                $chiTietSanPham->save();
            } else {


                $chiTietSanPham = new chi_tiet_san_pham();
                $chiTietSanPham->san_pham_id = $rq->spID[$i];
                $chiTietSanPham->size_id = $rq->sizeID[$i];
                $chiTietSanPham->so_luong = $rq->soLuong[$i];
                $chiTietSanPham->gia = $rq->giaBan[$i];

                $chiTietSanPham->save();
            }

            $sanPham = san_pham::find($rq->spID[$i]);
            if ($sanPham) {
                $sanPham->gia = $rq->giaBan[$i]; // Cập nhật giá mới
                $sanPham->save();
            }

            // Cập nhật tổng số tiền cho NhapHang
            $tongTien += $chiTietNhapHang->thanh_tien;
        }

        // Cập nhật tổng số tiền cho NhapHang
        $nhapHang->tong_tien = $tongTien;
        $nhapHang->save();

        $DsPhieuNhap = nhap_hang::all();

        return view('Nhap-hang/danh-sach', compact('DsPhieuNhap', ));
    }



    public function danhSachChiTietNhapHang($id)
    {
        $nhapHang = nhap_hang::with('chiTietNhapHang.sanPham')->find($id);

        if (!$nhapHang) {
            // Xử lý nếu không tìm thấy nhap_hang
        }

        return view('Nhap-Hang/Chi-Tiet-Nhap-Hang/danh-sach', compact('nhapHang'));
    }
    public function xoaNhapHang($id)
    {
        $nhapHang = nhap_hang::find($id);

    
        if (!$nhapHang) {
            return redirect()->back()->with('thong_bao', 'Phiếu nhập hàng không tồn tại.');
        }

        chi_tiet_nhap_hang::where('nhap_hang_id', $nhapHang->id)->delete();

        $nhapHang->delete();

        return redirect()->route('PhieuNhap.DanhSach')->with('thong_bao', 'Xoá phiếu nhập hàng thành công.');
    }



}

