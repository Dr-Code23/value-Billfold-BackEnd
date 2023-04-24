@extends("admin.base")

@section('title','Roles')

@section('content')
<div id="top" class="sa-app__body mt-6">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
                @foreach ($errors->all() as $error)
                            <li class="text-danger m-5">{{ $error }}</li>
                        @endforeach
                <form enctype="multipart/form-data" method='post' action='{{url('Admin/Role/update',$Role->id)}}'>
                    @csrf
                    <div class='m-form'>
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-3 col-form-label">{{__('message.Authority_Name')}}</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control m-input" placeholder="Enter name" value="{{$Role->name}}" name="name">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <div class="row">
                               <div class="form-group text-center">
                                @foreach($permission as $value)
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="chk-box" name="permission[]" value="{{$value->id}}" {{in_array($value->id,$rolePermissions) ? 'checked':''}}>{{$value->name}}
                                </label>
                                @endforeach
                                </div>
                                </div>
                            </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-3">
                                       </div>
                                    <div class="col-lg-6 mt-6">

                                        <button class="btn btn-primary" type="submit">{{__('message.update')}}</button>

                                        <a href='{{url('Admin/Role')}}' class="btn btn-secondary">{{__('message.Cancel')}}</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
