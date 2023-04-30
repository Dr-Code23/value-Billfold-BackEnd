<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 14:08:51 GMT -->

<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Billfold System</title><!-- icon -->
    <link rel="icon" type="image/png" href="images/favicon.png" /><!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href={{asset("assets/vendor/bootstrap/css/bootstrap.ltr.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/highlight.js/styles/github.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/simplebar/simplebar.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/quill/quill.snow.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/air-datepicker/css/datepicker.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/select2/css/select2.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/datatables/css/dataTables.bootstrap5.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/nouislider/nouislider.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/fullcalendar/main.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/css/style.css")}} />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-97489509-8');
    </script>
</head>

<body>
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
            @if (session('error'))
    <div class="alert alert-danger d-flex justify-content-center" style="width:100%" role="alert">{{ session('error') }}
    </div>
            @endif
        <form action="{{route('logged')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                <h1 class="mb-0 fs-3">Sign In</h1>
                <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Welcome to value Billfold.</div>
                <div class="mb-4">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg" />
                </div>
                <div class="mb-4" style="position: relative;">
                    <label class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <div class="input-group-append">
                        <button type="button" id="toggle-password" style="position: absolute;top: 52%;right: 4%;cursor: pointer;color: lightgray;border:none;background:white"><i class="fa fa-eye"></i></button>
                    </div>
                </div>
                <div class="mb-4 row py-2 flex-wrap">
                    <div class="col-auto me-auto">
                        <label class="form-check mb-0">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Remember me</span></label>
                    </div>
                    <div class="col-auto d-flex align-items-center">
{{--                        <a href="auth-forgot-password.html">Forgotpassword?</a>--}}
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                </div>
            </div>
        </form>

        </div>
    </div><!-- scripts -->
    <script src={{asset("assets/vendor/jquery/jquery.min.js")}}></script>
    <script src={{asset("assets/vendor/feather-icons/feather.min.js")}}></script>
    <script src={{asset("assets/vendor/simplebar/simplebar.min.js")}}></script>
    <script src={{asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src={{asset("assets/vendor/highlight.js/highlight.pack.js")}}></script>
    <script src={{asset("assets/vendor/quill/quill.min.js")}}></script>
    <script src={{asset("assets/vendor/air-datepicker/js/datepicker.min.js")}}></script>
    <script src={{asset("assets/vendor/air-datepicker/js/i18n/datepicker.en.js")}}></script>
    <script src={{asset("assets/vendor/select2/js/select2.min.js")}}></script>
    <script src={{asset("assets/vendor/fontawesome/js/all.min.js")}} data-auto-replace-svg="" async=""></script>
    <script src={{asset("assets/vendor/chart.js/chart.min.js")}}></script>
    <script src={{asset("assets/vendor/datatables/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("assets/vendor/datatables/js/dataTables.bootstrap5.min.js")}}></script>
    <script src={{asset("assets/vendor/nouislider/nouislider.min.js")}}></script>
    <script src={{asset("assets/vendor/fullcalendar/main.min.js")}}></script>
    <script src={{asset("assets/js/stroyka.js")}}></script>
    <script src={{asset("assets/js/custom.js")}}></script>
    <script src={{asset("assets/js/calendar.js")}}></script>
    <script src={{asset("assets/js/demo.js")}}></script>
    <script src={{asset("assets/js/demo-chart-js.js")}}></script>
    <script src={{asset("assets/js/show.js")}}></script>
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/auth-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 14:08:51 GMT -->

</html>
