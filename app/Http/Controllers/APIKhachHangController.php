<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khach_hang;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\favorite_product;
use App\Models\san_pham;
use App\Models\dat_hang;
use App\Models\chi_tiet_dat_hang;
use Illuminate\Support\Facades\DB;
class APIKhachHangController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:api', ['except' => ['login']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'ten_dang_nhap' => 'required',
            'password' => 'required'
        ]);
        $credentials = request(['ten_dang_nhap', 'password']);
        // Find the user by the 'ten_dang_nhap' field
        $user = khach_hang::where('ten_dang_nhap', $credentials['ten_dang_nhap'])->first();
        // Check if the user exists and the provided password is correct
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // Generate the JWT token
        $token = auth()->login($user);
        
        return $this->respondWithToken($token);
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 0
        ]);
    }
     /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

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

    public function layThongTinNguoiDung(Request $request) {
        return response()->json(auth('api')->user());
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


    public function addFavoriteProduct(Request $request){
        $user = auth('api')->user();
        $productId = $request->product_id;
        $favoriteProduct = new favorite_product();
        try{
            $favoriteProduct->add($user->id, $productId);
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function getFavoriteProduct(Request $request){
        try{
            $user = auth('api')->user();
            $favoriteProduct = favorite_product::where('user_id',$user->id)->first();
            $products = san_pham::whereIn('san_pham.id',json_decode($favoriteProduct->products))
            ->join('hinh_anh', 'san_pham.id', '=', 'hinh_anh.san_pham_id')
            ->select('hinh_anh.url','san_pham.ten_san_pham', 'san_pham.gia')
            ->get();
            return response()->json([
                'success' => true,
                'products' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function getOrders(Request $request){
        try{
            $user = auth('api')->user();
            $orders = dat_hang::where('khachhang_id', $user->id)
            ->select('id', 'tong_tien', 'trang_thai', 'ghi_chu')
            ->get();

            $details = dat_hang::where('khachhang_id', $user->id)
            ->join('chi_tiet_dat_hang', 'dat_hang.id', '=', 'chi_tiet_dat_hang.dat_hang_id')
            ->join('san_pham', 'san_pham.id', '=', 'chi_tiet_dat_hang.san_pham_id')
            ->join('hinh_anh', 'san_pham.id', '=', 'hinh_anh.san_pham_id')
            ->join('chi_tiet_san_pham', function ($join) {
                $join->on('chi_tiet_san_pham.san_pham_id', '=', 'chi_tiet_dat_hang.san_pham_id')
                     ->on('chi_tiet_san_pham.size_id', '=', 'chi_tiet_dat_hang.size_id');
            })
            ->select('dat_hang.id', 'chi_tiet_dat_hang.tong_tien', 'san_pham.gia',
                'chi_tiet_dat_hang.so_luong', 'chi_tiet_dat_hang.tong_tien', 'hinh_anh.url', 'san_pham.ten_san_pham', 'ghi_chu', 'trang_thai')
            ->get();
            
            return response()->json([
                'success' => true,
                'orders' => $orders,
                'details' => $details
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function datHang(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = auth('api')->user();
            // Tạo đơn hàng mới
            $datHang = new dat_hang();
            $datHang->khachhang_id = $user->id;
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
