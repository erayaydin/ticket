@extends("layout.page")

@section("container")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => ["status.update", $status->id], "method" => "PUT"]) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('status.edit') }}</h3>
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
                        {!! Form::label('name', trans('status.name')) !!}
                        {!! Form::text('name', old('name') ? old('name') : $status->name, ["placeholder" => trans('status.name'), "class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::button(trans('status.edit')." <i class='fa fa-send'></i>", ["class" => "btn btn-primary btn-block", "type" => "submit"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop