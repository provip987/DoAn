@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CHI TIẾT ĐƠN HÀNG</h1>
     <div class="btn-toolbar mb-2 mb-md-0">


    </div>
</div>
<form method="POST" enctype="multipart/form-data"
    action="{{ route('DonHang.danhSachChiTiet', ['id' => $datHang->id]) }}">
    @csrf
    <table class="table table-striped table-sm">
        <tr>
            <th>ID</th>
            <th>Đơn Hàng ID</th>
            <th>Sản Phẩm ID</th>
            <th>Số Lượng</th>
            <th>Size ID</th>
            <th>Tổng Tiền</th>  
        </tr>

        @forelse ($chiTietDatHang as $chiTiet)
        <tr>
            <td>{{ $chiTiet->id }}</td>
            <td>{{$datHang->id}}</td>
            <td>{{ $chiTiet->san_pham_id }}</td>
            <td>{{ $chiTiet->so_luong }}</td>
            <td>{{ $chiTiet->size_id }}</td>
            <td>{{ $chiTiet->tong_tien }}</td>
      
      
      
    
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