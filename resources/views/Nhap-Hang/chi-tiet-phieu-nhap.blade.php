@extends('trang-chu')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Chi tiet phieu nhap </h1>
</div>

<form method="POST" action="{{ route('PhieuNhap.xuLyNhap')}}">
    @csrf
    <div class="row g-3">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Phieu nhap</th>
                    <th scope="col">San pham</th>
                    <th scope="col">So luong</th>
                    <th scope="col">Gia nhap</th>
                    <th scope="col">Gia ban</th>
                    <th scope="col">Thành tiền</th>
                 
                </tr>
            </thead>
            <tbody>
               
              
            </tbody>
        </table>
        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</form>
@endsection
</form>
