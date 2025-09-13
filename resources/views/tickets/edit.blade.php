@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{-- i. Change the <h1> to "Edit Ticket" --}}
        <h1>Edit Ticket</h1>
    </div>
    <div class="card-body">
        {{-- ii. Change the <form> tag to point to the update URL and add @method('PUT') --}}
        <form action="/tickets/{{ $ticket->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                {{-- iii. Pre-fill the title input --}}
                <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                {{-- iii. Pre-fill the description textarea --}}
                <textarea class="form-control" id="description" name="description" rows="3">{{ $ticket->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    {{-- Pre-selecting the current status in the dropdown --}}
                    <option value="Open" {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Closed" {{ $ticket->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            <a href="/tickets" class="btn btn-secondary">Cancel</a>
            {{-- iv. Change the submit button text --}}
            <button type="submit" class="btn btn-primary">Update Ticket</button>
        </form>
    </div>
</div>
@endsection

