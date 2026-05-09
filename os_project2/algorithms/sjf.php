<?php
function runSJF($processes) {
    $time = 0;
    $completed = [];
    $gantt = [];
    $remaining = $processes;

    while (count($remaining) > 0) {
        $available = array_filter($remaining, function($p) use ($time) {
            return $p['arrival'] <= $time;
        });

        if (empty($available)) {
            $time++;
            continue;
        }

        usort($available, function($a, $b) {
            return $a['burst'] <=> $b['burst'];
        });

        $current = $available[0];
        $start = $time;
        $finish = $time + $current['burst'];

        $ct = $finish;
        $tat = $ct - $current['arrival'];
        $wt = $tat - $current['burst'];
        $rt = $start - $current['arrival'];

        $gantt[] = [
            'id' => $current['id'],
            'start' => $start,
            'end' => $finish
        ];

        $completed[] = [
            'id' => $current['id'],
            'arrival' => $current['arrival'],
            'burst' => $current['burst'],
            'ct' => $ct,
            'tat' => $tat,
            'wt' => $wt,
            'rt' => $rt
        ];

        foreach ($remaining as $key => $p) {
            if ($p['id'] == $current['id']) {
                unset($remaining[$key]);
                break;
            }
        }
        $time = $finish;
    }

    $n = count($completed);
    return [
        'processes' => $completed,
        'gantt' => $gantt,
        'avg_wt' => array_sum(array_column($completed, 'wt')) / $n,
        'avg_tat' => array_sum(array_column($completed, 'tat')) / $n,
        'avg_rt' => array_sum(array_column($completed, 'rt')) / $n
    ];
}