<!-- resources/views/Dat_Hang/danh-sach.blade.php -->
@extends('Index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH ĐƠN HÀNG</h1>
    </div>

    <table class="table table-striped table-sm">
        <tr>
            <th>ID</th>
            <th>Khách Hàng ID</th>
            <th>Tổng Tiền</th>
            <th>Ghi Chú</th>
            <th>Trạng Thái</th>
            <th>Ngày Đặt</th>
            <th>Thao Tác</th>
        </tr>
        @forelse($DsDh as $Dh)
            <tr>
                <td>{{ $Dh->id}}</td>
                <td>{{$Dh->khachhang_id}}</td>
                <td>{{$Dh->tong_tien}}</td>
                <td>{{$Dh->ghi_chu}}</td>
                <td>
                    <form method="post" action="{{ route('DonHang.capNhatTrangThai', ['id' => $Dh->id]) }}">
                        @csrf
                        @method('PUT')

                        <select name="trang_thai" onchange="this.form.submit()">
                            <option value="Chờ xác nhận" {{ $Dh->trang_thai == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                            <option value="Đang giao hàng" {{ $Dh->trang_thai == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="Đã giao hàng" {{ $Dh->trang_thai == 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                            <option value="Đã Huỷ" {{ $Dh->trang_thai == 'Đã Huỷ' ? 'selected' : '' }}>Đã Huỷ</option>
                        </select>
                    </form>
                </td>
                <td>{{$Dh->created_at}}</td>
                <td>
                    <a href="{{ route('DonHang.danhSachChiTiet', ['id' => $Dh->id]) }}">Chi Tiết</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Không có bình luận nào.</td>
            </tr>
        @endforelse
    </table>
@endsection
