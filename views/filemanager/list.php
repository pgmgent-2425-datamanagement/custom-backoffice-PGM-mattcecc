<h1>filemanager</h1>

<?php foreach ($list as $item):
    if ($item != '.' && $item != '..'):
        if (is_dir(BASE_DIR . '/public/images/' . $item)): ?>
            <li><a href="/filemanager/<?= $item; ?>"><?= $item; ?></a>
        </li>
        <?php else: ?>
        <li>
            <p><?= $item ?> </p>
            <img src="/images/<?= $item; ?>" alt="">
            <button><a href="/filemanager/delete/<?= $item; ?>" style="color: red;">delete</a></button>
           
        </li>
<?php endif;
    endif;
endforeach; ?>