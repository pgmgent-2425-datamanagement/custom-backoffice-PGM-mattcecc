<form method="post">
    <h1>Edit Event</h1>
    <label for="title">Event Name:</label>
    <input type="text" name="title" value="<?= $event->title; ?>" required><br><br>

    <label for="datum">Event Date:</label>
    <input type="date" name="datum" value="<?= $event->datum; ?>" required><br><br>

    <label for="location">Event Location:</label>
    <input type="text" name="location" value="<?= $event->location; ?>" required><br><br>

    <input type="submit" value="Update Event">
</form>