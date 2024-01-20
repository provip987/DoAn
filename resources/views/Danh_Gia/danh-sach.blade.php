@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH BÌNH LUẬN</h1>
</div>


<table class="table table-striped table-sm">
    <tr>
        <th>ID</th>
        <th>Tên Khách Hàng</th>
        <th>Nội Dung</th>
        <th>Thao Tác</th>
    </tr>
    @forelse($dsDanhGia as $DanhGia)
    <tr>
        <td>{{ $DanhGia->id}}</td>
        <td>{{$DanhGia->khach_hang->ten}}</td>


        <td>{{$DanhGia->noi_dung}}</td>



        <td>
            <a href="{{ route('DanhGia.xoa', ['id' =>  $DanhGia->id])}}">Xoá</a>
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