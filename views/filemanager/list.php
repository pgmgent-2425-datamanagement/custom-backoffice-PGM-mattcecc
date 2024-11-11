<h1>File Manager</h1>

<?php 
// Check if $list is a valid array before looping through it
if (is_array($list) && !empty($list)): 
    foreach ($list as $item):
        // Skip '.' and '..' entries
        if ($item != '.' && $item != '..'): ?>
            <li>
                <p><?= htmlspecialchars($item) ?></p>
                <img src="/images/<?= htmlspecialchars($item); ?>" alt="">
                <button>
                    <a href="/filemanager/delete/<?= urlencode($item); ?>" style="color: red;">Delete</a>
                </button>
            </li>
        <?php 
        endif;
    endforeach; 
else: ?>
    <p>No files found in this directory.</p>
<?php endif; ?>
