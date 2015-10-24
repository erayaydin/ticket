@extends("layout.page")

@section("container")
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            {!! Form::open(["route" => "user.postAccount"]) !!}
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> {{ trans("user.account-settings") }}</h3>
            </div>
            <div class="panel-body">

                @if($errors->has())
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    </div>
                @endif

                @if(session("success"))
                    <div class="alert alert-success">
                        <p>{{ session("success") }}</p>
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label("username", trans("user.username")) !!}
                    {!! Form::text("username", auth()->user()->username, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("email", trans("user.email")) !!}
                    {!! Form::text("email", auth()->user()->email, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("password", trans("user.password")) !!}
                    {!! Form::password("password", ["class" => "form-control"]) !!}
                    <span class="help-block text-warning">{{ trans("user.passwordchange") }}</span>
                </div>
                <div class="form-group">
                    {!! Form::label("password_confirmation", trans("user.password-confirmation")) !!}
                    {!! Form::password("password_confirmation", ["class" => "form-control"]) !!}
                    <span class="help-block text-warning">{{ trans("user.passwordchange") }}</span>
                </div>
            </div>
            <div class="panel-footer">
                {!! Form::button(trans("keywords.update")." <i class=\"fa fa-cloud-upload\"></i>", ["type" => "submit", "class" => "btn btn-block btn-primary"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop