@extends("layout.page")

@section("container")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "priority.store"]) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('priority.create') }}</h3>
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
                        {!! Form::label('name', trans('priority.name')) !!}
                        {!! Form::text('name', old('name'), ["placeholder" => trans('priority.name'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('color', trans('priority.color')) !!}
                        {!! Form::text('color', old('color'), ["placeholder" => trans('priority.color'), "class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::button(trans('priority.create')." <i class='fa fa-send'></i>", ["class" => "btn btn-primary btn-block", "type" => "submit"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop