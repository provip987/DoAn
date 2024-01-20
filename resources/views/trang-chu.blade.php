<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>WEB ORDER DO AN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    
    <link rel="stylesheet" href="{{asset('style.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

   

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">3 ANH EM SIÊU NHÂN</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
<input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Tìm Kiếm">    <span class="navbar-toggler-icon"></span>
  </button>
  <!--  -->
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="{{ route('DangXuat') }}">Đăng Xuấtttt</a>
    </div>
  </div>
</header>

<div class="row">
  <div class="col-sm-2">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{route('DSNV')}}">
              <span data-feather="user" class="align-text-bottom"></span>
                ADMIN
            </a>
          </li>  
        <li class="nav-item">
            <a class="nav-link" href="{{route('Loai.DanhSach')}}">
              <span data-feather="user" class="align-text-bottom"></span>
                Quản lý loại sản phẩm
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="{{route('SanPham.DanhSach')}}">
              <span data-feather="user" class="align-text-bottom"></span>
              Quản lý sản phẩm
            </a>
          </li>      
          <li class="nav-item">
            <a class="nav-link" href="{{route('Size.DanhSach')}}">  
              <span data-feather="user" class="align-text-bottom"></span>
              Quản lý Size
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{route('KhachHang.DanhSach')}}">
              <span data-feather="user" class="align-text-bottom"></span>
                Quản lý khách hàng
            </a>
          </li>      
        
          <li class="nav-item">
            <a class="nav-link" href="{{route('NhaCungCap.DanhSach')}}">
              <span data-feather="user" class="align-text-bottom"></span>
                Quản lý Nhà Cung Cấp
            </a>
          </li> 
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('PhieuNhap.DanhSach')}}">  
              <span data-feather="user" class="align-text-bottom"></span>
                Nhập Hàng 
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{route('DanhGia.DanhSach')}}">  
              <span data-feather="user" class="align-text-bottom"></span>
                Bình Luận
            </a>
          </li> 
        
        </ul>
      </div>
    </nav>
</div>

  <div class="col-sm-10">
    @yield('content')
  </div>
</div>


@yield('page')

   

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
      <script src="main.js"></script>
      <script src="{{asset('jquery-3.7.1.min.js')}}"></script>
      @yield('nhaphang')
     
    </body>



      
</html>


            

