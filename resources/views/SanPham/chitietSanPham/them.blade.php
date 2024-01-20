@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI CHI TIẾT SẢN PHẨM</h1>
</div>
<form method="POST" enctype="multipart/form-data" action="{{route('SanPham.XuLyThemChiTiet')}}">
    @csrf
    <table border=0>
        <tr>
            <th>SẢN PHẨM ID</th>
            <td>
                <h2>&nbsp;{{ $sanPham->id }}</h2>
                <input type="hidden" name="san_pham_id" value="{{ $sanPham->id }}">
            </td>
        </tr>
        <tr>
            <th>
                <label for="size_id">Size id</label>
            </th>
            <td>
                <select name="size_id" id="size_id">
                    @foreach($dsSize as $size)
                    <option value="{{$size->id}}">
                        {{$size->id}}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <th>Số Lượng</th>
            <td>
                <input type="text" name="so_luong">
            </td>
        </tr>
        <tr>
            <th>Giá</th>
            <td>
                <input type="text" name="gia" />
            </td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Lưu</button> <a href="javascript:history.back()">
                    <button type="button">Trở về</button>
                </a></td>
        </tr>
    </table>
</form>
@endsection
