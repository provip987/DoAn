@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SỮA SẢN PHẨM</h1>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ route('SanPham.XuLySua', ['id' => $sanPham->id]) }}">
    @csrf
    <table border=0>
        <tr>
           

            <tr>
            <th>Loại sản phẩm</th>
            <td><select name="loai_san_pham_id" id="loai_san_pham_id">
                 @foreach($DsLoai as $Loai)
                 <option value="{{$Loai->id}}"> {{$Loai->ten}}</option>
                 @endforeach
            </select></td>

        <tr>
            <th>Tên sản phẩm</th>
            <td><input type="text" name="ten_san_pham" value="{{ $sanPham->ten_san_pham }}" /></td>
        </tr>
        <tr>
            <th>Giá</th>
            <td><input type="text" name="gia" value="{{ $sanPham->gia }}" /></td>
        </tr>
        <tr>
            <th>Giá cũ</th>
            <td><input type="text" name="gia_cu" value="{{ $sanPham->gia_cu }}" /></td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><input type="text" name="mo_ta" value="{{ $sanPham->mo_ta }}" /></td>
        </tr>
        <tr>
            <th>Mô tả Chi Tiết</th>
            <td><input type="text" name="mo_ta_chi_tiet" value="{{ $sanPham->mo_ta_chi_tiet }}" /></td>
        </tr>


        <tr>
            <th>Hình ảnh</th>
            <td>
                @foreach($hinhanh as $image)
                    @if($image->san_pham_id == $sanPham->id)
                        <img src="{{ asset($image->url) }}" style="width: 100px; height: 50px" alt="Hình ảnh sản phẩm">
                    @endif
                @endforeach
                <input type="file" name="hinh_anh" multiple require="true">
                
               
            </td>
        </tr>

        <tr>
            <th></th>
            <td><button type="submit">Lưu</button>        
            <a href="javascript:history.back()">
                <button type="button">Trở về</button>
            </a></td>
        </tr>

    </table>
</form>
@endsection
