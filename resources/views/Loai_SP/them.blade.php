@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM LOẠI SẢN PHẨM</h1>
</div>

<form method="POST" enctype="multipart/form-data" action="">
    @csrf
    <table border=0>
       
        <tr>
            <th>Tên Loại</th>
            <td>
                <input type="text" name="ten" />
                @error('ten')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit">Lưu</button>
            </td>
        </tr>
    </table>
</form>
@endsection
