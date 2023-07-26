{{-- @include('admin.layouts.sidebar.getsidebar') --}}


<aside  class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " data-color="dark" id="sidenav-main" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px ;">
    <div class="sidenav-header" style="">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{route('admin-dashboard')}}">
            <span class="align-center text-center">
                <h5 class="text-uppercase font-weight-bolder">HOSPITAL SYSTEM</h5>
                {{-- <img src="{{asset('admin/assets/img/logo.png')}}" class="navbar-brand-img h-100" height="100px" alt="..."> --}}
            </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main" style="height:77%;overflow:hidden !important;" >
        <ul class="navbar-nav">

            <li class="nav-item">
                @foreach (config('menu') as $key => $item)
                    @if (!isset($item['permission']) || (isset($item['permission']) && auth()->user()->canany($item['permission'])))
                        @if (!isset($item['children']))
                            <a class="nav-link {{ routeActive($item['active']) ? 'active' : '' }}" @if (isset($item['path'])) href="{!! url($item['path']) !!}" @endif>
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <span class="pb-2"><i class="fa-solid {!!$item['icon']!!} {!! routeActive($item['active']) ? 'text-white' : 'text-dark' !!} "></i></span>
                                </div>
                                <span class="nav-link-text ms-1">{!! $item['name'][App::getLocale()] !!}</span>
                            </a>
                        @else
                                <a data-bs-toggle="collapses" href="#" aria-controls="dashboardsExamples" aria-expanded="false" class="nav-link  {!! routeActive($item['active']) ? 'active' : '' !!} collapsed collapsible " type="button">
                                    <div class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2">
                                        <i class="fa-solid {!!$item['icon']!!}  pb-1 {!! routeActive($item['active']) ? 'text-white' : 'text-dark' !!}"></i>
                                    </div>
                                    <span class="nav-link-text ms-1 icon-dropdown float-end">{!! $item['name'][App::getLocale()] !!}</span><span > <i class="fa-solid fa-angle-up toggle-dropdowns {!! routeActive($item['active']) ? 'fa-flip-vertical' : '' !!} "></i> </span>
                                </a>
                        @endisset
                        @isset($item['children'])
                            <div id="dashboardsExamples" class="collapse  {!! routeActive($item['active']) ? 'show' : '' !!} " style="">
                                <ul class="nav ms-4 ps-3">
                                    <li class="nav-item">
                                        @foreach ($item['children'] as $child)
                                            @if (!isset($child['permission']) || (isset($child['permission']) && auth()->user()->canany($child['permission'])))
                                                <li  class="nav-item {!! routeActive($child['active']) ? 'active' : '' !!}">
                                                    <a href="{!! url($child['path']) !!}" class="{{ routeActive($child['active']) ? 'active' : '' }} router-link-exact-active nav-link" aria-current="page">
                                                        <span class="sidenav-mini-icon">D</span>
                                                        <span class="sidenav-normal">{!! $child['name'][App::getLocale()] !!}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        @endisset
                    @endif
                @endforeach
            </li>
        </ul>
    </div>
</aside>
{{-- <style>
    .nav-link .toggle-dropdowns{
        cursor: pointer;
        }

        .nav-link .toggle-dropdowns {
        transform: rotate(0deg);
        transition: transform 0.5s ease-in-out;
        }

        .nav-link .toggle-dropdowns:hover  {
        transform: rotate(180deg);
        }
        .nav-link .toggle-dropdowns {
        cursor: pointer;
        }

        .nav-link .toggle-dropdowns {
        transform: rotate(0deg);
        transition: transform 0.5s ease-in-out;
        }

        .nav-link :hover .toggle-dropdowns {
        transform: rotate(180deg);
        }
  </style> --}}
<style>
    .nav-item  .icon-dropdown {

        display: block;
        width: 88%;
        text-align: left;
        outline: none;
        }
        .toggle-dropdowns {
            font-size: 13px;
            font-weight: bolder !important;
        }


</style>

<script>
$(document).ready(function() {
  $(".nav-link").each(function() {
    var length = $(this).find(".fa-angle-up").length;
    if (length === 1) {
      $(this).click(function() {
        if (!$(this).find(".fa-angle-up").hasClass("fa-flip-vertical")) {
          $(this).find(".fa-angle-up").addClass("fa-flip-vertical");
        } else {
          $(this).find(".fa-angle-up").removeClass("fa-flip-vertical");
        }
      });
    }
  });
});
</script>
