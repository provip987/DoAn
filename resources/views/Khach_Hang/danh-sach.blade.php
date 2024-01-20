@extends('Index')
@section('content')



<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('KhachHang.Them') }}" type="button" class="btn btn-sm btn-outline-secondary">Thêm Khách Hàng</a>




        </div>

    </div>
</div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Tên</th>
        <th>Tên Đăng Nhập</th>
        <th>Mật khẩu</th>
        <th>Email</th>
        <th>SĐT</th>
        <th>Địa Chỉ</th>
        <th>Quyền</th>
        <th>Thao Tác</th>
    </tr>
    @forelse($dsKH as $KH)
    <tr>

        <td>{{ $KH->id }}</td>
        <td>{{ $KH->ten }}</td>
        <td>{{ $KH->ten_dang_nhap }}</td>
        <td>{{ $KH->password }}</td>
        <td>{{ $KH->email }}</td>
        <td>{{ $KH->sdt }}</td>
        <td>{{ $KH->dia_chi }}</td>
        <td>{{ $KH->quyen_id }}</td>
        <td>
            <a href="{{ route('KhachHang.Sua', ['id' => $KH->id ])}}">Sửa</a> |<a
                href="{{ route('KhachHang.Xoa', ['id' => $KH->id ])}}">Xoá</a>
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