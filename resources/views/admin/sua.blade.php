@extends('Index')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SỮA ADMIN</h1>
</div>
<form method="POST"  enctype="multipart/form-data" >
@csrf
    <table border=0>
        <tr>
             <th>Tên</th>
            <td><input type="text" name="ten" value = "{{  $dsNV->ten }}"/></td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td><input type="text" name="dia_chi" value = "{{$dsNV->dia_chi }}"/></td>
        </tr>
        <tr>
            <th>Số Điện Thoại</th>
            <td><input type="text" name="so_dien_thoai" value = "{{ $dsNV->sdt}}" /></td>
        </tr>
        <tr>
            <th>Tên Đăng Nhập</th>
            <td><input type="text" name="ten_dang_nhap"  value = "{{ $dsNV->ten_dang_nhap }}" /></td>
        </tr>
        <tr>
            <th>Mật Khẩu</th>
            <td><input type="text" name="password"  value = "{{  $dsNV->password }}" /></td>
        </tr>
        <tr>
            <th>email</th>
            <td><input type="text" name="email"  value = "{{  $dsNV->email }}" /></td>
        </tr>
        <tr>
            <th>Quyền_id</th>
            <td><input type="text" name="quyen_id"  value = "{{ $dsNV->id}}" /></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Lưu</button>        <a href="javascript:history.back()">
                <button type="button">Trở về</button>
            </a></td>
        </tr>
    </table>
</form> 
@endsection 