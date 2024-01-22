@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH ĐƠN HÀNG</h1>
</div>


<table class="table table-striped table-sm">
    <tr>
        <th>ID</th>
        <th>Khách Hàng ID</th>
        <th>Tổng Tiền</th>
        <th>Ghi Chú</th>
        <th>Trạng Thái</th>
        <th>Thao Tác</th>
    </tr>
    @forelse($DsDh as $Dh)
    <tr>
        <td>{{ $Dh->id}}</td>
        <td>{{$Dh->khachhang_id}}</td>
        <td>{{$Dh->tong_tien}}</td>
        <td>{{$Dh->ghi_chu}}</td>
        <td>{{$Dh->trang_thai}}</td>


        <td>
        <a href="{{ route('DonHang.danhSachChiTiet', ['id' => $Dh->id]) }}">Chi Tiết</a>
        </td>
   
    </tr>
    @empty
    <tr>
        <td colspan="3">Không có bình luận nào.</td>
    </tr>
    @endforelse
</table>

@endsection
@section('page')
    @if(session('thong_bao'))
        <script>Swal.fire("{{ session('thong_bao') }}")</script>
        @endif
@endsection