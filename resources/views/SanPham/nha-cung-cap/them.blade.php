@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM NHÀ CUNG CẤP</h1>
      
      </div>
<form method="POST"  enctype="multipart/form-data" action="">
   @csrf
    <table border=0>
        <tr>
            <th>Tên</th>
            <td><input type="text" name="ten"/>
            @error('ten')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td><input type="text" name="dia_chi"/>
            @error('dia_chi')
                <span class="error-message">{{ $message }}</span>
     @enderror
        </td>
        </tr>
        <tr>
            <th>email</th>
            <td><input type="text" name="email"/>
            @error('email')
                <span class="error-message">{{ $message }}</span>
      @enderror</td>
        </tr>
        <tr>
            <th>so dien thoai</th>
            <td><input type="text" name="so_dien_thoai"/>
            @error('so_dien_thoai')
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