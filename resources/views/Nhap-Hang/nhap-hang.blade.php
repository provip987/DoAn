<style>
    #tb-ds-san-pham th {
        padding: 10px;
        /* Thêm khoảng trống 10px vào mỗi bên trong thẻ <th> */
        text-align: center;
        /* Căn giữa nội dung bên trong thẻ <th> */
    }

    #tb-ds-san-pham td {
        padding: 10px;
        /* Thêm khoảng trống 10px vào mỗi bên trong thẻ <td> */
    }
</style>
@extends('index')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">NHẬP HÀNG</h1>
</div>
<form method="POST" action="{{ route('PhieuNhap.xuLyNhap')}}">
    @csrf


    <label>Chọn Nhà Cung cấp</label>
    <select name="ncc" id="ncc">
        @foreach($dsNCC as $NCC)
        <option value="{{$NCC->id}}"> {{$NCC->id}}</option>
        @endforeach
    </select>
    <label>Ngày Nhập</label>
    <input type="date" id="ngay-tao" />
    <br></br>
    <label>Chọn Sản Phẩm</label>
    <select name="sp" id="sp">
        @foreach($dsSanPham as $SP)
        <option value="{{$SP->id}}" data-ten="{{$SP->id}}">
            {{$SP->id}}
        </option>
        @endforeach
    </select>

    <label>Giá Bán</label>
    <input type="number" id="gia-ban" value="0" />
    <label>Giá Nhập</label>
    <input type="number" id="gia-nhap" value="0" />
    <br></br>
    <label>Size id</label>
    <select name="size_id" id="size_id">
        @foreach($dsSize as $size)
        <option value="{{$size->id}}" data-ten="{{$size->id}}">
            {{$size->id}}
        </option>
        @endforeach
    </select>


    <label>Số Lượng</label>
    <input type="number" id="so-luong" value="0" />
    <button type="button" id="btn-them" class="btn btn-info">Thêm Vào Danh Sách</button>

    <br> </br>


    <table id="tb-ds-san-pham" border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản Phẩm ID</th>
                <th>Số Lượng</th>
                <th>Giá Bán</th>
                <th>Giá Nhập</th>
                <th>Size</th>
                <th>Thành Tiền</th>
                <th>Thao Tác</th>
            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>
    <br /><br />
    <input type="text" id="nhacungcap" name="ncc"/>
    <input type="text" id="ngaytao" name="ngayNhap"/>
    <button type="submit">Lưu</button>
</form>
@endsection
@section('nhaphang')
<script type="text/javascript">
    $(document).ready(function () {
        $("#btn-them").click(function () {
            var stt = $('#tb-ds-san-pham tbody tr').length + 1;
            var ncc = $("#ncc").val();  // Lấy giá trị của nhà cung cấp
            var ngayNhap = $("#ngay-tao").val();
            var tenSp = $("#sp").find(":selected").data("ten");
            var idSP = $("#sp").find(":selected").val();
            var soLuong = $("#so-luong").val();
            var giaBan = $("#gia-ban").val();
            var giaNhap = $("#gia-nhap").val();
            var size_id = $("#size_id").val();

            var thanhTien = soLuong * giaNhap;

            var row = `<tr>
        <td>${stt}</td>   
        <td>${tenSp}<input type="hidden" name="spID[]" value="${idSP}" /></td>
        <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}" /></td>
        <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}" /></td>
        <td>${giaNhap}<input type="hidden" name="giaNhap[]" value="${giaNhap}" /></td>
        <td>${size_id}<input type="hidden" name="sizeID[]" value="${size_id}" /></td>
        <td>${thanhTien}</td>
        <td> 
            <a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>
        </td>
    </tr>`;

            $("#tb-ds-san-pham").find('tbody').append(row);
        });

        $('#ncc').change(function () {
            var id = $(this).val();
            $('#nhacungcap ').val(id);
        });

        $('#ngay-tao').change(function () {
            var ngaytao = $(this).val();
            $('#ngaytao').val(ngaytao);
        });

        $("#tb-ds-san-pham").on("click", ".delete-link", function (e) {
            e.preventDefault();
            $(this).closest("tr").remove();
            updateSTT();
        });

        $("#tb-ds-san-pham").on("click", ".edit-link", function (e) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var currentData = {
                soLuong: tr.find("td:eq(3)").text(),
                giaBan: tr.find("td:eq(4)").text(),
                giaNhap: tr.find("td:eq(5)").text(),
                size_id: tr.find("td:eq(6)").text()
            };
            tr.find("td:eq(3)").html(`<input type="number" value="${currentData.soLuong}" class="so-luong-input-edit" />`);
            tr.find("td:eq(4)").html(`<input type="number" value="${currentData.giaBan}" class="gia-ban-input-edit" />`);
            tr.find("td:eq(5)").html(`<input type="number" value="${currentData.giaNhap}" class="gia-nhap-input-edit" />`);
            tr.find("td:eq(6)").html(`<input type="text" value="${currentData.size_id}" class="size-id-input-edit" />`);
            tr.find("td:last").html(`<a href="#" class="save-link">Lưu</a> | <a href="#" class="cancel-link">Hủy</a>`);
        });

        $("#tb-ds-san-pham").on("click", ".save-link", function (e) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var newSoLuong = tr.find(".so-luong-input-edit").val();
            var newGiaBan = tr.find(".gia-ban-input-edit").val();
            var newGiaNhap = tr.find(".gia-nhap-input-edit").val();
            var newSizeId = tr.find(".size-id-input-edit").val();
            var newThanhTien = newSoLuong * newGiaNhap;

            tr.find("td:eq(3)").text(newSoLuong);
            tr.find("td:eq(4)").text(newGiaBan);
            tr.find("td:eq(5)").text(newGiaNhap);
            tr.find("td:eq(6)").text(newSizeId);
            tr.find("td:eq(7)").text(newThanhTien);
            tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
        });

        $("#tb-ds-san-pham").on("click", ".cancel-link", function (e) {
            e.preventDefault();
            var tr = $(this).closest("tr");

            tr.find("td:eq(3)").text(tr.find(".so-luong-input-edit").val());
            tr.find("td:eq(4)").text(tr.find(".gia-ban-input-edit").val());
            tr.find("td:eq(5)").text(tr.find(".gia-nhap-input-edit").val());
            tr.find("td:eq(6)").text(tr.find(".size-id-input-edit").val());
            tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
        });
    });


    function updateSTT() {
        $('#tb-ds-san-pham tbody tr').each(function (index) {
            $(this).find("td:first").text(index + 1);
        });
    }





</script>
@endsection