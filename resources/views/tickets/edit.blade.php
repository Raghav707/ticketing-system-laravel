<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- i. Change the <title> to "Edit Ticket" -->
    <title>Edit Ticket</title>
</head>
<body>
    <!-- i. Change the <h1> to "Edit Ticket" -->
    <h1>Edit Ticket</h1>

    <!-- ii. Change the <form> tag to point to the update URL and add @method('PUT') -->
    <form action="/tickets/{{ $ticket->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label><br>
            <!-- iii. Pre-fill the title input -->
            <input type="text" id="title" name="title" value="{{ $ticket->title }}">
        </div>
        <br>
        <div>
            <label for="description">Description:</label><br>
            <!-- iii. Pre-fill the description textarea -->
            <textarea id="description" name="description">{{ $ticket->description }}</textarea>
        </div>
        <br>
        <div>
            <label for="status">Status:</label><br>
            <!-- Pre-selecting the current status in the dropdown -->
            <select name="status" id="status">
                <option value="Open" {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Closed" {{ $ticket->status == 'Closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <br>
        <!-- iv. Change the submit button text -->
        <button type="submit">Update Ticket</button>
    </form>
</body>
</html>
