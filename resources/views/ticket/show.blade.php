@extends("layout.page")

@section("container")
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $ticket->subject }}</h3>
                </div>
                <div class="panel-body">
                    <p>
                        <b>{{ trans('ticket.client') }}</b>: {{ $ticket->user->getName() }}<br>
                        <b>{{ trans('ticket.department') }}</b>: {{ $ticket->department->name }}<br>
                        <b>{{ trans('ticket.priority') }}</b>: <span class="label label-default" style="background-color: {{ $ticket->priority->color }};">{{ $ticket->priority->name }}</span><br>
                        <b>{{ trans('ticket.status') }}</b>: {{ $ticket->getStatus() }}
                    </p>
                    <div class="well well-sm">
                        {{ $ticket->content }}
                    </div>
                    @if($ticket->files->count() > 0)
                    <h4>{{ trans('ticket.files') }}</h4>
                    <div class="row">
                        @foreach($ticket->files as $file)
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ route('ticket.file', [$ticket->id, $file->id]) }}">
                            <div class="well well-sm">
                                <p class="text-center"><img src="{{ asset('assets/images/icons/'.$file->ext.".png") }}" class="img-thumbnail" style="max-width: 100%;"></p>
                                <p class="text-center">{{ $file->name }}</p>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if($ticket->comments->count() > 0)
                    <h4>{{ trans('ticket.comments') }}</h4>
                        <div class="row">
                            @foreach($ticket->comments as $comment)
                                <div class="col-md-12">
                                    <div class="well">
                                        <p><b>{{ $comment->user->getName() }}</b></p>
                                        {{ $comment->content }}
                                        @if($comment->files->count() > 0)
                                        <div class="row">
                                            @foreach($comment->files as $file)
                                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                                    <a href="{{ route('ticket.file', [$ticket->id, $file->id]) }}">
                                                        <div class="well well-sm">
                                                            <p class="text-center"><img src="{{ asset('assets/images/icons/'.$file->ext.".png") }}" class="img-thumbnail" style="max-width: 100%;"></p>
                                                            <p class="text-center">{{ $file->name }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <h4>{{ trans('ticket.new-comment') }}</h4>
                    {!! Form::open(["route" => ["ticket.comment", $ticket->id], "files" => true]) !!}
                    @if($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::textarea("content", old("content"), ["class" => "form-control", "placeholder" => trans("comment.content")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file("files[]", ["class" => "form-control", "multiple"]) !!}
                    </div>
                    {!! Form::submit(trans("comment.send"), ["class" => "btn btn-primary"]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop