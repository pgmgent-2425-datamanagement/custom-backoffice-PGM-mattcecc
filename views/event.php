<?php
//print_r($event);
?>
<h2><?= $event->title; ?></h2>
<img src="/images/<?= $event->image; ?>" alt="<?= $event->title; ?>">
<p><?= $event->location; ?></p>
<p><?= $event->datum; ?></p>
<p><?= $event->naam; ?></p>