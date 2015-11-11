@extends("layout.main")

@section("body")
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">
                    <span class="sr-only">{{ trans("nav.toggle") }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("home.index") }}">{{ config("app.name") }}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('ticket.index') }}">{{ trans('nav.tickets') }}</a></li>
                    <li><a href="{{ route('ticket.create') }}">{{ trans('nav.new-ticket') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->getName() }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.getAccount') }}">{{ trans("nav.account-settings") }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('user.logout')  }}">{{ trans("nav.logout") }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
        @yield('container')
    </div>
@stop