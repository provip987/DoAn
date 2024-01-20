@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('SanPham.Them')}}" type="button" class="btn btn-sm btn-outline-secondary">Thêm Sản Phẩm</a>

        </div>

    </div>
</div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Loại sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Giá cũ</th>
        <th>Mô tả </th>
        <th>Mô tả Chi Tiết </th>
        <th>Hình ảnh</th>
        <th>Thao tác</th>
    </tr>
    @forelse( $dsSanPham as $Sp)
    <tr>
        <td>{{$Sp->id}}</td>
        <td>{{$Sp->loaiSanPham->ten}}</td>
        <td>{{$Sp->ten_san_pham}}</td>
        <td>{{$Sp->gia}}</td>
        <td>{{$Sp->gia_cu}}</td>
        <td>{{$Sp->mo_ta}}</td>
        <td>{{$Sp->mo_ta_chi_tiet}}</td>
        <td>
            @foreach($hinhanh as $image)
            @if($image->san_pham_id == $Sp->id)
            <img src="{{ asset($image->url) }}" style="width: 100px; height: 50px alt=Hình ảnh sản phẩm">

            @endif
            @endforeach
        </td>

        <td>
            <a href="{{ route('SanPham.Sua', ['id' => $Sp->id ])}}">Sữa</a> |
            <a href="{{ route('SanPham.Xoa', ['id' => $Sp->id ])}}">Xoá</a> |
            <a href="{{ route('SanPham.ChiTietSanPham', ['id' => $Sp->id ])}}">Chi Tiết</a>
        </td>
        </td>

    <tr>
        @empty
    <tr>
        <td colspan=6>không có dử liệu</td>
    </tr>
    @endforelse


</table>

@endsection


@section('page')
@if(session('thong_bao'))
<script>Swal.fire("{{ session('thong_bao') }}")</script>
@endif
@endsection