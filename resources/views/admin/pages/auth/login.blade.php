
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    @lang('global.title.app_title')
  </title>

  <!-- Nucleo Icons -->
  <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('admin/assets/css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  {{-- JS --}}
  <script src="{{asset('admin/assets/js/jquery.js')}}"></script>
  <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    {{-- Icon --}}
    <link rel="stylesheet" href="{{asset('admin/icon/css/all.min.css')}}">

  <style>
         body{
            font-family: 'Noto Sans Khmer', sans-serif;
        }
        form{
            font-family: 'Noto Sans Khmer', sans-serif;

        }
  </style>
</head>

<body class="bg-gray-200">
    @include('sweetalert::alert')

  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->


        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4 mt-lg-4">
            <div class="container-fluid pe-0">
                <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{url()->current()}}">
                @lang('global.title.app_title')
                </a>
                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon mt-2">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button>


                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7" >
                    </ul>

                    <div class="dropdown">
                        @if (App::getLocale() == 'en')
                            <a href="{{route('switch_lang','en')}}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark dropdown-toggle" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                <img src="{{asset('admin/assets/img/lang/US.png')}}" /> English (UK)
                            </a>
                        @else
                            <a href="{{route('switch_lang','kh')}}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                <img src="{{asset('admin/assets/img/lang/cambodia_flag.png')}}" />&nbsp;&nbsp;ភាសាខ្មែរ
                            </a>
                        @endif
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">

                            <li>
                                @if (App::getLocale() != 'en')
                                <a class="dropdown-item" href="{{route('switch_lang','en')}}">
                                    <img src="{{asset('admin/assets/img/lang/US.png')}}" />&nbsp;&nbsp;ភាសាអង់គ្លេស
                                </a>
                                @else
                                <a class="dropdown-item" href="{{route('switch_lang','kh')}}">
                                    <img src="{{asset('admin/assets/img/lang/cambodia_flag.png')}}" /> Khmer (KH)
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="mb-8">
      <div class="page-header align-items-start min-vh-50 pt-7 pb-11 m-3 mt-1 border-radius-lg" style="background-image: url('{{asset('admin/assets/img/curved-images/curved14.jpg')}}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
              {{-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n11 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Login Here</h5>
              </div>

              <div class="card-body">
                <form role="form text-left" action="{{route('admin-onLogin')}}" method="POST">
                    @csrf
                        <label for="email" style="font-size: 13px">@lang('global.form.email') <span style="color:#F98080">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="@lang('global.form.enter_email')" aria-label="Username" aria-describedby="username-addon">
                        </div>
                        @error('username')
                        <h6 style="font-size: 12px;color:#F98080">* @lang('global.form.enter_email')</h6>
                        @enderror

                        <label for="password" style="font-size: 13px">@lang('global.form.password') <span style="color:#F98080">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="@lang('global.form.enter_password')" aria-label="Password" aria-describedby="password-addon">
                        </div>
                        @error('password')
                        <h6 style="font-size: 12px;color:#F98080">* @lang('global.form.enter_password')</h6>
                        @enderror
                        <div class="form-check form-check-info text-left" hidden>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2 btn-login ">@lang('global.auth.signin')</button>
                        </div>
                        <p class="text-sm mt-3 mb-0">Forgot password ? <a href="#"  onclick="alert('Inprogressing')" class="text-dark font-weight-bolder">Reset Password</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

    <script>
        $(document).ready(function() {
            $(".btn-login").click(function() {
                $(this).addClass(" disabled");
            });
            });
    </script>
  <!--   Core JS Files   -->
  <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script src=".{{asset('admin/assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
</body>

</html>
