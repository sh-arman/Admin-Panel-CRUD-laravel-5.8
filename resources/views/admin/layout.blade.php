<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>@yield('title')</title>
  <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/home') }}">Admin CRUD</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            <a class="text-white" href="{{ url('/home') }}">Home</a>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw" style="margin-right:10px;"></i>{{ Auth::user()->name}}</a>
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('admin.post/create') }}">
                          <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Create Post
                        </a>
                        <a class="nav-link" href="{{ route('admin.category/create') }}">
                          <div class="sb-nav-link-icon"><i class="fa fa-hashtag" aria-hidden="true"></i></div>
                            Create Category
                        </a>
                        <a class="nav-link" href="{{ route('admin.category') }}">
                          <div class="sb-nav-link-icon"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
                            Category
                        </a>
                        <a class="nav-link" href="{{ route('admin.tag/create') }}">
                          <div class="sb-nav-link-icon"><i class="fa fa-hashtag" aria-hidden="true"></i></div>
                            Create Tag
                        </a>
                        <a class="nav-link" href="{{ route('admin.tag') }}">
                          <div class="sb-nav-link-icon"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
                            Tag
                        </a>
                        <a class="nav-link" href="{{ route('admin.post/trashed') }}">
                          <div class="sb-nav-link-icon"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
                            Trashed
                        </a>
                        <a class="nav-link" href="tables.html"
                            ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">{{ Auth::user()->name}}</div>
                </div>
            </nav>
        </div>

@yield('content')


<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Laravel Admin CRUD 2019-2020</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/assets/demo/chart-area-demo.js')}} "></script>
<script src="{{ asset('admin/assets/demo/chart-bar-demo.js')}} "></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/assets/demo/datatables-demo.js')}} "></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>
<script>
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success')}}")
  @endif
  @if(Session::has('info'))
    toastr.info("{{ Session::get('info')}}")
  @endif
</script>
</body>
</html>
