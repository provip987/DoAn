<?php

namespace App\Http\Controllers;
use App\Models\size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    function DanhSachSize()
    {
            $DsSize = size::all();
        return view('Size/danh-sach',compact('DsSize'));

    }
    function Them()
    {
     
            return view('Size/them');
    }

    function XuLyThem(SizeRequest $rq)
    {
        $Size = new size();
      
        $Size->ten = $rq->ten;
        $Size->save();
        $DsSize = size::all();
       
        return redirect()->route('Size.DanhSach')->with('thong_bao', 'THÊM THÀNH CÔNG');
    }
    function Sua($id,Request $rq)
    {
        $Size=size::find($id);
        return view('Size/sua',compact('Size'));
    }
    function XuLySua($id,Request $rq){
        $Size=size::find($id);
        if($Size){
            $Size->ten=$rq->ten;
            $Size->save();
        }
        $DsSize=size::all();
        return redirect()->route('Size.DanhSach')->with('thong_bao', 'SỮA THÀNH CÔNG');


    }


    function XuLyXoa($id){
        $Size=size::find($id);
        $Size->delete();
        $DsSize=size::all();
        return redirect()->route('Size.DanhSach')->with('thong_bao', 'XOÁ THÀNH CÔNG');
    }
}
