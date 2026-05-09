<?php

function runSJFpre($processes)
{
    $time = 0;
    $completed = 0;
    $n = count($processes);

    $gantt = [];
    $completedProcesses = [];

   
    foreach ($processes as &$p) {
        $p['remaining'] = $p['burst'];
        $p['started'] = false;
        $p['rt'] = -1;
        $p['ct'] = 0;
        $p['tat'] = 0;
        $p['wt'] = 0;
    }
    unset($p);

    $lastPid = null;

    while ($completed < $n) {

       
        $available = array_filter($processes, function($p) use ($time) {
            return $p['arrival'] <= $time && $p['remaining'] > 0;
        });

        if (empty($available)) {
            $time++;
            continue;
        }

        
        usort($available, function($a, $b) {

            if ($a['remaining'] == $b['remaining']) {
                return $a['arrival'] <=> $b['arrival'];
            }

            return $a['remaining'] <=> $b['remaining'];
        });

        $current = $available[0];

        
        foreach ($processes as &$p) {
            if ($p['id'] == $current['id']) {
                if ($p['started'] == false) {
                    $p['rt'] = $time - $p['arrival'];
                    $p['started'] = true;
                }
                break;
            }
        }

        
        if ($lastPid != $current['id']) {
            $gantt[] = [
                'pid' => $current['id'],
                'start' => $time,
                'end' => $time + 1
            ];
        } else {
            $gantt[count($gantt)-1]['end']++;
        }

        $lastPid = $current['id'];

        
        foreach ($processes as &$p) {
            if ($p['id'] == $current['id']) {
                $p['remaining']--;
                break;
            }
        }

        $time++;

       
        foreach ($processes as &$p) {
            if ($p['id'] == $current['id'] && $p['remaining'] == 0) {

                $p['ct'] = $time;
                $p['tat'] = $p['ct'] - $p['arrival'];
                $p['wt'] = $p['tat'] - $p['burst'];

                $completedProcesses[] = $p;
                $completed++;
                break;
            }
        }
    }

    
    $sumWT = 0;
    $sumTAT = 0;
    $sumRT = 0;

    foreach ($completedProcesses as $p) {
        $sumWT += $p['wt'];
        $sumTAT += $p['tat'];
        $sumRT += $p['rt'];
    }

    return [
        'processes' => $completedProcesses,
        'gantt' => $gantt,
        'avg_wt' => $sumWT / $n,
        'avg_tat' => $sumTAT / $n,
        'avg_rt' => $sumRT / $n
    ];
}