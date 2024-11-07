<h1>Base MVC</h1>
<p>Welcome to this base mvc project.</p>

<?php
foreach($table as $row):?>
<div class="event"> 
    <p><?=$row->naam?> heeft <?=$row->userEvents?> evenement </p>
</div>
<?php endforeach;?>