@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CHI TIẾT SẢN PHẨM</h1>
     <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('SanPham.ThemChiTiet',['id' => $sanPham->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Thêm Chi Tiết Sản Phẩm</a>

        </div>

    </div>
</div>
<form method="POST" enctype="multipart/form-data"
    action="{{ route('SanPham.ChiTietSanPham', ['id' => $sanPham->id]) }}">
    @csrf
    <table class="table table-striped table-sm">
        <tr>
            <th>ID</th>
            <th>Sản phẩm ID</th>
            <th>SIZE ID</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>

        @forelse ($chiTietSanPham as $chiTiet)
        <tr>
            <td>{{ $chiTiet->id }}</td>
            <td>{{ $sanPham->id }}</td>
            <td>{{ $chiTiet->size_id }}</td>
            <td>{{ $chiTiet->so_luong }}</td>
            <td>{{ $chiTiet->gia }}</td>
            <td>
                <a href="{{ route('SanPham.XoaChiTiet', ['id' => $chiTiet->id]) }}">Xoá</a> |
                <a href="{{ route('SanPham.SuaChiTiet', ['id' => $chiTiet->id]) }}">Sữa</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Không có dữ liệu</td>
        </tr>
        @endforelse

    </table>
    <td>
        <a href="javascript:history.back()">
            <button type="button">Trở về</button>
        </a>
    </td>
</form>
@endsection



@section('page')
    @if(session('thong_bao'))
        <script>Swal.fire("{{ session('thong_bao') }}")</script>
        @endif
@endsection