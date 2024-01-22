<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APIKhachHangController;
use App\Http\Controllers\APIDonHangController;
use App\Http\Controllers\APIAuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/khach-hang",[APIKhachHangController::class,"layDanhSach"]);
Route::post("/khach-hang",[APIKhachHangController::class,"themMoi"]);

//Route::get('/khach-hang/thong-tin', [APIKhachHangController::class, 'layThongTinNguoiDung']);


// routes/api.php

//Route::post("/dang-nhap",[APIKhachHangController::class,"dangNhap"]);
Route::post("/dang-nhap",[APIKhachHangController::class,"login"]);
Route::post("/change-password",[APIKhachHangController::class,"changePassword"]);
Route::group([
    'middleware' => 'api',
    //'prefix' => 'auth'
], function ($router) {
    Route::get('/khach-hang/thong-tin', [APIKhachHangController::class, 'layThongTinNguoiDung']);
    Route::post("/dathang",[APIDonHangController::class,"datHang"]);
    // Route::post('login', 'AuthController@login');
    Route::post('logout', [APIKhachHangController::class,"logout"]);
    // Route::post('refresh',  [APIKhachHangController::class, 'refresh']);
    // Route::post('me', [APIKhachHangController::class, 'me']);
    Route::post("/add-favorite-product",[APIKhachHangController::class,"addFavoriteProduct"]);
    Route::get('/get-favorite-product', [APIKhachHangController::class, 'getFavoriteProduct']);
    Route::get('/get-orders', [APIKhachHangController::class, 'getOrders']);
    Route::post('/dat-hang', [APIKhachHangController::class, 'datHang']);
});



Route::get("/san-pham",[APISanPhamController::class,"layDanhSach"]);
Route::get("/san-pham/{id}",[APISanPhamController::class,"chitietsanpham"]);

Route::get("/san-pham-theo-loai",[APILoaiSanPhamController::class,"dsSanPhamTheoLoai"]);
Route::get("/loai-san-pham",[APILoaiSanPhamController::class,"layDanhSach"]);
Route::post("/loai-san-pham",[APILoaiSanPhamController::class,"themMoi"]);
Route::get("/san-pham-theo-loai/{id}",[APILoaiSanPhamController::class,"dsSanPhamTheoLoaiid"]);



Route::get("/dat-hang",[APIDonHangController::class,"danhSachDonHang"]);
//Route::post('/dat-hang', [APIDonHangController::class, 'datHang']);
