@extends('Index')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SỮA THÔNG TIN KHÁCH HÀNG</h1>
      </div>
<form method="POST"  enctype="multipart/form-data" >
@csrf
    <table border=0>
        <tr>
             <th>Tên</th>
            <td><input type="text" name="ten" value ="{{$id->ten}}"/></td>
        </tr>
        <tr>
            <th>Tên Đăng Nhập</th>
            <td><input type="text" name="ten_dang_nhap"  value ="{{$id->ten_dang_nhap}}" /></td>
        </tr>
        <tr>
            <th>Mật Khẩu</th>
            <td><input type="text" name="password" value ="{{$id->password}}" /></td>
        </tr>
        <tr>
            <th>dia chi</th>
            <td><input type="text" name="dia_chi" value ="{{$id->dia_chi}}"/></td>
        </tr>
        <tr>
            <th>so dien thoai</th>
            <td><input type="text" name="sdt" value ="{{$id->sdt}}" /></td>
        </tr>
     
       
        <tr>
            <th>email</th>
            <td><input type="text" name="email" value ="{{$id->email}}"/></td>
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