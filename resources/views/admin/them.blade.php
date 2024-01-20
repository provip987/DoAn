@extends('Index')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM ADMIN</h1>
</div>
<form method="POST" action="{{route('xulythemnv')}}"  enctype="multipart/form-data">
@csrf
    <table border=0>
        <tr>
             <th>Tên</th>
            <td><input type="text" name="ten" placeholder="Nhập Tên"/>
            @error('ten')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><input type="text" name="dia_chi" placeholder="Nhập địa chỉ"/>
            @error('dia_chi')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><input type="text" name="sdt" placeholder="Nhập Số Điện Thoại" />
            @error('sdt')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>Tên đăng nhập</th>
            <td><input type="text" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập" />
            @error('ten_dang_nhap')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>Mật khẩu</th>
            <td><input type="text" name="password"   placeholder="Nhập mật khẩu" />
            @error('password')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="text" name="email"  placeholder="Nhập email" />
            @error('email')
                <span class="error-message">{{ $message }}</span>
      @enderror
        </td>
        </tr>
        <tr>
            <th>Quyền</th>
            <td><input type="text" name="quyen"  placeholder="Nhập quyền ID"/>
            @error('quyen')
    <span class="error-message">{{ $message }}</span>
    @enderror</td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form> 
@endsection 
