@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Create a New Ticket</h1>
    </div>
    <div class="card-body">
        <form action="/tickets" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
            <a href="/tickets" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Ticket</button>
        </form>
    </div>
</div>
@endsection