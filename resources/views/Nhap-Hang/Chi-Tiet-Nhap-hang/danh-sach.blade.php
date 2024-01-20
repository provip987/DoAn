@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH CHI TIẾT NHẬP HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</th>
        <th>Nhập Hàng ID</th>
        <th>Sản phẩm ID</th>
        <th>Size ID</th>
        <th>Số Lượng</th>
        <th>Giá Nhập</th>
        <th>Giá Bán</th>
        <th>Thành Tiền</th>

    </tr>
    @forelse($nhapHang->chiTietNhapHang as $chiTiet)
    <tr>
    <td>{{ $chiTiet->id }}</td>
        <td>{{ $chiTiet->nhap_hang_id }}</td>
        <td>{{ $chiTiet->san_pham_id }}</td>
        <td>{{ $chiTiet->size_id }}</td>
        <td>{{ $chiTiet->so_luong }}</td>
        <td>{{ $chiTiet->gia_nhap }}</td>
        <td>{{ $chiTiet->gia_ban }}</td>
        <td>{{ $chiTiet->thanh_tien }}</td>
    </tr>
    @empty
    <tr>
        <td colspan=3>không có dử liệu</td>
    </tr>
    @endforelse

</table>

@endsection



@section('page')
@if(session('thong_bao'))
<script>Swal.fire("{{ session('thong_bao') }}")</script>
@endif
@endsection