<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khach_hang;
use App\Models\admin;
use App\Models\nha_cung_cap;
use App\Http\Requests\NhaCungCapRequest;

class NhaCungCapController extends Controller
{
    public function DanhSach()
    {
        $dsNCC=nha_cung_cap::all();
        return view('SanPham/nha-cung-cap/danhsach',compact('dsNCC')) ;
    }
    function Them(Request $request)
    {
       
        $dsNCC = nha_cung_cap::all();
        return view('SanPham/nha-cung-cap/them',compact('dsNCC'));
        
    }

    function XuLyThem(NhaCungCapRequest $rq)
    {
        $Them = new nha_cung_cap();
        $Them->ten = $rq->ten;
        $Them->dia_chi=$rq->dia_chi;
        $Them->email=$rq->email;
        $Them->so_dien_thoai=$rq->so_dien_thoai;
        $Them->save();
        $dsNCC = nha_cung_cap::all();
        return view('SanPham/nha-cung-cap/danhsach',compact('dsNCC'));
    }
    function Sua($id,Request $request)
    {
        

        $ncc = nha_cung_cap::find($id);
        return view('SanPham/nha-cung-cap/sua',compact('ncc'));
       

        
    }
    function XuLySua(Request $rq,$id)
    {
        $ncc = nha_cung_cap::find($id);
        if($ncc)
        {
            $ncc->ten=$rq->ten;
            $ncc->email=$rq->email;
            $ncc->dia_chi=$rq->dia_chi;
            $ncc->so_dien_thoai=$rq->so_dien_thoai;
            $ncc->save();
        }
        $dsNCC = nha_cung_cap::all();

        return view('SanPham/nha-cung-cap/danhsach',compact('dsNCC'));
    }


    function XuLyXoa($id)
    {
        $ncc = nha_cung_cap::find($id);
        $ncc->delete();
        $dsNCC = nha_cung_cap::all();
        
        return view('SanPham/nha-cung-cap/danhsach',compact('dsNCC'));
        // return redirect()->route('DSNCC')->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }
}
