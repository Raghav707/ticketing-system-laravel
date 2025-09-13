<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Ticket</title>
</head>
<body>
    <h1>Create a New Ticket</h1>

    <form action="/tickets" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title">
        </div>
        <br>
        <div>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea>
        </div>
        <br>
        <div>
            <label for="status">Status:</label><br>
            <select name="status" id="status">
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <br>
        <button type="submit">Create Ticket</button>
    </form>
</body>
</html>