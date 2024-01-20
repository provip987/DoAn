@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH SIZE</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('Size.Them') }}" type="button" class="btn btn-sm btn-outline-secondary" >Thêm Size</a>
       
          </div>
          
        </div>
      </div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
 
        <th>Tên Size</th>
        <th>Thao Tác</th>
        <th></th>
    </tr>
    @forelse($DsSize as $size)
    <tr>
       
        <td>{{ $size->id }}</td>
  
        <td>{{ $size->ten }}</td>
       
        <td>
        <a href="{{ route('Size.Sua', ['id' => $size->id ])}}">Sữa</a> | 
        <a href="{{ route('Size.Xoa', ['id' => $size->id ])}}">Xoá</a> 
        
        </td>
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

