<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhaphangController;
use App\Http\Controllers\DatHangController;
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



Route::middleware('auth')->group(function () {
    Route::prefix('KhachHang')->group(function () {
        Route::name('KhachHang.')->group(function () {
            Route::get('Danhsach', [KhachHangController::class, 'DanhSachKH'])->name('DanhSach');
            Route::get('Them', [KhachHangController::class, 'themKhachHang'])->name('Them');
            Route::post('XuLyThem', [KhachHangController::class, 'xulythemkhachhang'])->name('XuLyThem');
            Route::get('/Sua/{id}', [KhachHangController::class, 'capnhatkhachhang'])->name('Sua');
            Route::post('Sua/{id}', [KhachHangController::class, 'xulycapnhatkhachhang'])->name('XuLySua');
            Route::get('xoaKhachHang/{id}', [KhachHangController::class, 'xulyxoakhachhang'])->name('Xoa');
        });
    });
});



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




Route::middleware('auth')->group(function () {
    Route::prefix('Size')->group(function () {
        Route::name('Size.')->group(function () {
            Route::get('DanhSach', [SizeController::class, 'DanhSachSize'])->name('DanhSach');
            Route::get('Them', [SizeController::class, 'Them'])->name('Them');
            Route::post('Them', [SizeController::class, 'XuLyThem'])->name('XuLyThem');
            Route::get('Xoa/{id}', [SizeController::class, 'XuLyXoa'])->name('Xoa');
            Route::get('Sua/{id}', [SizeController::class, 'Sua'])->name('Sua');
            Route::post('Sua/{id}', [SizeController::class, 'XuLySua'])->name('XuLySua');

        });
    });
});
//Nhan vien

Route::middleware('auth')->group(function () {
    Route::prefix('NhanVien')->group(function () {
        Route::name('NhanVien.')->group(function () {
            Route::get('danh-sach', [NhanVienController::class, 'DSNV'])->name('DanhSach');
            Route::get('Them', [NhanVienController::class, 'themnv'])->name('Them');
            Route::post('Them', [NhanVienController::class, 'xulythemnv'])->name('XuLyThem');
            Route::get('xoa/{id}', [NhanVienController::class, 'XuLyXoa'])->name('Xoa');
            Route::get('sua/{id}', [NhanVienController::class, 'Sua'])->name('Sua');
            Route::post('sua/{id}', [NhanVienController::class, 'XuLySua'])->name('XuLySua');
        });
    });
});

//NhaCungCap
Route::middleware('auth')->group(function () {
    Route::prefix('NhaCungCap')->group(function () {
        Route::name('NhaCungCap.')->group(function () {

            Route::get('danh-sach', [NhaCungCapController::class, 'DanhSach'])->name('DanhSach');
            Route::get('them', [NhaCungCapController::class, 'Them'])->name('Them');
            Route::post('them', [NhaCungCapController::class, 'XuLyThem'])->name('XuLyThem');
            Route::get('Sua/{id}', [NhaCungCapController::class, 'Sua'])->name('Sua');
            Route::post('Sua/{id}', [NhaCungCapController::class, 'XuLySua'])->name('XuLySua');
            Route::get('Xoa/{id}', [NhaCungCapController::class, 'XuLyXoa'])->name('XuLyXoa');

        });
    });
});


// Đánh giá

Route::middleware('auth')->group(function () {
    Route::prefix('DanhGia')->group(function () {
        Route::name('DanhGia.')->group(function () {
            Route::get('DanhSach', [DanhGiaController::class, 'DanhSach'])->name('DanhSach');
            Route::post('DanhSach', [DanhGiaController::class, 'Them'])->name('them');
            Route::get('Xoa/{id}', [DanhGiaController::class, 'Xoa'])->name('xoa');
        });
    });
});



Route::middleware('auth')->group(function () {
    Route::prefix('NhapHang')->group(function () {
        Route::name('PhieuNhap.')->group(function () {
            Route::get('DanhSach', [NhaphangController::class, 'DanhSach'])->name('DanhSach');
            Route::get('NhapHang', [NhaphangController::class, 'Nhap'])->name('Nhap');
            Route::post('nhap-hang', [NhaphangController::class, 'xuLyNhap'])->name('xuLyNhap');
            Route::get('Chi-Tiet/DanhSach/{id}', [NhaphangController::class, 'danhSachChiTietNhapHang'])->name('danhSachChiTiet');
            Route::get('xoa/{id}', [NhaphangController::class, 'xoaNhapHang'])->name('Xoa');
        });
    });
});



Route::middleware('auth')->group(function () {
    Route::prefix('DonHang')->group(function () {
        Route::name('DonHang.')->group(function () {
            Route::get('DanhSach', [DatHangController::class, 'DanhSachDH'])->name('DanhSach');
            Route::get('DanhSachChiTiet/{id}', [DatHangController::class, 'danhSachChiTietDH'])->name('danhSachChiTiet');
            Route::put('/cap-nhat-trang-thai/{id}', [DatHangController::class, 'capNhatTrangThai'])->name('capNhatTrangThai');
        });
    });
});






