@extends("layout.page")

@section("container")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "user.store"]) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('user.create') }}</h3>
                </div>
                <div class="panel-body">
                    @if($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('name', trans('user.name')) !!}
                        {!! Form::text('name', old('name'), ["placeholder" => trans('user.name'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('username', trans('user.username')) !!}
                        {!! Form::text('username', old('username'), ["placeholder" => trans('user.username'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', trans('user.email')) !!}
                        {!! Form::text('email', old('email'), ["placeholder" => trans('user.email'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', trans('user.password')) !!}
                        {!! Form::text('password', old('password'), ["placeholder" => trans('user.password'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role', trans("user.role")) !!}
                        {!! Form::select('role', \Bican\Roles\Models\Role::lists("name","id"), old('role'), ["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::button(trans('user.create')." <i class='fa fa-send'></i>", ["class" => "btn btn-primary btn-block", "type" => "submit"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop