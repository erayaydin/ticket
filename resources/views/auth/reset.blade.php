@extends("layout.main")

@section("body")
    <section class="section-login">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center logo"><a href="{{ route('home.index') }}">{{ config("app.name") }}</a></h1>
                @if($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if(session("status"))
                    <div class="alert alert-success">
                        {{ session("status") }}
                    </div>
                @endif
                <div class="well">
                    {!! Form::open(["route" => "user.password.reset"]) !!}
                    {!! Form::hidden("token", $token) !!}
                    <div class="form-group">
                        {!! Form::label("email", trans("user.email")) !!}
                        {!! Form::text("email", old("email"), ["class" => "form-control", "placeholder" => trans("reset.email")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("password", trans("user.password")) !!}
                        {!! Form::password("password", ["class" => "form-control", "placeholder" => trans("reset.password")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("password_confirmation", trans("user.password")) !!}
                        {!! Form::password("password_confirmation", ["class" => "form-control", "placeholder" => trans("reset.password")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::button(trans("reset.send")." <i class='fa fa-lock'></i>", ["class" => "btn btn-danger pull-right", "type" => "submit"]) !!}
                        <div class="clearfix"></div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop