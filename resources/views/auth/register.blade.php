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
                <div class="well">
                    {!! Form::open(["route" => "user.register"]) !!}
                    <div class="form-group">
                        {!! Form::label("email", trans("user.email")) !!}
                        {!! Form::text("email", old("email"), ["class" => "form-control", "placeholder" => trans("register.email")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("username", trans("user.username")) !!}
                        {!! Form::text("username", old("username"), ["class" => "form-control", "placeholder" => trans("register.username")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("password", trans("user.password")) !!}
                        {!! Form::password("password", ["class" => "form-control", "placeholder" => trans("register.password")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("password_confirmation", trans("register.password-confirmation")) !!}
                        {!! Form::password("password_confirmation", ["class" => "form-control", "placeholder" => trans("register.password-confirmation")]) !!}
                    </div>
                    <div class="form-group">
                        <a href="{{ route('user.login') }}" class="btn btn-primary pull-left"><i class="fa fa-user-plus"></i> {{ trans("login.login") }}</a>
                        {!! Form::button(trans("register.register")." <i class='fa fa-user-plus'></i>", ["class" => "btn btn-success pull-right", "type" => "submit"]) !!}
                        <div class="clearfix"></div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div>
                    <a href="{{ route('user.password.email') }}" class="btn btn-danger btn-xs pull-right">{{ trans("reset.reset") }} <i class="fa fa-lock"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
@stop