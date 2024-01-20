<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai;
use App\Models\san_pham;
use App\Models\hinh_anh;
use App\Http\Requests\LoaiRequest;

class LoaiController extends Controller
{
    function DanhSachLoai(Request $request)
    {
            $DsLoai = loai::all();
        return view('Loai_SP/danh-sach',compact('DsLoai'));

    }

    function Them(Request $request)
    {
     
            return view('Loai_SP/them');
    }

    function XuLyThem(LoaiRequest $rq)
    {
        $Loai = new loai();
      
        $Loai->ten = $rq->ten;
        $Loai->save();
        $DsLoai = loai::all();
       
        return redirect()->route('Loai.DanhSach')->with('thong_bao', 'THÊM THÀNH CÔNG');
    }

    function Sua($id,Request $request)
    {
        
       $Loai = loai::find($id);
        return view('Loai_SP/Sua',compact('Loai'));
       
        
    }

    function XuLySua(Request $rq,$id)
    {
        $Loai = loai::find($id);
        if($Loai)
        {
         
            $Loai->ten = $rq->ten;
            $Loai->save();
        }
        $DsLoai = loai::all();
        return redirect()->route('Loai.DanhSach')->with('thong_bao', 'SỮA THÀNH CÔNG');
    }

    function XuLyXoa($id)
    {
        $Loai = loai::find($id);
        $Loai->delete();
        $DsLoai = loai::all();
        return redirect()->route('Loai.DanhSach')->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }
}
