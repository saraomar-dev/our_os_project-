<?php

$sjf = $_SESSION['sjf'] ?? null; 
$sjfpre = $_SESSION['sjfpre'] ?? null; 
$priority = $_SESSION['priority'] ?? null;

$prioritypre = $_SESSION['Prioritypre'] ?? $_SESSION['prioritypre'] ?? null; 
?>

<!-- SJF Gantt Chart -->
<?php if (!empty($sjf['gantt'])): ?>
    <h2>SJF Gantt Chart</h2>
    <div class="gantt">
        <?php foreach ($sjf['gantt'] as $item): ?>
            <div class="box">
                <?php echo $item['id']; ?><br>
                <?php echo $item['start']; ?> - <?php echo $item['end']; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Preemptive SJF Gantt Chart -->
<?php if (!empty($sjfpre['gantt'])): ?>
    <h2>Preemptive SJF Gantt Chart</h2>
    <div class="gantt">
        <?php foreach ($sjfpre['gantt'] as $item): ?>
            <div class="box">
                <?php echo $item['pid'] ?? $item['id']; ?><br>
                <?php echo $item['start']; ?> - <?php echo $item['end']; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Priority Gantt Chart -->
<?php if (!empty($priority['gantt'])): ?>
    <h2>Priority Gantt Chart</h2>
    <div class="gantt">
        <?php foreach ($priority['gantt'] as $item): ?>
            <div class="box">
                <?php echo $item['id']; ?><br>
                <?php echo $item['start']; ?> - <?php echo $item['end']; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Preemptive Priority Gantt Chart -->
<?php if (!empty($prioritypre['gantt'])): ?>
    <h2>Preemptive Priority Gantt Chart</h2>
    <div class="gantt" style="display: flex; gap: 5px; flex-wrap: wrap;">
        <?php 
        $mergedGantt = [];
        foreach ($prioritypre['gantt'] as $item) {
            $pid = $item['id'] ?? $item['pid'];
            $lastIndex = count($mergedGantt) - 1;

            if ($lastIndex >= 0 && $mergedGantt[$lastIndex]['id'] == $pid) {
                $mergedGantt[$lastIndex]['end'] = $item['end'];
            } else {
     
                $mergedGantt[] = [
                    'id' => $pid,
                    'start' => $item['start'],
                    'end' => $item['end']
                ];
            }
        }

        foreach ($mergedGantt as $box): ?>
            <div class="box" style="border: 1px solid #ccc; padding: 10px; text-align: center; min-width: 60px;">
                <strong><?php echo $box['id']; ?></strong><br>
                <?php echo $box['start']; ?> - <?php echo $box['end']; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>