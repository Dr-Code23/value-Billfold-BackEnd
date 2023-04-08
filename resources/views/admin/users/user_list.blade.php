@extends('admin.base')

@section('title', 'users')

@section('content')
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            @if (session('error'))
<div class="alert alert-danger d-flex justify-content-center" style="margin-top:10xp" role="alert">{{ session('error') }}</div>
@endif

@if (session('success'))
<div class="alert alert-success d-flex justify-content-center" style="margin-top:10xp" role="alert">{{ session('success') }}</div>
@endif
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="#">{{__('message.Dashboard')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('message.users')}}</li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">{{__('message.users')}}</h1>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="p-4">
                    <input type="text" placeholder="Start typing to search for Users" class="typeahead form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider">

                </div>
                <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="w-min" data-orderable="false"><input type="checkbox"
                                    class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                            </th>
                            <th class="min-w-20x">{{__('message.name')}}</th>
                            <th>{{__('message.Registered')}}</th>
                            <th>{{__('message.Status')}}</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                    aria-label="..." />
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{url('Admin/users/details',$user->id)}}" class="me-4">
                                        <div
                                            class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                            <img
                                            @if ($user->avatar == "default.jpg")
                                            src="{{asset('img/avatar/default.jpg')}}"
                                            @else
                                            src = {{$user->avatar}}
                                            @endif
                                                width="40" height="40" alt="" /></div>
                                    </a>
                                    <div>
                                        <a href="{{url('Admin/users/details',$user->id)}}" class="text-reset">{{$user->name}}</a>
                                        <div class="text-muted mt-n1">{{$user->email}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-nowrap">{{$user->created_at->format('Y-m-d')}}</td>
                            <td>{{$user->is_active == '1' ? 'Approved': 'Pending'}}</td>
                            <td>
                                <div class="dropdown"><button class="btn btn-sa-muted btn-sm"
                                        type="button" id="customer-context-menu-0"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="3" height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="customer-context-menu-0">
                                        {{-- <li><a class="dropdown-item" href="#">{{__('message.edit')}}</a></li> --}}
                                        @if ($user->is_active == 1)
                                        <li><a class="dropdown-item" href="{{route('Update_status',['user_id' => $user->id,'status_code' =>0 ])}}">{{__('message.Block')}}</a></li>
                                        @else
                                        <li><a class="dropdown-item" href="{{route('Update_status',['user_id' => $user->id,'status_code' =>1 ])}}">{{__('message.Approved')}}</a></li>
                                        @endif
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="{{url('Admin/users/delete',['user_id' => $user->id])}}">{{__('message.delete')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var path = "{{ url('Admin/users/autocomplete') }}";

    $('#table-search').typeahead({
        source:  function (query, process) {
      return $.get(path, { term: query }, function (data) {
              return process(data);
          });
      }
  });
      </script>
@endsection
