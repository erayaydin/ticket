@extends("layout.page")

@section("container")
    @permission("user.create")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('user.create') }}" class="btn btn-success">{{ trans('user.create') }}</a>
        </div>
    </div>
    <br>
    @endpermission
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('user.users') }}</h3>
                </div>
                <div class="panel-body">
                    @if($users->count() > 0)
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('user.name') }}</th>
                                <th>{{ trans('user.username') }}</th>
                                <th>{{ trans('user.email') }}</th>
                                <th>{{ trans('user.role') }}</th>
                                <th>{{ trans('user.created_at') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->username}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        @if($user->roles->first())
                                            <span class="label label-primary">{{ $user->roles->first()->name }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d.m.Y - H:i') }}</td>
                                    <td>
                                        @permission("user.edit")
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> {{ trans('user.edit') }}</a>
                                        @endpermission
                                        @permission("user.delete")
                                        <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> {{ trans('user.delete') }}</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $users->render() !!}
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <p>{{ trans('user.not-found') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop