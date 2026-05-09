<?php  $sjf = $_SESSION['sjf']; 
    $priority = $_SESSION['priority'];
    $sjfpre = $_SESSION['sjfpre'];
    $prioritypre = $_SESSION['Prioritypre'];?>
<h2>SJF Results</h2>
<table>

    <tr>
        <th>Process</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
        <th>Response Time</th>
    </tr>
    <?php foreach ($sjf['processes'] as $process): ?>

        <tr>
            <td><?php echo $process['pid']; ?></td>
            <td><?php echo $process['wt']; ?></td>
            <td><?php echo $process['tat']; ?></td>
            <td><?php echo $process['rt']; ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<p>Average Waiting Time: <?php echo $sjf['avg_wt']; ?></p>

<p>Average Turnaround Time: <?php echo $sjf['avg_tat']; ?></p>

<p>Average Response Time: <?php echo $sjf['avg_rt']; ?></p>

<hr>
<h2>premetive SJF Results</h2>
<table>

    <tr>
        <th>Process</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
        <th>Response Time</th>
    </tr>
    <?php foreach ($sjfpre['processes'] as $process): ?>

        <tr>
            <td><?php echo $process['id']; ?></td>
            <td><?php echo $process['wt']; ?></td>
            <td><?php echo $process['tat']; ?></td>
            <td><?php echo $process['rt']; ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<p>Average Waiting Time: <?php echo $sjfpre['avg_wt']; ?></p>

<p>Average Turnaround Time: <?php echo $sjfpre['avg_tat']; ?></p>

<p>Average Response Time: <?php echo $sjfpre['avg_rt']; ?></p>

<hr>


<h2>Priority Results</h2>

<table>

    <tr>
        <th>Process</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
        <th>Response Time</th>
    </tr>
    
    <?php foreach ($priority['processes'] as $process): ?>

        <tr>
            <td><?php echo $process['id']; ?></td>
            <td><?php echo $process['wt']; ?></td>
            <td><?php echo $process['tat']; ?></td>
            <td><?php echo $process['rt']; ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<p>Average Waiting Time: <?php echo $priority['avg_wt']; ?></p>

<p>Average Turnaround Time: <?php echo $priority['avg_tat']; ?></p>

<p>Average Response Time: <?php echo $priority['avg_rt']; ?></p>






<h2>premetive Priority Results</h2>

<table>

    <tr>
        <th>Process</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
        <th>Response Time</th>
    </tr>
    
    <?php foreach ($prioritypre['processes'] as $process): ?>

        <tr>
            <td><?php echo $process['pid']; ?></td>
            <td><?php echo $process['wt']; ?></td>
            <td><?php echo $process['tat']; ?></td>
            <td><?php echo $process['rt']; ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<p>Average Waiting Time: <?php echo $prioritypre['avg_wt']; ?></p>

<p>Average Turnaround Time: <?php echo $prioritypre['avg_tat']; ?></p>

<p>Average Response Time: <?php echo $prioritypre['avg_rt']; ?></p>







































