<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\hinh_anh;
use App\Models\loai;
use App\Models\size;
use App\Models\chi_tiet_san_pham;
use App\Http\Requests\SanPhamRequest;

class SanPhamController extends Controller
{
    public function DanhSach(){
        $dsSanPham = san_pham::with('hinh_anh')->get();
        $hinhanh= hinh_anh::all();
        $DsLoai = loai::all();
       
        return view('SanPham/danh-sach',compact('dsSanPham','hinhanh'));
    }
        public function Them(){
            $DsLoai = loai::all();
            return view('SanPham/them',compact('DsLoai'));
        }
        public function XuLyThem(SanPhamRequest $rq){
    
        
            $dsSanPham =new san_pham;
            

            $files = $rq->hinh_anh;
            $dsSanPham->loai_san_pham_id=$rq->loai_san_pham_id;
            $dsSanPham->ten_san_pham=$rq->ten_san_pham;
            $dsSanPham->gia=$rq->gia;
            $dsSanPham->gia_cu=$rq->gia_cu;
            $dsSanPham->mo_ta=$rq->mo_ta;
            $dsSanPham->mo_ta_chi_tiet=$rq->mo_ta_chi_tiet;
            $dsSanPham->save();
           
            $hinhanh = new hinh_anh();
            
            $hinhanh->url = $files->store('Hinh_Anh'); // Lưu trữ trong thư mục storage/app/public/Hinh_Anh
            $hinhanh->san_pham_id = $dsSanPham->id;
            $hinhanh->save();

            
            return redirect()->route('SanPham.DanhSach')->with('thong_bao', 'thêm thành công');
            
        }
    public function Sua($id){
        $sanPham = san_pham::find($id);
        $hinhanh= hinh_anh::all();
        $DsLoai=loai::all();
        if (!$sanPham) {
            return redirect()->route('SanPham.DanhSach')->with('thong_bao', 'Sản phẩm không tồn tại');
        }
    
        // Có thể truyền biến $sanPham sang view để hiển thị thông tin sản phẩm trong form sửa
        return view('SanPham/sua', compact('sanPham','hinhanh','DsLoai'));
    }

    public function xulySua(Request $rq, $id){
        $sanPham = san_pham::find($id);
        $hinhanh= hinh_anh::all();
        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$sanPham) {
            return redirect()->route('SanPham.DanhSach')->with('thong_bao', 'Sản phẩm không tồn tại');
        }
        // Lấy hình ảnh cũ
        $hinhanh = hinh_anh::where('san_pham_id', $sanPham->id)->first();
        // Lấy hình ảnh mới từ form
        $files = $rq->hinh_anh;
        // Cập nhật thông tin sản phẩm
        $sanPham->loai_san_pham_id = $rq->loai_san_pham_id;
        $sanPham->ten_san_pham = $rq->ten_san_pham;
        $sanPham->gia = $rq->gia;
        $sanPham->gia_cu = $rq->gia_cu;
       
        $sanPham->mo_ta = $rq->mo_ta;
        $sanPham->mo_ta = $rq->mo_ta_chi_tiet;
        $sanPham->save();
    
        // Nếu người dùng chọn hình ảnh mới, cập nhật
        if ($files) {
            // Cập nhật hoặc thêm hình ảnh
            if (!$hinhanh) {
                $hinhanh = new hinh_anh();
            }
            $hinhanh->url = $files->store('Hinh_Anh');
            $hinhanh->san_pham_id = $sanPham->id;
            $hinhanh->save();
        }
        $newImage = hinh_anh::where('san_pham_id', $id)->latest()->first();

        

    
        return redirect()->route('SanPham.DanhSach')->with('thong_bao', 'Cập nhật thành công');


    }
    
    function XuLyXoa($id)
    {
        $sanpham = san_pham::find($id);
        $sanpham->delete();
        $dsSanPham = san_pham::all();
        return redirect()->route('SanPham.DanhSach')->with('thong_bao', 'thành công');
    }
    function ChiTietSanPham($id){
        $sanPham = san_pham::find($id);
        
        $chiTietSanPham = chi_tiet_san_pham::where('san_pham_id', $sanPham->id)->get();
    
        return view('SanPham/chitietSanPham/danh-sach', compact('sanPham', 'chiTietSanPham'));
    }
    function XoaChiTiet($id){
        $chiTietSanPham = chi_tiet_san_pham::find($id);
        $sanPhamId = $chiTietSanPham->san_pham_id; // Lấy id của sản phẩm trước khi xóa
    
        $chiTietSanPham->delete();
    
        return redirect()->route('SanPham.ChiTietSanPham', ['id' => $sanPhamId])->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }
    public function ThemChiTiet($san_pham_id){
        $sanPham = san_pham::find($san_pham_id);
        $dsSize=size::all();
        return view('SanPham/chitietSanPham/them', compact('sanPham','dsSize'));
    }
    

    public function XuLyThemChiTiet(Request $rq){

        // Lấy thông tin từ Request
        $sanPhamId = $rq->san_pham_id;

        $chiTietSanPham = new chi_tiet_san_pham();
        $chiTietSanPham->san_pham_id = $sanPhamId;
        $chiTietSanPham->size_id = $rq->input('size_id');
        $chiTietSanPham->so_luong = $rq->input('so_luong');
        $chiTietSanPham->gia = $rq->input('gia');
    
        $chiTietSanPham->save();
    
        // Truyền giá trị sanPhamId và thong_bao sang view
        return redirect()->route('SanPham.ChiTietSanPham', ['id' => $sanPhamId])->with(['sanPhamId' => $sanPhamId, 'thong_bao' => 'Thêm chi tiết sản phẩm thành công']);
    }
    public function SuaChiTiet($id)
    {
        // Lấy thông tin sản phẩm và chi tiết sản phẩm
        $chiTietSanPham = chi_tiet_san_pham::find($id);

        // Kiểm tra xem có chi tiết sản phẩm không
        if (!$chiTietSanPham) {
            // Nếu không có, bạn có thể xử lý ở đây, ví dụ: redirect hoặc hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Chi tiết sản phẩm không tồn tại.');
        }

        // Trả về view sửa chi tiết sản phẩm với dữ liệu cần thiết
        return view('SanPham/chitietSanPham/sua', compact('chiTietSanPham'));
    }

    // Method để xử lý sửa chi tiết sản phẩm
    public function XuLySuaChiTiet(Request $rq,$id)
    {
      
        $chiTietSanPham = chi_tiet_san_pham::find($id);
        $sanPhamId = $rq->san_pham_id;

        // Lấy chi tiết sản phẩm cần sửa
        $chiTietSanPham = chi_tiet_san_pham::where('san_pham_id', $sanPhamId)->first();


        // Kiểm tra xem có chi tiết sản phẩm không
        if (!$chiTietSanPham) {
            // Nếu không có, bạn có thể xử lý ở đây, ví dụ: redirect hoặc hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Chi tiết sản phẩm không tồn tại.');
        }
        $chiTietSanPham->size_id = $rq->san_pham_id;
        // Cập nhật thông tin của chi tiết sản phẩm
        $chiTietSanPham->size_id = $rq->input('size_id');
        $chiTietSanPham->so_luong = $rq->input('so_luong');
        $chiTietSanPham->gia = $rq->input('gia');
        $chiTietSanPham->save();

        // Truyền giá trị sanPhamId và thong_bao sang view
        return redirect()->route('SanPham.ChiTietSanPham', ['id' => $sanPhamId])->with(['sanPhamId' => $sanPhamId, 'thong_bao' => 'Sửa chi tiết sản phẩm thành công']);
    }
    

  
}
