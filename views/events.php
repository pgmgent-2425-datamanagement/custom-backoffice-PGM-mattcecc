<h1>Events</h1>

<?php foreach($events as $event): ?>
    <div class="event">
        <h2><?= $event->title; ?></h2>
        <p><?= $event->location; ?></p>
        <p><?= $event->datum; ?></p>
    </div>
<?php endforeach; ?>