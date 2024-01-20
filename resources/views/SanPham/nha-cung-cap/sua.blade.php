@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SỮA NHÀ CUNG CẤP</h1>
      
      </div>
<form method="POST"  enctype="multipart/form-data" action="{{ route('NhaCungCap.Sua', ['id' => $ncc->id ])}}">
   @csrf
    <table border=0>
        <tr>
             <th>Tên</th>
            <td><input type="text" name="ten" value = "{{ $ncc->ten }}"/></td>
        </tr>
        <tr>
            <th>dia chi</th>
            <td><input type="text" name="dia_chi" value = "{{ $ncc->dia_chi }}"/></td>
        </tr>
        <tr>
            <th>email</th>
            <td><input type="text" name="email" value = "{{ $ncc->email }}" /></td>
        </tr>
        <tr>
            <th>so dien thoai</th>
            <td><input type="text" name="so_dien_thoai"  value = "{{ $ncc->so_dien_thoai }}" /></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Lưu</button>        
            <a href="javascript:history.back()">
                <button type="button">Trở về</button>
            </a></td>
        </tr>
    </table>
</form>
@endsection   