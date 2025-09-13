<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ticket: {{ $ticket->title }}</title>
</head>
<body>
    <h1>{{ $ticket->title }}</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <p><strong>Status:</strong> {{ $ticket->status }}</p>
    <p><strong>Description:</strong></p>
    <p>{{ $ticket->description }}</p>

    <hr>

    <a href="/tickets">Back to All Tickets</a>
    <a href="/tickets/{{ $ticket->id }}/edit">Edit Ticket</a>
    <a href="/tickets">Back to All Tickets</a>
    <form action="/tickets/{{ $ticket->id }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete Ticket</button>
    </form>
</body>
</html>