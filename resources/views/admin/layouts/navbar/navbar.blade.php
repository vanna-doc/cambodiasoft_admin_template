<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true" style="background-color: #e9ecef !important;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">@lang('global.header.page')</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    @if (request()->route()->getName() == 'admin-dashboard')
                        @lang('global.navbar_title.home')
                    @elseif (request()->route()->getName() == 'admin-user-lists')
                        @lang('global.navbar_title.user')
                    @elseif (request()->route()->getName() == 'admin-user-permission')
                        @lang('global.header.set_permi')
                    @elseif (request()->route()->getName() == 'admin-user-create')
                    {!! request('id') ? __('global.header.update_user') : __('global.header.create_user') !!}
                    @elseif (request()->route()->getName() == 'admin-user-edit')
                    {!! request('id') ? __('global.header.update_user') : __('global.header.create_user') !!}
                    @endif

                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0">
                @if (request()->route()->getName() == 'admin-dashboard')
                    @lang('global.navbar_title.home')
                @elseif (request()->route()->getName() == 'admin-user-lists')
                    @lang('global.navbar_title.user')
                @elseif (request()->route()->getName() == 'admin-user-permission')
                   @lang('global.header.set_permi')
                @elseif (request()->route()->getName() == 'admin-user-create')
                         {!! request('id') ? __('global.header.update_user') : __('global.header.create_user') !!}
                @elseif (request()->route()->getName() == 'admin-user-edit')
                         {!! request('id') ? __('global.header.update_user') : __('global.header.create_user') !!}
                @endif


                {{-- {{ ucfirst(str_replace('-', ' ', Request::path())) }} --}}

            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group" hidden>
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" id="searchText" class="form-control" placeholder="@lang('global.header.search')">
                    {{-- <button class="btn btn-danger" onclick="search()">Search</button> --}}
                </div>
            </div>


            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    {{-- mb-0 mt-3 me-3 --}}
                    <div class="dropdown mt-3  me-3">
                        @if (App::getLocale() == 'en')
                            <a href="{{url('locale/en')}}" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                <img src="{{asset('admin/assets/img/lang/US.png')}}" /> English (UK)
                            </a>
                        @else
                            <a href="{{url('locale/kh')}}" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                <img src="{{asset('admin/assets/img/lang/cambodia_flag.png')}}" />&nbsp;&nbsp;ភាសាខ្មែរ
                            </a>
                        @endif
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">

                            <li>
                                @if (App::getLocale() != 'en')
                                <a class="dropdown-item" href="{{url('locale/en')}}">
                                    <img src="{{asset('admin/assets/img/lang/US.png')}}" />&nbsp;&nbsp;ភាសាអង់គ្លេស
                                </a>
                                @else
                                <a class="dropdown-item" href="{{url('locale/kh')}}">
                                    <img src="{{asset('admin/assets/img/lang/cambodia_flag.png')}}" /> Khmer (KH)
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a href="#" id="logout" class="nav-link font-weight-bold px-0 logout">
                        <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
                        <span class="d-sm-inline d-none">@lang('global.auth.signout')</span>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link p-0" onclick="menuToggle();">
                        <i class="fa-solid fa-gear cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center ml-lg-5 pl-lg-5">
                    <div class="action ml-5">
                        <div class="profile" onclick="menuToggle();">

                        </div>

                        <div class="menu">
                            <h3 class="align-items-center">
                                {{ucfirst(Auth::user()->username)}}
                                <div>
                                   {{Auth::user()->email}}
                                </div>
                            </h3>
                            <ul>
                                <li>
                                    <span><i class="fa-solid fa-address-card"></i></span>   &nbsp;
                                    <a href="#">@lang('global.info.my_profile')</a>
                                </li>
                                <li>
                                    <span><i class="fa-solid fa-screwdriver-wrench"></i></span> &nbsp;
                                    <a href="#">@lang('global.info.change_pass')</a>
                                </li>

                                <li>
                                    <span> <i class="fa-solid fa-right-from-bracket"></i></span>&nbsp;
                                    <a  href="#" class="logout" id="logout">@lang('global.info.exit')</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>




                <script>
                    function menuToggle(){
                        const toggleMenu = document.querySelector('.menu');
                        toggleMenu.classList.toggle('active')

                    }

                </script>


                <style>


                    .action{
                        position: fixed;

                    }

                    .action .profile{

                        height: 45px;
                        overflow: hidden;
                        position: relative;

                    }

                    .action .menu{
                        background-color:#FFF;
                        box-sizing:0 5px 25px rgba(0,0,0,0.1);
                        border-radius: 15px;
                        padding-bottom: 20px;
                        padding-right: 25px;
                        position: absolute;
                        right: -10px;
                        width: 230px;
                        transition: 0.5s;
                        top: 120px;
                        visibility: hidden;
                        opacity: 0;
                        text-align: left;
                    }
                    .action .menu.active{
                        opacity: 1;
                        top: 80px;
                        visibility: visible;
                    }
                    .action .menu::before{
                        background-color:#fff;
                        content: '';
                        height: 20px;
                        position: absolute;
                        right: 30px;
                        transform:rotate(45deg);
                        top:-5px;
                        width: 20px;
                    }
                    .action .menu h3{

                        font-size: 16px;
                        font-weight: 600;
                        line-height: 1.3em;
                        /* padding: 20px 10px 20px 20px; */
                        padding-top: 20px;
                        padding-left: 25px;
                        text-align: center;
                        width: 100%;
                    }
                    .action .menu h3 div{
                        font-size: 14px;
                        font-weight: 400;
                    }
                    .action .menu ul li{
                        align-items: left;
                        border-top:1px solid rgba(0,0,0,0.05);
                        display: flex;
                        justify-content: left;
                        list-style: none;
                        padding: 10px 10px;
                    }
                    .action .menu ul li img{
                        max-width: 20px;
                        margin-right: 10px;
                        opacity: 0.5;
                        transition:0.5s
                    }
                    .action .menu ul li a{
                        display: inline-block;
                        font-size: 14px;
                        font-weight: 600;
                        /* padding-left: 15px; */
                        text-decoration: none;

                        transition: 0.5s;
                        text-align: left;
                    }
                    .action .menu ul li:hover img{
                        opacity: 1;
                    }
                    .action .menu ul li:hover a{
                        color:#344767;
                    }
                    @media (max-width: 600px) {
                        .action {
                            right: 50px;
                        }
                    }
                    @media (min-width: 601px) and (max-width: 1200px) {
                        .action {
                            right: 50px;
                    }
                    }

                    @media (min-width: 1201px) {
                        .action {
                            right: 30px;
                    }
                    }
                </style>


                <li class="nav-item d-xl-none ps-3 d-flex align-items-center pr-xl-1">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav" >
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

                {{-- <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li> --}}


{{--
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{asset('admin/assets/img/team-2.jpg')}}" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 ">
                                            <i class="fa fa-clock me-1"></i> 13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{asset('admin/assets/img/small-logos/logo-spotify.svg')}}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 ">
                                            <i class="fa fa-clock me-1"></i> 1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>credit-card</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(453.000000, 454.000000)">
                          <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                          <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Payment successfully completed
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 ">
                                            <i class="fa fa-clock me-1"></i> 2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>

{{-- <script>
    $('#searchText').keyup(function() {
        const valThis = this.value;
        const length = this.value.length;

        $('.body').each(function() {
            const text = $(this).text();
            const textL = text.toLowerCase();
            const position = textL.indexOf(valThis.toLowerCase());

            if (position !== -1) {
                const matches = text.substring(position, (valThis.length + position));
                const regex = new RegExp(matches, 'ig');
                const highlighted = text.replace(regex, `<mark>${matches}</mark>`);

                $(this).html(highlighted).show();
            } else {
                $(this).text(text);
                $(this).hide();
            }
        });

    });
</script> --}}
