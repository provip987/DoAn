@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SỮA CHI TIẾT SẢN PHẨM</h1>
</div>
<form method="POST" enctype="multipart/form-data" action="{{route('SanPham.XuLySuaChiTiet', ['id' => $chiTietSanPham->id])}}">
    @csrf
    <table border=0>
    <tr>
            <th>Sản Phẩm ID</th>
            <td>
                @if($chiTietSanPham)
                <h2>&nbsp;{{ $chiTietSanPham->san_pham_id  }}</h2>

                    <input type="hidden" name="san_pham_id" value="{{ $chiTietSanPham->san_pham_id }}"/>
                @endif
            </td>


            <td>

        </tr>

        <tr>
            <th>Size ID</th>
            <td>
                @if($chiTietSanPham)
                    <input type="text" name="size_id" value="{{ $chiTietSanPham->size_id }}"/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Số Lượng</th>
            <td>
                @if($chiTietSanPham)
                    <input type="text" name="so_luong" value="{{ $chiTietSanPham->so_luong }}"/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Giá</th>
            <td>
                @if($chiTietSanPham)
                    <input type="text" name="gia" value="{{ $chiTietSanPham->gia }}"/>
                @endif
            </td>
        </tr>

        <tr>
            <th></th>
            <td>
                <button type="submit">Lưu</button>
                <a href="javascript:history.back()">
                    <button type="button">Trở về</button>
                </a>
            </td>
        </tr>
    </table>
</form>
@endsection
