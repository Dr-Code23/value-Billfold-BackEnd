@extends('admin.base')

@section('title' ,'users')

@section('content')
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
      <div class="container container--max--xl">
        <div class="py-5">
          <div class="row g-4 align-items-center">
            <div class="col">
              <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-sa-simple">
                  <li class="breadcrumb-item">
                    <a href="{{url('Admin/Dashboard')}}">{{__('message.Dashboard')}}</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#">Customers</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    {{$user->name}}
                  </li>
                </ol>
              </nav>
              <h1 class="h3 m-0">{{Str::upper($user->name)}}</h1>
            </div>
            {{-- <div class="col-auto d-flex">
              <a href="#" class="btn btn-secondary me-3">{{__('message.delete')}}</a>
              <a href="#" class="btn btn-primary">{{__('message.edit')}}</a>
            </div> --}}
          </div>
        </div>
        <div
          class="sa-entity-layout"
          data-sa-container-query='{"920":"sa-entity-layout--size--md"}'
        >
          <div class="sa-entity-layout__body">
            <div class="sa-entity-layout__sidebar">
              <div class="card">
                <div
                  class="card-body d-flex flex-column align-items-center"
                >
                  <div class="pt-3">
                    <div
                      class="sa-symbol sa-symbol--shape--circle"
                      style="--sa-symbol--size: 6rem"
                    >
                      <img
                        src="{{asset('img/avtar/main.png')}}"
                        width="96"
                        height="96"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="text-center mt-4">
                    <div class="fs-exact-16 fw-medium">{{$user->name}} - Clan <a href="#">{{$userClan}}</a></div>
                    <div class="fs-exact-13 text-muted">
                      <div class="mt-1">
                        <a href="#">{{$user->email}}</a>
                      </div>
                      <div class="mt-1">LV - {{ $user->level}}</div>
                    </div>
                  </div>
                  <div class="sa-divider my-5"></div>
                  <div class="w-100">
                    <dl class="list-unstyled m-0">
                      <dt class="fs-exact-14 fw-medium">{{__('message.Rooms')}}</dt>
                      <dd class="fs-exact-13 text-muted mb-0 mt-1">
                        {{$joinRoom}} - <a href="app-order.html">{{__('message.Rooms')}}</a>
                      </dd>
                    </dl>
                    <dl class="list-unstyled m-0 mt-4">
                        <dt class="fs-exact-14 fw-medium">
                            {{__('message.music')}}
                        </dt>
                        <dd class="fs-exact-13 text-muted mb-0 mt-1">
                          {{$userMusic}} - <a href="app-order.html">{{__('message.music')}}</a>
                        </dd>
                      </dl>
                    <dl class="list-unstyled m-0 mt-4">
                      <dt class="fs-exact-14 fw-medium">
                        {{__('message.Followers')}}
                      </dt>
                      <dd class="fs-exact-13 text-muted mb-0 mt-1">
                        {{$followers}} - <a href="app-order.html">{{__('message.Followers')}}</a>
                      </dd>
                    </dl>
                    <dl class="list-unstyled m-0 mt-4">
                      <dt class="fs-exact-14 fw-medium">{{__('message.Following')}}</dt>
                      <dd class="fs-exact-13 text-muted mb-0 mt-1">
                        {{$following}} - <a href="app-order.html">{{__('message.Following')}}</a>
                      </dd>
                    </dl>
                    <dl class="list-unstyled m-0 mt-4">
                      <dt class="fs-exact-14 fw-medium">
                         {{__('message.Friends')}}
                      </dt>
                      <dd class="fs-exact-13 text-muted mb-0 mt-1">
                        {{$friCount}}- <a href="app-order.html">{{__('message.Friends')}}</a>
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
            <div class="sa-entity-layout__main">
              <div class="sa-card-area">
                <textarea
                  class="sa-card-area__area"
                  rows="2"
                  placeholder="Notes about customer"
                ></textarea>
                <div class="sa-card-area__card">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1em"
                    height="1em"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-edit"
                  >
                    <path
                      d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"
                    ></path>
                    <path
                      d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"
                    ></path>
                  </svg>
                </div>
              </div>
              {{-- // start card Badges --}}
              <div class="card mt-5">
                <div
                  class="card-body px-5 py-4 d-flex align-items-center justify-content-between"
                >
                  <h2 class="mb-0 fs-exact-18 me-4">{{__('message.Badges')}}</h2>
                  <div class="text-muted fs-exact-14 text-end">
                    {{__('message.TotalPrice')}} $ {{$totalPrice}}
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="sa-table text-nowrap">
                        <tbody>
                          @if ($userBadges->count() >0)
                          @foreach ($userBadges as $userBadge)
                          <tr>
                              <td><a href="app-order.html">{{$userBadge->name}}</a></td>
                              <td>Today at 6:10 pm</td>
                              <td>{{$userBadge->file}}</td>
                              <td>${{$userBadge->price}}</td>
                            </tr>
                            @endforeach
                            @else
                            <div class='alert alert-info'><b>{{__('message.Sorry')}}</b>{{__('message.No results !')}}
                    </div>
                    @endif
                        </tbody>
                    </table>

                </div>
                <div class="sa-divider"></div>
                <div class="px-5 py-4 text-center">
                  <a href="app-orders-list.html">{{$userBadges->count()>0?'View all other Badges':''}}</a>
                </div>
              </div>
              {{-- // end card Badges --}}

              {{-- // start card Background --}}
              <div class="card mt-5">
                <div
                  class="card-body px-5 py-4 d-flex align-items-center justify-content-between"
                >
                  <h2 class="mb-0 fs-exact-18 me-4">{{__('message.Backgrounds')}}</h2>
                  <div class="text-muted fs-exact-14 text-end">
                    {{__('message.TotalPrice')}} $ {{$totalpriceBackground}}
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="sa-table text-nowrap">
                        <tbody>
                          @if ($userBackgrounds->count() >0)
                          @foreach ($userBackgrounds as $userBackground)
                          <tr>
                              <td><a href="app-order.html">{{$userBackground->name}}</a></td>
                              <td>Today at 6:10 pm</td>
                              <td><img src="{{$userBackground->file}}" width="50px" height="50px"></td>
                              <td>${{$userBackground->price}}</td>
                            </tr>
                            @endforeach
                            @else
                            <div class='alert alert-info'><b>{{__('message.Sorry')}}</b> {{__('message.No results !')}}
                    </div>
                    @endif
                        </tbody>
                    </table>

                </div>
                <div class="sa-divider"></div>
                <div class="px-5 py-4 text-center">
                  <a href="app-orders-list.html">{{$userBackgrounds->count()>0?__('message.View all other Background'):''}}</a>
                </div>
              </div>
              {{-- // end card Background --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
