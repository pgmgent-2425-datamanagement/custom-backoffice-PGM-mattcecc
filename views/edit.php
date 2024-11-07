<form method="post" enctype="multipart/form-data">
    <h1>Edit Event</h1>
    <label for="title">Event Name:</label>
    <input type="text" name="title" value="<?= $event->title; ?>" required><br><br>

    <label for="datum">Event Date:</label>
    <input type="dateTime" name="datum" value="<?= $event->datum; ?>" required><br><br>

    <label for="location">Event Location:</label>
    <input type="text" name="location" value="<?= $event->location; ?>" required><br><br>

    <label for="image">Image</label>
    <input type="file" name="image" value="<?= $event->image; ?>" accept="image/*" ><br><br>

    <p>
        <label>Organisator
            <select name="organisator_id" required>
                <?php foreach($users as $user): ?>
                    <option value="<?= $user->id ?>"><?= $user->naam ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </p>

    <input type="submit" value="Update Event">
</form>