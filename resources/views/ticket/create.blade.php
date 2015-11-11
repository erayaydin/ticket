@extends("layout.page")

@section("container")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "ticket.store", "files" => true]) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('ticket.new-ticket') }}</h3>
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
                        {!! Form::label('subject', trans('ticket.subject')) !!}
                        {!! Form::text('subject', old('subject'), ["placeholder" => trans('ticket.subject'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('department_id', trans('ticket.department')) !!}
                        {!! Form::select("department_id", \App\Department::lists('name', 'id'), old('department_id'), ["class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('priority_id', trans('ticket.priority')) !!}
                        {!! Form::select("priority_id", \App\Priority::lists('name', 'id'), old('priority_id'), ["class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', trans('ticket.content')) !!}
                        {!! Form::textarea('content', old('content'), ["placeholder" => trans('ticket.content'), "class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('files[]', trans('ticket.files')) !!}
                        {!! Form::file('files[]', ["class" => "form-control", "multiple"]) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::button(trans('ticket.new-ticket')." <i class='fa fa-send'></i>", ["class" => "btn btn-primary btn-block", "type" => "submit"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop