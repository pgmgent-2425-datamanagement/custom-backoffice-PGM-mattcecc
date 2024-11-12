<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
</head>
<body>
    <div class="brand">Custom backoffice</div>

    <nav>
        <a href="/">Home</a>
        <a href="/events">events</a>
        <a href="/events/add">aanmaken</a>
        <a href="/filemanager">filemanager</a>
    </nav>

    <main>
        <?= $content; ?>
    </main>
    
    <footer>
        &copy; <?= date('Y'); ?> - Matthias Cecchi
    </footer>
</body>
</html>