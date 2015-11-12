@extends("layout.page")

@section("container")
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('ticket.tickets') }}</h3>
                </div>
                <div class="panel-body">
                    @if($tickets->count() > 0)
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('ticket.subject') }}</th>
                                <th>{{ trans('ticket.priority') }}</th>
                                <th>{{ trans('ticket.agent') }}</th>
                                <th>{{ trans('ticket.department') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>
                                    <span class="label label-default" style="background-color: {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span>
                                </td>
                                <td>
                                    @if($ticket->agent)
                                        {{ $ticket->agent->name }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    {{ $ticket->department->name }}
                                </td>
                                <td>
                                    <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> {{ trans('ticket.show') }}</a>
                                    @permission("ticket.edit")
                                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> {{ trans('ticket.edit') }}</a>
                                    @endpermission
                                    @permission("ticket.delete")
                                    <a href="{{ route('ticket.destroy', $ticket->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> {{ trans('ticket.delete') }}</a>
                                    @endpermission
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="text-center">
                            {!! $tickets->render() !!}
                        </div>
                    @else
                    <div class="alert alert-danger">
                        <p>{{ trans('ticket.not-found') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop