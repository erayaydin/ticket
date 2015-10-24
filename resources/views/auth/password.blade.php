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
                    {!! Form::open(["route" => "user.password.email"]) !!}
                    <div class="form-group">
                        {!! Form::label("email", trans("user.email")) !!}
                        {!! Form::text("email", old("email"), ["class" => "form-control", "placeholder" => trans("passwords.email")]) !!}
                    </div>
                    <div class="form-group">
                        <a href="{{ route('user.login') }}" class="btn btn-primary pull-left"><i class="fa fa-sign-in"></i> {{ trans("login.login") }}</a>
                        {!! Form::button(trans("passwords.email-send")." <i class='fa fa-lock'></i>", ["class" => "btn btn-danger pull-right", "type" => "submit"]) !!}
                        <div class="clearfix"></div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop