@extends("layout.page")

@section("container")
    @permission("priority.create")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('priority.create') }}" class="btn btn-success">{{ trans('priority.create') }}</a>
        </div>
    </div>
    <br>
    @endpermission
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('priority.priorities') }}</h3>
                </div>
                <div class="panel-body">
                    @if($priorities->count() > 0)
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('priority.name') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($priorities as $priority)
                                <tr>
                                    <td>{{ $priority->id }}</td>
                                    <td>
                                        <span class="label label-default" style="background-color: {{ $priority->color }};">{{ $priority->name }}</span>
                                    </td>
                                    <td>
                                        @permission("priority.edit")
                                        <a href="{{ route('priority.edit', $priority->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> {{ trans('priority.edit') }}</a>
                                        @endpermission
                                        @permission("priority.delete")
                                        <a href="{{ route('priority.delete', $priority->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> {{ trans('priority.delete') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            <p>{{ trans('priority.not-found') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop