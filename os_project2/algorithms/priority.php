<?php

function runPriority($processes)
{
    $n = count($processes);
    $readyQueue = [];
    $completed = [];
    $currentTime = 0;
    $gantt = [];
    
    // Sort by arrival time initially
    usort($processes, function($a, $b) {
        return $a['arrival'] - $b['arrival'];
    });

    $remainingProcesses = $processes;

    while (count($completed) < $n) {
        // Add processes that have arrived to the ready queue
        foreach ($remainingProcesses as $key => $p) {
            if ($p['arrival'] <= $currentTime) {
                $readyQueue[] = $p;
                unset($remainingProcesses[$key]);
            }
        }

        if (empty($readyQueue)) {
            // CPU Idle
            if (!empty($remainingProcesses)) {
                $nextArrival = min(array_column($remainingProcesses, 'arrival'));
                $currentTime = $nextArrival;
                continue;
                
            }
            else {
                break;}
        }

        // Sort ready queue by priority (Lower value = Higher priority)
        usort($readyQueue, function($a, $b) {
            if ($a['priority'] === $b['priority']) {
                return $a['arrival'] - $b['arrival']; // FCFS for ties
            }
            return $a['priority'] - $b['priority'];
        });

        // Pick the highest priority job
        $currentProcess = array_shift($readyQueue);
        
        $startTime = $currentTime;
        $finishTime = $startTime + $currentProcess['burst'];
        $waitingTime = $startTime - $currentProcess['arrival'];
        $turnaroundTime = $finishTime - $currentProcess['arrival'];
        $responseTime = $waitingTime;

        $completed[] = [
            'id' => $currentProcess['id'],
            'arrival' => $currentProcess['arrival'],
            'burst' => $currentProcess['burst'],
            'priority' => $currentProcess['priority'],
            'finish' => $finishTime,
            'tat' => $turnaroundTime,
            'wt' => $waitingTime,
            'rt' => $responseTime
        ];

        $gantt[] = [
            'id' => $currentProcess['id'],
            'start' => $startTime,
            'end' => $finishTime
        ];

        $currentTime = $finishTime;
    }

    $totalWT = array_sum(array_column($completed, 'wt'));
    $totalTAT = array_sum(array_column($completed, 'tat'));
    $totalRT = array_sum(array_column($completed, 'rt'));

    return [
        'processes' => $completed,
        'gantt' => $gantt,
        'avg_wt' => round($totalWT / $n, 2),
        'avg_tat' => round($totalTAT / $n, 2),
        'avg_rt' => round($totalRT / $n, 2)
    ];
}