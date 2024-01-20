<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khach_hang;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class APIKhachHangController extends Controller
{

    public function layDanhSach()
    {
        $dsKhachHang = khach_hang::all();
        return response()->json([
            'success' => true,
            'data' => $dsKhachHang
        ]);
    } 
       public function dangNhap(Request $rq)
    {
        try {
            // Xác thực dữ liệu đầu vào
            $validatedData = $rq->validate([
                'ten_dang_nhap' => 'required',
                'password' => 'required'
            ]);
    
            // Kiểm tra thông tin đăng nhập
            $user = khach_hang::where('ten_dang_nhap', $validatedData['ten_dang_nhap'])->first();
    
            // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
            if ($user && Hash::check($validatedData['password'], $user->password)) {
                // Thêm kiểm tra quyền của người dùng ở đây
                if($user->quyen_id == 1) {
                    // Đăng nhập thành công
                    return response()->json([
                        'success' => true,
                        'message' => 'Đăng nhập thành công.',
                        'data' => $user
                    ]);
                } else {
                    // Người dùng không có quyền đăng nhập
                    return response()->json([
                        'success' => false,
                        'message' => 'Bạn không có quyền đăng nhập.'
                    ], 403);
                }
            } else {
                // Đăng nhập thất bại
                return response()->json([
                    'success' => false,
                    'message' => 'Tên đăng nhập hoặc mật khẩu không đúng.'
                ], 401);
            }
        } catch (ValidationException $e) {
            // Lỗi xác thực dữ liệu
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình xác thực dữ liệu.',
                'errors' => $e->validator->getMessageBag()
            ], 422);
        }
    }


    public function themMoi(Request $rq)
    {

        try {
            // Sử dụng validation để kiểm tra dữ liệu đầu vào
            $validatedData = $rq->validate([
                'ten' => 'required|max:255',
                'ten_dang_nhap' => 'required|unique:khach_hang,ten_dang_nhap|max:255', // Đảm bảo tên đăng nhập là duy nhất trong bảng khach_hangs
                'password' => 'required|min:6',
                'email' => 'required|email|unique:khach_hang,email',
                'sdt' => 'required|numeric',
                'dia_chi' => 'required',
                'quyen_id' => 'required|numeric',
            ]);

            // Tạo một khách hàng mới
            $khachHang = new khach_hang();
            $khachHang->ten = $validatedData['ten'];
            $khachHang->ten_dang_nhap = $validatedData['ten_dang_nhap'];
            $khachHang->password = bcrypt($validatedData['password']); // Mã hóa mật khẩu
            $khachHang->email = $validatedData['email'];
            $khachHang->sdt = $validatedData['sdt'];
            $khachHang->dia_chi = $validatedData['dia_chi'];
            $khachHang->quyen_id = $validatedData['quyen_id'];
            $khachHang->save();

            return response()->json([
                'success' => true,
                'message' => "Thêm mới khách hàng thành công.",
                'data' => $khachHang
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình xác thực dữ liệu.',
                'errors' => $e->validator->getMessageBag()
            ], 422);
        }
    }






}
