<?php
namespace App\Http\Controllers;
use App\Models\khach_hang;
use Illuminate\Http\Request;
use App\Http\Requests\KhachHangRequest;

class KhachHangController extends Controller
{
    //
    public function DanhSachKH()
    {
        $dsKH= khach_hang::all();
        return view('Khach_Hang.danh-sach',compact('dsKH'));
    }
    public function themKhachHang(){
        return view('Khach_hang.them');
    }
    public function xulythemkhachhang(KhachHangRequest $request){
        $dsKH= new khach_hang ();
  
        $dsKH->ten=$request->ten;
        $dsKH->ten_dang_nhap=$request->ten_dang_nhap;
        $dsKH->password=$request->password;
        $dsKH->email=$request->email;
        $dsKH->sdt=$request->sdt;
        $dsKH->dia_chi=$request->dia_chi;
        $dsKH->quyen_id=$request->quyen_id=1;
    
        $dsKH->save();
        return redirect()->route('KhachHang.DanhSach')->with('thong_bao', 'THÊM THÀNH CÔNG');
    }
    public function capnhatkhachhang(khach_hang $id){
        return view('Khach_Hang/sua',['id'=>$id]);
    }
    
    public function xulycapnhatkhachhang(Request $request,$id){
        $dsKH =khach_hang ::find($id);
        if($dsKH){
         
            $dsKH->ten = $request->ten;
            $dsKH->ten_dang_nhap = $request->ten_dang_nhap;
            $dsKH->password=$request->password;
            $dsKH->email=$request->email;
            $dsKH->sdt=$request->sdt;
            $dsKH->dia_chi=$request->dia_chi;
            $dsKH->quyen_id=$request->quyen_id=1;
    
            $dsKH->save();

        }
      
        return redirect()->route('KhachHang.DanhSach',['id'=>$dsKH])->with('thong_bao', 'SỮA THÀNH CÔNG');
    }
    public function  xulyxoakhachhang( $id){
        
        $dsKH = Khach_hang::find($id);
        $dsKH->delete();
        
        return redirect()->route('KhachHang.DanhSach')->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }


        

         

    
}
