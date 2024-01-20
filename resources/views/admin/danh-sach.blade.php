@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH ADMIN</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('themnv') }}" type="button" class="btn btn-sm btn-outline-secondary" >Thêm Admin</a>
          </div>
          
        </div>
      </div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Tên</th>
        <th>Địa Chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>tên tài khoản</th>
        <th>mật khẩu</th>
        <th>quyền</th>
        <th>Thao Tác</th>

       
    </tr>
    @forelse($dsNV as $dsnv)
    <tr>
       
        <td>{{ $dsnv->id }}</td>
        <td>{{ $dsnv->ten }}</td>
        <td>{{ $dsnv->dia_chi }}</td>
        <td>{{ $dsnv->email }}</td>
        <td>{{ $dsnv->sdt }}</td>
        <td>{{ $dsnv->ten_dang_nhap }}</td>
        <td>{{ $dsnv->password }}</td>
        <td>{{ $dsnv->quyen_id}}</td>
        <td>
            <a href="{{ route('suanhanvien', ['id' => $dsnv->id ])}}">Sửa</a> |<a href="{{ route('xoanhanvien', ['id' => $dsnv->id ])}}">Xoá</a>
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