<h1>Base MVC</h1>
<p>Welcome to this base mvc project.</p>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
foreach($table as $row):?>
<div class="event"> 
    <p><?=$row->naam?> heeft <?=$row->userEvents?> evenement </p>
</div>
<?php endforeach;?>
<div style="display: flex; justify-content: space-around; width: 100%;">
    <div style="width: 45%;">
        <canvas id="acquisitions"></canvas>
    </div>
    <div style="width: 35%;">
        <canvas id="acquisitions-doughnut"></canvas>
    </div>
</div>

<?php
$names =[];
$amounts =[];

foreach($table as $row){
    $names[] = $row->naam;
    $amounts[] = $row->userEvents;
}

$names = json_encode($names);
$amounts = json_encode($amounts);
?>

<script>
    const names = <?php echo $names; ?>;
    const amounts = <?php echo $amounts; ?>;

    new Chart(
        document.getElementById('acquisitions'),
        {
            type: 'bar',
            data: {
                labels: names,
                datasets: [
                    {
                        label: 'User Events',
                        data: amounts
                    }
                ]
            }
        }
    );
new Chart(
    document.getElementById('acquisitions-doughnut'),
    {
        type: 'doughnut',
        data: {
            labels: names,
            datasets: [
                {
                    label: 'User Events',
                    data: amounts
                }
            ]
        }
    }
);
</script>