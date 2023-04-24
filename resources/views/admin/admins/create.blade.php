@extends("admin.base")

@section('title','Admins')

@section('content')
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
<!--================Create Box Area =================-->
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body ">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">{{__('message.AdminCreate')}}</h3>
              <form method="post" action="" enctype="multipart/form-data" autocomplete = "off">
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-4">

                    <div class="form-outline">
                      <input type="text" id="fname" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" />
                      <label class="form-label" for="fname">{{__('message.name')}}</label>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="email" id="emailAddress" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                      <label class="form-label" for="emailAddress">{{__('message.email')}}</label>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="password" id="phoneNumber" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" autocomplete= "new-password" />
                      <label class="form-label" for="phoneNumber">{{__('message.password')}}</label>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                  </div>
                </div>


                <div class="row">
                    <div class="col-md-6 mb-2 ">
                        <div class="form-group">
                            <label class="form-label" for="authority">{{__('message.authority')}}</label>
                            <select name="roles_name" class="form-select mb-1 @error('country') is-invalid @enderror" aria-label="Default select example">
                                <option disabled selected>{{__('message.select_autority')}}</option>
                                @foreach ($Roles as $role)
                                <option value="{{$role->name}}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('roles_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 ">
                      <div class="form-outline">
                        <label for="img">{{__('message.Upload Your image')}}: </label>
                        <input type="file" id="img" name="image" class="@error('image') is-invalid @enderror" accept="image/*">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    </div>
                  </div>

                <div class="mt-2">
                  <input class="btn btn-primary btn-lg" type="submit" value="{{__('message.create')}}" />
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!--================End Create Box Area =================-->
        </div>
    </div>
</div>
@endsection
