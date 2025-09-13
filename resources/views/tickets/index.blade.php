<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Tickets</title>
</head>
<body>
    <h1>All Tickets</h1>
    <a href="/tickets/create">Create New Ticket</a>
    <br><br>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if ($tickets->isEmpty())
        <p>There are no tickets.</p>
    @else
        <ul>
            @foreach ($tickets as $ticket)
                <li>{{ $ticket->title }} ({{ $ticket->status }})</li>
            @endforeach
        </ul>
    @endif
</body>
</html>