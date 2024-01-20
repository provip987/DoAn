@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SỮA SIZE</h1>
      </div>
<form method="POST"  enctype="multipart/form-data" action="{{ route('Size.Sua', ['id' => $Size->id ])}}">
   @csrf
    <table border=0>

        <tr>
            <th>Tên Size</th>
          
            <td><input type="text" name="ten" value = "{{ $Size->ten}}"/></td>
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