<h1>Event aanmaken</h1>

<form method="post" enctype="multipart/form-data">
    <p>
        <label>
            title
        <input type="text" name="title" placeholder="naam evenement" value="" required>
    </label>
    </p>
    <p>
        <label>
            Location
        <textarea name="location" rows="6" required></textarea>
    </label>
    </p>
    <p>
        <label>
            datum
        <input type="date" name="datum" value="" required>
    </label>
    </p>
    <p>
        <label>
            Image
        <input type="file" name="image" value="" accept="image/*" >
        </label>
    </p>
    <p>
        <label>Organisator
            <select name="organisator_id" required>
                <?php foreach($users as $user): ?>
                    <option value="<?= $user->id ?>"><?= $user->naam ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </p>
    <input type="submit" value="opslaan">
</form>