@extends("admin.base")

@section('title','Roles')

@section('content')

<div id="top" class="sa-app__body mt-6">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
<div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
    <div class="m-portlet__body">
        <!--begin: Datatable -->
        {{-- @if($items->count()>0) --}}
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th width='10%'>
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-group-checkable">
                                        <span></span>
                                    </label>
                                </th>
                                <th>{{__('message.name')}}</th>
                                <th>{{__('message.authority')}}</th>
                                <th width='15%'>{{__('message.Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Roles as $Role)
                            <tr role="row" class="odd">
                                <td >
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{$Role->name}}</td>
                                <td>
                                    @foreach ($Role->permissions as $permission )
                                        {{$permission->name}},
                                    @endforeach
                                </td>
                                <td>
                                    <form method="post" action="{{url('Admin/Role/delete',$Role->id)}}">
                                        @csrf
                                        @method("delete")
                                    <button type="submit" class="btn btn-link border-0" style="background: none" title="delete" onclick='return confirm("{{__('message.Are you sure?')}}")'>
                                        <i class="bi bi-trash" style="color:blue"></i>
                                    </button>
                                    <a class="" href="{{url('Admin/Role/edit',$Role->id)}}" title="edit">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </form>

                                </td>
                            </tr>
@endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
