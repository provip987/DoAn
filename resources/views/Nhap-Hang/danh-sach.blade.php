@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH NHẬP HÀNG</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('PhieuNhap.Nhap') }}" type="button" class="btn btn-sm btn-outline-secondary" >Nhập Hàng</a>
            
          </div>
          
        </div>
      </div>

<table class="table table-striped table-sm">
<tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nhà Cung Cấp</th>
                    <th scope="col">Ngày Nhập</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Thao Tác</th>
              

                </tr>
    @forelse($DsPhieuNhap as $ds)
    <tr>
       
        <td>{{ $ds->id }}</td>
        <td>{{ $ds->nha_cung_cap_id }}</td>
        <td>{{ $ds->ngay_nhap }}</td>
        <td>{{ $ds->tong_tien }}</td>
        
        <td>
            <a href="{{ route('PhieuNhap.Xoa', ['id' => $ds->id]) }}">Xoá</a>|
            <a href="{{ route('PhieuNhap.danhSachChiTiet', ['id' => $ds->id]) }}">Chi Tiết</a>
        </td>
    <tr>
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

   

