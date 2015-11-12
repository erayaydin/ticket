@extends("layout.page")

@section("container")
    @permission("status.create")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('status.create') }}" class="btn btn-success">{{ trans('status.create') }}</a>
        </div>
    </div>
    <br>
    @endpermission
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('status.statuses') }}</h3>
                </div>
                <div class="panel-body">
                    @if($statuses->count() > 0)
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('status.name') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statuses as $status)
                                <tr>
                                    <td>{{ $status->id }}</td>
                                    <td>{{ $status->name }}</td>
                                    <td>
                                        @permission("status.edit")
                                        <a href="{{ route('status.edit', $status->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> {{ trans('status.edit') }}</a>
                                        @endpermission
                                        @permission("status.delete")
                                        <a href="{{ route('status.delete', $status->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> {{ trans('status.delete') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            <p>{{ trans('status.not-found') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop