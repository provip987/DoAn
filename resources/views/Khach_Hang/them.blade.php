@extends('Index')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM KHÁCH HÀNG</h1>
</div>
<form method="POST" action="{{route('KhachHang.XuLyThem')}}"  enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">Tên  </label>
    <input type="text" class="form-control" name="ten" aria-describedby="emailHelp" placeholder="Nhập tên ">
    @error('ten')
                <span class="error-message">{{ $message }}</span>
     @enderror
 </div>
  
 <div class="form-group">
    <label for="exampleInputEmail1">Tên Đăng Nhập </label>
    <input type="text" class="form-control" name="ten_dang_nhap" aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập">
    @error('ten_dang_nhap')
                <span class="error-message">{{ $message }}</span>
     @enderror
 </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
    @error('password')
                <span class="error-message">{{ $message }}</span>
     @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Nhập email">
    @error('email')
                <span class="error-message">{{ $message }}</span>
      @enderror
  
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Số Điện Thoại</label>
    <input type="number" class="form-control" name="sdt" placeholder="Nhập số điện thoại">
    @error('sdt')
                <span class="error-message">{{ $message }}</span>
     @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Địa Chỉ</label>
    <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ">
    @error('dia_chi')
                <span class="error-message">{{ $message }}</span>
     @enderror
  </div>


 
  

  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection 