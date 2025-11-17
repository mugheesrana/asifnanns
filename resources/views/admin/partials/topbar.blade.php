 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Tell the browser to be responsive to screen width -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
     <!-- Favicon icon -->
     {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($global['settings']->favicon) }}"> --}}
     <title>@yield('title', 'Admin Panel')</title>
     <!-- Bootstrap Core CSS -->
    <!-- Bootstrap Core CSS -->
<link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Morris Chart CSS -->
<link href="{{ asset('admin/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

<!-- Theme Colors -->
<link href="{{ asset('admin/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">

<!-- Summernote -->
<link href="{{ asset('admin/assets/plugins/summernote/dist/summernote.css') }}" rel="stylesheet">

<!-- SweetAlert -->
<link href="{{ asset('admin/assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

<!-- Datepicker -->
<link href="{{ asset('admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

<!-- Select2 -->
<link href="{{ asset('admin/assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

<!-- Switchery -->
<link href="{{ asset('admin/assets/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet">

<!-- Bootstrap Select -->
<link href="{{ asset('admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">

<!-- Bootstrap Tagsinput -->
<link href="{{ asset('admin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet">

<!-- Bootstrap Touchspin -->
<link href="{{ asset('admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">

<!-- MultiSelect -->
<link href="{{ asset('admin/assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">


     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 </head>

 <body class="fix-header fix-sidebar card-no-border ">
     <!-- ============================================================== -->
     <!-- Preloader - style you can find in spinners.css -->
     <!-- ============================================================== -->
     <div class="preloader">
         <svg class="circular" viewBox="25 25 50 50">
             <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                 stroke-miterlimit="10" />
         </svg>
     </div>
     <!-- ============================================================== -->
     <!-- Main wrapper - style you can find in pages.scss -->
     <!-- ============================================================== -->
     <div id="main-wrapper">
         <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
         <!-- ============================================================== -->
         <header class="topbar">
             <nav class="navbar top-navbar navbar-expand-md navbar-light">
                 <!-- ============================================================== -->
                 <!-- Logo -->
                 <!-- ============================================================== -->
                 <div class="navbar-header">
                     <a class="navbar-brand" href="{{route('dashboard')}}">
                         <!-- Logo icon --><b>
                             <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                             <!-- Dark Logo icon -->
                             <img src="{{ asset('admin/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                             <!-- Light Logo icon -->
                             <img src="{{ asset('admin/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                         </b>
                         <!--End Logo icon -->
                         <!-- Logo text --><span>
                             <!-- dark Logo text -->
                             <img src="{{ asset('admin/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->
                             <img src="{{ asset('admin/assets/images/logo-light-text.png')}}" class="light-logo"
                                 alt="homepage" /></span> </a>
                 </div>
                 <!-- ============================================================== -->
                 <!-- End Logo -->
                 <!-- ============================================================== -->
                 <div class="navbar-collapse">
                     <!-- ============================================================== -->
                     <!-- toggle and nav items -->
                     <!-- ============================================================== -->
                     <ul class="navbar-nav mr-auto mt-md-0">
                         <!-- This is  -->
                         <li class="nav-item"> <a
                                 class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                 href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                         <li class="nav-item m-l-10"> <a
                                 class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                 href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                         <!-- ============================================================== -->
                         <!-- Comment -->
                         <!-- ============================================================== -->

                         <!-- ============================================================== -->
                         <!-- End Comment -->
                         <!-- ============================================================== -->
                         <!-- ============================================================== -->
                         <!-- Messages -->
                         <!-- ============================================================== -->
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                 id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="mdi mdi-email"></i>
                                 <div class="notify"> <span class="heartbit"></span> <span class="point"></span>
                                 </div>
                             </a>
                             <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                 <ul>
                                     <li>
                                         <div class="drop-title">You have 4 new messages</div>
                                     </li>
                                     <li>
                                         <div class="message-center">
                                             <!-- Message -->
                                             <a href="#">
                                                 <div class="user-img"> <img src="{{ asset('admin/assets/images/users/1.jpg')}}"
                                                         alt="user" class="img-circle"> <span
                                                         class="profile-status online pull-right"></span> </div>
                                                 <div class="mail-contnet">
                                                     <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                         admin!</span> <span class="time">9:30 AM</span>
                                                 </div>
                                             </a>
                                             <!-- Message -->
                                             <a href="#">
                                                 <div class="user-img"> <img src="{{ asset('admin/assets/images/users/2.jpg')}}"
                                                         alt="user" class="img-circle"> <span
                                                         class="profile-status busy pull-right"></span> </div>
                                                 <div class="mail-contnet">
                                                     <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See
                                                         you at</span> <span class="time">9:10 AM</span>
                                                 </div>
                                             </a>
                                             <!-- Message -->
                                             <a href="#">
                                                 <div class="user-img"> <img src="{{ asset('admin/assets/images/users/3.jpg')}}"
                                                         alt="user" class="img-circle"> <span
                                                         class="profile-status away pull-right"></span> </div>
                                                 <div class="mail-contnet">
                                                     <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span>
                                                     <span class="time">9:08 AM</span>
                                                 </div>
                                             </a>
                                             <!-- Message -->
                                             <a href="#">
                                                 <div class="user-img"> <img src="{{ asset('admin/assets/images/users/4.jpg')}}"
                                                         alt="user" class="img-circle"> <span
                                                         class="profile-status offline pull-right"></span> </div>
                                                 <div class="mail-contnet">
                                                     <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                         admin!</span> <span class="time">9:02 AM</span>
                                                 </div>
                                             </a>
                                         </div>
                                     </li>
                                     <li>
                                         <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                                 e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                     </li>
                                 </ul>
                             </div>
                         </li>

                     </ul>
                     <!-- ============================================================== -->
                     <!-- User profile and search -->
                     <!-- ============================================================== -->
                     <ul class="navbar-nav my-lg-0">

                         <!-- ============================================================== -->
                         <!-- Profile -->
                         <!-- ============================================================== -->
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                     src="{{ asset('admin/assets/images/users/1.jpg')}}" alt="user" class="profile-pic" /></a>
                             <div class="dropdown-menu dropdown-menu-right scale-up">
                                 <ul class="dropdown-user">
                                     <li>
                                         <div class="dw-user-box">
                                             <div class="u-img"><img src="{{ asset('admin/assets/images/users/1.jpg')}}"
                                                     alt="user"></div>
                                             <div class="u-text">
                                                 <h4>{{ Auth::user()->name }}</h4>
                                                 <p class="text-muted">{{ Auth::user()->email }}</p><a
                                                     href="{{ route('admin.users.edit', Auth::id()) }}"
                                                     class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                             </div>
                                         </div>
                                     </li>
                                     <li role="separator" class="divider"></li>
                                     <li><a href="{{ route('admin.users.edit', Auth::id()) }}"><i class="ti-user"></i>
                                             My Profile</a></li>
                                     <li role="separator" class="divider"></li>
                                     <li><a href="{{ route('admin.users.edit', Auth::id()) }}"><i
                                                 class="ti-settings"></i> Account Setting</a></li>
                                     <li role="separator" class="divider"></li>
                                     <li>
                                         <a href="{{ route('logout') }}"
                                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                             <i class="fa fa-power-off"></i> Logout
                                         </a>

                                         <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                             style="display: none;">
                                             @csrf
                                         </form>
                                     </li>

                                 </ul>
                             </div>
                         </li>
                     </ul>
                 </div>
             </nav>
         </header>
