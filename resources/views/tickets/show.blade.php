@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h3">Ticket Details</h1>
        <a href="/tickets" class="btn btn-secondary btn-sm">Back to All Tickets</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <dl class="row">
            <dt class="col-sm-3">Title</dt>
            <dd class="col-sm-9">{{ $ticket->title }}</dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
                @if ($ticket->status == 'Open')
                    <span class="badge bg-success">{{ $ticket->status }}</span>
                @elseif ($ticket->status == 'In Progress')
                    <span class="badge bg-warning text-dark">{{ $ticket->status }}</span>
                @else
                    <span class="badge bg-danger">{{ $ticket->status }}</span>
                @endif
            </dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $ticket->description }}</dd>

            <dt class="col-sm-3">Created At</dt>
            <dd class="col-sm-9">{{ $ticket->created_at->format('Y-m-d H:i') }}</dd>
        </dl>

        <hr>

        <a href="/tickets/{{ $ticket->id }}/edit" class="btn btn-warning">Edit Ticket</a>

        <form action="/tickets/{{ $ticket->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete Ticket</button>
        </form>
    </div>
</div>
@endsection