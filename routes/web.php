<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhaphangController;
use App\Http\Controllers\PhieuXuatController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\SizeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return View('trang-chu');
})->name('trangchu')->middleware('auth');

Route::get('/DangNhap', [AccountController::class, 'Login'])->name('DangNhap')->middleware('guest');
Route::post('/DangNhap', [AccountController::class, 'KTLogin'])->name('XLDangNhap');
Route::get('/DangXuat', [AccountController::class, 'logout'])->name('DangXuat');
Route::get('/DangKy', [AccountController::class, 'register'])->name('Dangky');
Route::post('/XLDangky', [AccountController::class, 'XLRegister']);


Route::middleware('auth')->group(function () {
    Route::prefix('Loai')->group(function () {
        Route::name('Loai.')->group(function () {
            Route::get('DanhSach', [LoaiController::class, 'DanhSachLoai'])->name('DanhSach');
            Route::get('Them', [LoaiController::class, 'Them'])->name('them');
            Route::post('Them', [LoaiController::class, 'XuLyThem'])->name('XuLyThem');
            Route::get('Sua/{id}', [LoaiController::class, 'Sua'])->name('Sua');
            Route::post('Sua/{id}', [LoaiController::class, 'XuLySua'])->name('XuLySua');
            Route::get('Xoa/{id}', [LoaiController::class, 'XuLyXoa'])->name('xuLyXoa');
        });

    });
});

//client

Route::get('KhachHang/DS', [KhachHangController::class, 'DanhSachKH'])->name('KhachHang.DanhSach');
Route::get('KhachHang/Them', [KhachHangController::class, 'themKhachHang'])->name('KhachHang.Them');
Route::post('KhachHang/Them', [KhachHangController::class, 'xulythemkhachhang'])->name('KhachHang.XuLyThem');
Route::get('KhachHang/Sua/{id}', [KhachHangController::class, 'capnhatkhachhang'])->name('KhachHang.Sua');
Route::post('KhachHang/Sua/{id}', [KhachHangController::class, 'xulycapnhatkhachhang'])->name('KhachHang.XuLySua');
Route::get('KhachHang/xoaKhachHang/{id}', [KhachHangController::class, 'xulyxoakhachhang'])->name('KhachHang.Xoa');

//san pham

Route::middleware('auth')->group(function () {
    Route::prefix('SanPham')->group(function () {
        Route::name('SanPham.')->group(function () {
            Route::get('Them', [SanPhamController::class, 'Them'])->name('Them');
            Route::post('XuLyThem', [SanPhamController::class, 'XuLyThem'])->name('XuLyThem');
            Route::get('danh-sach', [SanPhamController::class, 'DanhSach'])->name('DanhSach');
          
           
            Route::get('Sua/{id}', [SanPhamController::class, 'Sua'])->name('Sua');
            Route::post('Sua/{id}', [SanPhamController::class, 'XuLySua'])->name('XuLySua');
            Route::get('xoa/{id}', [SanPhamController::class, 'XuLyXoa'])->name('Xoa');

            Route::get('chitietsanpham/{id}', [SanPhamController::class, 'ChiTietSanPham'])->name('ChiTietSanPham');
            Route::get('chitietsanpham/xoa/{id}', [SanPhamController::class, 'XoaChiTiet'])->name('XoaChiTiet');
            Route::get('ThemChiTiet/{id}', [SanPhamController::class, 'ThemChiTiet'])->name('ThemChiTiet');
            Route::post('XuLyThemChiTiet', [SanPhamController::class, 'XuLyThemChiTiet'])->name('XuLyThemChiTiet');
            Route::get('SuaChiTiet/{id}', [SanPhamController::class, 'SuaChiTiet'])->name('SuaChiTiet');
            Route::post('SuaChiTiet/{id}', [SanPhamController::class, 'XuLySuaChiTiet'])->name('XuLySuaChiTiet');
        });
    });
});





//Nhan vien

Route::get('NhanVien/DS', [NhanVienController::class, 'DSNV'])->name('DSNV'); 
Route::get('NhanVien/themnv', [NhanVienController::class, 'themnv'])->name('themnv');
Route::post('NhanVien/themnv', [NhanVienController::class, 'xulythemnv'])->name('xulythemnv');
Route::get('NhanVien/xoa/{id}', [NhanVienController::class, 'XuLyXoa'])->name('xoanhanvien');
Route::get('NhanVien/sua/{id}', [NhanVienController::class, 'Sua'])->name('suanhanvien');
Route::post('NhanVien/sua/{id}', [NhanVienController::class, 'XuLySua'])->name('NhanVien.xualysua');

//NhaCungCap

Route::get('NhaCungCap/san-pham', [NhaCungCapController::class, 'DanhSach'])->name('NhaCungCap.DanhSach');
Route::get('NhaCungCap/them', [NhaCungCapController::class, 'Them'])->name('NhaCungCap.Them');
Route::post('NhaCungCap/them', [NhaCungCapController::class, 'XuLyThem'])->name('NhaCungCap.XuLyThem');
Route::get('NhaCungCap.Sua/{id}', [NhaCungCapController::class, 'Sua'])->name('NhaCungCap.Sua');
Route::post('NhaCungCap.Sua/{id}', [NhaCungCapController::class, 'XuLySua'])->name('NhaCungCap.XuLySua');
Route::get('NhaCungCap.Xoa/{id}', [NhaCungCapController::class, 'XuLyXoa'])->name('NhaCungCap.XuLyXoa');


// Đánh giá

Route::get('DanhGia/DanhSach', [DanhGiaController::class, 'DanhSach'])->name('DanhGia.DanhSach');
Route::post('DanhGia/DanhSach', [DanhGiaController::class, 'Them'])->name('DanhGia.them');
Route::get('DanhGia/Xoa/{id}', [DanhGiaController::class, 'Xoa'])->name('DanhGia.xoa');



Route::get('Nhap-Hang/DanhSach', [NhaphangController::class, 'DanhSach'])->name('PhieuNhap.DanhSach');
Route::get('Nhap-Hang/NhapHang', [NhaphangController::class, 'Nhap'])->name('PhieuNhap.Nhap');
Route::post('Nhap-Hang/nhap-hang', [NhaphangController::class, 'xuLyNhap'])->name('PhieuNhap.xuLyNhap');



Route::get('Nhap-Hang/Chi-Tiet/DanhSach/{id}', [NhaphangController::class,'danhSachChiTietNhapHang'])->name('PhieuNhap.danhSachChiTiet');

Route::get('/nhap-hang/xoa/{id}', [NhaphangController::class,'xoaNhapHang'])->name('PhieuNhap.Xoa');


//size


Route::get('Size/DanhSach', [SizeController::class, 'DanhSachSize'])->name('Size.DanhSach');
Route::get('Size/Them', [SizeController::class, 'Them'])->name('Size.Them');
Route::post('Size/Them', [SizeController::class, 'XuLyThem'])->name('Size.XuLyThem');
Route::get('Size/Xoa/{id}', [SizeController::class, 'XuLyXoa'])->name('Size.Xoa');
Route::get('Size/Sua/{id}', [SizeController::class, 'Sua'])->name('Size.Sua');
Route::post('Size/Sua/{id}', [SizeController::class, 'XuLySua'])->name('Size.XuLySua');