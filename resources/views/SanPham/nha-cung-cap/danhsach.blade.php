@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH NHÀ CUNG CẤP</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('NhaCungCap.Them') }}" type="button" class="btn btn-sm btn-outline-secondary" >Thêm Nhà Cung Cấp</a>
            
          </div>
          
        </div>
      </div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Tên</th>
        <th>email</th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Thao Tác</th>
        <th></th>
    </tr>
    @forelse($dsNCC as $dsNCC)
    <tr>
       
        <td>{{ $dsNCC->id }}</td>
        <td>{{ $dsNCC->ten }}</td>
        <td>{{ $dsNCC->email }}</td>
        <td>{{ $dsNCC->dia_chi }}</td>
        <td>{{ $dsNCC->so_dien_thoai }}</td>
        

      
        <td>
            <a href="{{ route('NhaCungCap.Sua', ['id' => $dsNCC->id ])}}">Sửa</a> | <a href="{{ route('NhaCungCap.XuLyXoa', ['id' => $dsNCC->id ])}}">Xoá</a>
            
        </td>
        
    <tr>
    @empty
        <tr>
            <td colspan=6>không có dử liệu</td>
        </tr>
    @endforelse
    
</table>

@endsection     
@if(session('thong_bao'))

    @section('page')
        <script>Swal.fire("{{ session('thong_bao') }}")</script>
    @endsection

@endif