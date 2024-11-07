<h1>Events</h1>

<form method="GET">
    <label>zoeken
        <input type="text" name="search" placeholder="Zoekterm" value="<?=   $search ?>">
    </label>
    <input type="submit" value="zoeken">
</form>
<?php
//print_r($events[0]);
?>
<?php foreach($events as $event):?>
    <div class="event">
        <a href="/events/detail/<?= $event->id; ?>">
        <h2><?= $event->title; ?></h2>
        <img src="/images/<?= $event->image; ?>" alt="<?= $event->title; ?>">
        <p><?= $event->location; ?></p>
        <p><?= $event->datum; ?></p>
        <p><?= $event->naam; ?></p>
        <a href="/events/delete/<?= $event->id; ?>">delete</a></a>
        <a href="/events/edit/<?= $event->id; ?>">edit</a>
    </div>
<?php endforeach; ?>