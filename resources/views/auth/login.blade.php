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
                {!! Form::open(["route" => "user.login"]) !!}
                    <div class="form-group">
                        {!! Form::label("username", trans("user.username")) !!}
                        {!! Form::text("username", old("username"), ["class" => "form-control", "placeholder" => trans("login.username")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("password", trans("user.password")) !!}
                        {!! Form::password("password", ["class" => "form-control", "placeholder" => trans("login.password")]) !!}
                    </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("remember", true, old("remember")) !!}
                            {{ trans("login.remember") }}
                        </label>
                    </div>
                </div>
                    <div class="form-group">
                        <a href="{{ route('user.register') }}" class="btn btn-success pull-left"><i class="fa fa-user-plus"></i> {{ trans("register.register") }}</a>
                        {!! Form::button(trans("login.login")." <i class='fa fa-sign-in'></i>", ["class" => "btn btn-primary pull-right", "type" => "submit"]) !!}
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