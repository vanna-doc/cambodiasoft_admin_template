    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/bbulogo.png')}}">
        <link rel="icon" type="image/png" href="{{asset('admin/assets/img/bbulogo.png')}}">
        <title>
            @lang('global.title.app_title')
        </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('admin/icon/css/all.min.css')}}">

        <!-- CSS Files -->
        <link id="pagestyle" href="{{asset('admin/assets/css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />


        {{-- Sweet Alert --}}
        <script src="{{asset('admin\sweetalert2-11.7.12\package\dist\sweetalert2.all.min.js')}}"></script>
        <link href="{{asset('admin\sweetalert2-11.7.12\package\dist\sweetalert2.min.css')}}" rel="stylesheet">
        {{-- JS --}}
        <script src="{{asset('admin/assets/js/jquery.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        {{-- <x:sweetalert /> --}}
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    </head>

    <body class="g-sidenav-show bg-gray-200 body" id="body">
        @include('sweetalert::alert')
        @include('admin.layouts.sidebar.sidebar')




        <script type="text/javascript">
            $(document).ready(function(){
                $(".logout").click(function(){
                    Swal.fire({
                        // title: 'Are you want to Log Out?',
                        text: "@lang('global.auth.logout')",
                        icon: 'warning',
                        width: 370,
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#2180fe',
                        cancelButtonText: 'No',
                        confirmButtonText: 'Yes,  Logout!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route("admin-logOut") }}';
                    }
                    })
                });
            });
        </script>


        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('admin.layouts.navbar.navbar')
            <div class="container-fluid py-4">
                @yield('content')
                @include('admin.layouts.footer.footer')
            </div>
        </main>




    {{-- Dropdown sidebar --}}
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("show");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
            content.style.display = "none";
            } else {
            content.style.display = "block";
            }
        });
        }
    </script>
   {{-- End dropdown sidebar --}}

    <!--   Core JS Files   -->
    <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });



        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }, {
                    label: "Websites",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('admin/assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
</body>

</html>

