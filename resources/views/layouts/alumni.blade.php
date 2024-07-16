@php
    use App\Models\Pesan;
    $id = Auth::user()->alumni->id;
    $hit = Pesan::where('penerima', $id)->where('sts', 0)->get();
    // dd($data->count())
@endphp

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>SMAN 1 LUWUK</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('img/logo.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ url('assets/alumni/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('assets/alumni/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        
       
        <!-- App Css-->
        <link href="{{ url('assets/alumni/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


        <link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">


    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ url('alumni') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ url('img/logo.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ url('img/logo.png') }}" alt="" height="30">
                                </span>
                                
                            </a>

                            <a href="{{ url('alumni') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ url('img/logo.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ url('img/logo.png') }}" alt="" height="30">
                                </span>
                                
                            </a>
                            
                        </div>

                        <button type="button" class="btn btn-sm mr-2 font-size-24 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="mdi mdi-menu"></i>
                        </button>
           
                    </div>

                    <div class="text-white h5 mt-3 w-100 text-left">SMAN 1 LUWUK</div>
                     <!-- Search input -->
                     {{-- <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input form-control" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div> --}}

                    <div class="d-flex">
                        
                        {{-- <div class="dropdown d-none d-lg-inline-block mr-2">
                            <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block mr-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div> --}}


                        <div class="dropdown d-inline-block mr-2">
                            <a href="{{ url('alumni/pesan') }}" type="button" class="btn header-item noti-icon pr-5 pt-4 waves-effect" id="page-header-notifications-dropdown"  aria-haspopup="true" aria-expanded="false">
                                <i class="ion ion-md-chatboxes"></i>
                                @if($hit->count()>0)
                                <span class="badge badge-danger badge-pill">{{ $hit->count() }}</span>
                                @endif
                            </a>
                            
                        </div>

                        {{-- <div class="pt-4 no-wrap text-white ">{{ Auth::user()->alumni->nama }}</div> --}}
            
                        <div class="dropdown d-inline-block mt-2">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->alumni->foto)
                                    <img class="rounded-circle header-profile-user" src="{{ url('img/alumni/'.Auth::user()->alumni->foto) }}" alt="Header Avatar">
                                @else
                                    <img class="rounded-circle header-profile-user" src="{{ url('assets/alumni/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ url('alumni/profile') }}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                                {{-- <a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Ubah Password</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ url('alumni/signout') }}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

            
                    </div>
                </div>
    
            </header>
    
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">

                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle" href="{{ url('alumni') }}" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-view-dashboard mr-2"></i>Dashboard 
                                        </a>
                                    
                                    </li>
                                    
    
                                    <li class="nav-item ">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{ url('alumni/profile') }}" id="topnav-ui kit" role="button"
                                          aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-face-profile mr-2"></i>Profile Saya
                                        </a>

                                    </li>
    
                                  
                                    
                                </ul>
                                <div class="ml-auto text-white text-right">{{ Auth::user()->alumni->nama }}</div>
                            </div>
                        </nav>
                    </div>
                </div>

 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">{{ $title }} </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">{{ $title }}</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>    
                        
                        @yield('main')
                        <!-- end page title -->

                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2024 © Unisan Gorontalo Utara.
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    

        <!-- JAVASCRIPT -->
        <script src="{{ url('assets/alumni/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/alumni/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/alumni/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ url('assets/alumni/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ url('assets/alumni/libs/node-waves/waves.min.js') }}"></script>

        
        {{-- Alertify --}}
        <script src="{{url('assets/admin/libs/alertify.js/js/alertify.js')}}"></script>
        <script src="{{url('assets/admin/js/pages/alertify-init.js')}}"></script>

        <script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
        

        
        <script src="{{ url('assets/alumni/js/app.js') }}"></script>

        <script>
        $(document).ready(function(){
            $("#tabel_user").DataTable();
            $("#tabel_berita").DataTable();
            // $("#tabel_berita").DataTable({
            //     searching: false,
            //     paging: false,
            //     order: false
            // });
        })
        </script>

        <script src="{{url('assets/admin/js/app.js')}}"></script>

        @if(session()->has('success'))
		<script>
			$(document).ready(function () {
				alertify.success('{{ session('success') }}');
			});
		</script>
		@endif

		@if(session()->has('error'))
			<script>
				$(document).ready(function () {
					alertify.error('{{ session('error') }}');
				});
			</script>
		@endif

        @if(session()->has('warning'))
			<script>
				$(document).ready(function () {
					alertify.warning('{{ session('warning') }}');
				});
			</script>
		@endif

    </body>
</html>
