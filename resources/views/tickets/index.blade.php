@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">All Tickets</h1>
        <a href="/tickets/create" class="btn btn-primary">Create New Ticket</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    {{-- Add new table header --}}
                    <th scope="col">Submitted By</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr>
                        <th scope="row">{{ $ticket->id }}</th>
                        <td><a href="/tickets/{{ $ticket->id }}">{{ $ticket->title }}</a></td>
                        {{-- Add new table cell for submitter's name --}}
                        <td>
                            @if($ticket->user_id)
                                {{ $ticket->user->name }} (Admin)
                            @else
                                {{ $ticket->customer_name }} (Guest)
                            @endif
                        </td>
                        <td>
                            @if ($ticket->status == 'Open')
                                <span class="badge bg-success">{{ $ticket->status }}</span>
                            @elseif ($ticket->status == 'In Progress')
                                <span class="badge bg-warning text-dark">{{ $ticket->status }}</span>
                            @else
                                <span class="badge bg-danger">{{ $ticket->status }}</span>
                            @endif
                        </td>
                        <td>{{ $ticket->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        {{-- Update colspan to match new column count --}}
                        <td colspan="5">There are no tickets.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
