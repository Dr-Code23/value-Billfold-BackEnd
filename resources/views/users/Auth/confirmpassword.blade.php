<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ResetPassword</title>
    <link rel="icon" type="image/png" href={{asset("assets/images/favicon.png")}} />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href={{asset("assets/vendor/bootstrap/css/bootstrap.ltr.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/highlight.js/styles/github.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/simplebar/simplebar.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/quill/quill.snow.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/air-datepicker/css/datepicker.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/select2/css/select2.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/datatables/css/dataTables.bootstrap5.min.css")}}/>
    <link rel="stylesheet" href={{asset("assets/vendor/nouislider/nouislider.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/vendor/fullcalendar/main.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/css/style.css")}} />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">Rest Password</h3>
              <form autocomplete="off" action="{{route('ConfirmPassword')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-2 pb-2">
                    <div class="form-outline">

                        <input type="hidden" value="{{$email}}" name="email">
                        <input type="password" autocomplete="off" id="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="emailAddress">password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      <br> <br>
                        <input type="password" autocomplete="off" id="password" name="password_confirm" class="form-control form-control-lg" />
                        <label class="form-label" for="emailAddress">confirm password</label>

                        @error('password_confirm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>
                  </div>
                </div>
                <div>
                  <input class="btn btn-danger btn-lg" type="submit" value="Rest Password" />
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
