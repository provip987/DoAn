<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\admin;
use App\Http\Requests\AdminRequest;
class NhanVienController extends Controller
{
    public function DSNV()
    {
        $dsNV= admin::all();
        return view('admin/danh-sach',compact('dsNV'));
    }
    public function themnv(){
        return view('admin/them');
    }
    public function xulythemnv(AdminRequest $request){
        $dsKH= new admin ();

        $dsKH->ten=$request->ten;
        $dsKH->ten_dang_nhap=$request->ten_dang_nhap;
        $dsKH->password=$request->password;
        $dsKH->email=$request->email;
        $dsKH->quyen_id=$request->quyen_id;
        $dsKH->sdt=$request->sdt;
        $dsKH->dia_chi=$request->dia_chi;
     

        $dsKH->save();
        return redirect()->route('DSNV')->with('thong_bao', 'THÊM THÀNH CÔNG');
    }
    function XuLyXoa($id)
    {
        $dsNV = admin::find($id);
        $dsNV->delete();
        $dsNV = admin::all();
        // return view('admin/danh-sach',compact('dsNV'));
        return redirect()->route('DSNV')->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }


    function Sua($id,Request $request)
    {
        

        $dsNV = admin::find($id);
        return view('admin/sua',compact('dsNV'));
    }
    function XuLySua(Request $request,$id)
    {
        $dsNV = admin::find($id);
       
            $dsNV->ten=$request->ten;
            $dsNV->ten_dang_nhap=$request->ten_dang_nhap;
            $dsNV->password=$request->password;
            $dsNV->email=$request->email;
            $dsNV->quyen_id=$request->quyen_id;
            $dsNV->sdt=$request->sdt;
            $dsNV->dia_chi=$request->dia_chi;
            $dsNV->save();
        return redirect()->route('DSNV');
    }
}
