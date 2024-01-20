@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SẢN PHẨM</h1>
</div>

<form method="POST" action="{{route('SanPham.XuLyThem')}}" enctype="multipart/form-data">
    @csrf
    <table border=0>
        <tr>
            <th>Loại sản phẩm</th>
            <td><select name="loai_san_pham_id" id="loai_san_pham_id">
                    @foreach($DsLoai as $Loai)
                    <option value="{{$Loai->id}}"> {{$Loai->id}}</option>
                    @endforeach
                </select></td>

        </tr>
        <tr>
            <th>Tên sản phẩm</th>
            <td>
                <input type="text" name="ten_san_pham" />
                @error('ten_san_pham')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Giá</th>
            <td><input type="text" name="gia" />
                @error('gia')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Giá cũ</th>
            <td><input type="text" name="gia_cu" />
                @error('gia_cu')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td>
                <input type="text" name="mo_ta" />
                @error('mo_ta')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </td>
        </tr>

        <tr>
            <th>Mô Tả Chi Tiết</th>
            <td>
                <input type="text" name="mo_ta_chi_tiet" />
                @error('mo_ta')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Hình ảnh</th>
            <th>
                <input type="file" name="hinh_anh" multiple require="true">
                @error('hinh_anh')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </th>
        </tr>


        <tr>
            <th></th>
            <td><button type="submit">Lưu</button></td>
        </tr>
    </table>
</form>
@endsection