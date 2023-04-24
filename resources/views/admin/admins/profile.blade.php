@extends('admin.base')

@section('title','Profile')

@section('content')
<div id="top" class="sa-app__body mt-6">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
<!-- End Banner Area -->
<section style="background-color: #eee;">
    <div class="container py-5">
        @if (session('success'))
        <div class="alert alert-success d-flex justify-content-center" style="width:100%" role="alert">{{ session('success') }}</div>
    @endif
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <form action="{{url('Admin/editImage',$myinfo->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method("PUT")
            <div class="card-body text-center">
                @if (session('errorimage'))
                <div class="alert alert-success d-flex justify-content-center" style="margin-left:11%;width:250px" role="alert">{{ session('errorimage') }}</div>
            @endif
              <img src="{{$myinfo->image}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$myinfo->name}}</h5>
              <p class="text-muted mb-1">{{$myinfo->roles_name}}</p>
              <div class="d-flex justify-content-center mb-2">
                  <input type="file" name="image" class="form-control">
              </div>
              <div class="d-flex justify-content-center mb-2">
             <button type="submit" class="btn btn-outline-primary">{{__('message.Upload Your image')}}</button>
            </div>
            </div>
            </form>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
                <form action="{{url('Admin/editprofile',$myinfo->id)}}"  enctype="multipart/form-data" method="post">
                    @csrf
                    @method("PUT")
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">{{__('message.name')}}</p>
                </div>
                <div class="col-sm-9">
                  <input type="text" value="{{$myinfo->name}}" class="form-control mb-0 @error('name') is-invalid @enderror" name="name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">{{__('message.email')}}</p>
                </div>
                <div class="col-sm-9">
                    <input type="email" value="{{$myinfo->email}}" class="form-control @error('email') is-invalid @enderror" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">{{__('message.authority')}}</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" disabled value="{{$myinfo->roles_name}}" class="form-control @error('role_id') is-invalid @enderror" name="age">
                    @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-start mb-2">
                <button type="submit" class="btn btn-outline-primary">{{__('message.Update Profile')}}</button>
               </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>
</div>
  @endsection

