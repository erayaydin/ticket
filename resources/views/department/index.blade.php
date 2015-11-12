@extends("layout.page")

@section("container")
    @permission("department.create")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('department.create') }}" class="btn btn-success">{{ trans('department.create') }}</a>
        </div>
    </div>
    <br>
    @endpermission
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('department.departments') }}</h3>
                </div>
                <div class="panel-body">
                    @if($departments->count() > 0)
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('department.name') }}</th>
                                <th>{{ trans('department.users') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        @foreach($department->users as $user)
                                        <span class="label label-default">{{ $user->getName() }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @permission("department.edit")
                                        <a href="{{ route('department.edit', $department->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> {{ trans('department.edit') }}</a>
                                        @endpermission
                                        @permission("department.delete")
                                        <a href="{{ route('department.delete', $department->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> {{ trans('department.delete') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            <p>{{ trans('department.not-found') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop