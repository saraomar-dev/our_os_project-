<?php

// Preemptive Priority Scheduling Implementation

function runPriorityPreemptive($processes)
{
  $n = count($processes);

  $currentTime = 0;
  $completedCount = 0;

  $completed = [];
  $gantt = [];

  // Add remaining burst time + started flag
  foreach ($processes as &$process) {

    $process['remaining'] = $process['burst'];

    $process['started'] = false;

    $process['completion'] = 0;
  }

  unset($process);

  while ($completedCount < $n) {

    $readyQueue = [];

    // Get all arrived processes
    foreach ($processes as $index => $process) {

      if (
        $process['arrival'] <= $currentTime &&
        $process['remaining'] > 0
      ) {

        $readyQueue[$index] = $process;
      }
    }

    // CPU Idle
    if (empty($readyQueue)) {

      $currentTime++;

      continue;
    }

    // Sort by priority
    usort($readyQueue, function ($a, $b) {

      // Lower number = higher priority
      if ($a['priority'] == $b['priority']) {

        return $a['arrival'] - $b['arrival'];
      }

      return $a['priority'] - $b['priority'];
    });

    // Select highest priority process
    $currentProcess = $readyQueue[0];
    echo "Current Time: " . $currentTime . PHP_EOL;

    echo "Running Process: "
      . $currentProcess['id']
      . PHP_EOL;
    // Find original index
    $originalIndex = null;

    foreach ($processes as $i => $p) {

      if ($p['id'] == $currentProcess['id']) {

        $originalIndex = $i;

        break;
      }
    }

    // Response Time
    if (!$processes[$originalIndex]['started']) {

      $processes[$originalIndex]['started'] = true;

      $processes[$originalIndex]['rt'] =
        $currentTime - $processes[$originalIndex]['arrival'];
    }

    // Gantt Start
    $startTime = $currentTime;

    // Execute for 1 unit only (PREEMPTIVE)
    $processes[$originalIndex]['remaining']--;
    echo "Remaining Burst: "
      . $processes[$originalIndex]['remaining']
      . PHP_EOL;

    echo "---------------------" . PHP_EOL;

    $currentTime++;

    $endTime = $currentTime;

    // Save gantt block
    $gantt[] = [
      'id' => $processes[$originalIndex]['id'],
      'start' => $startTime,
      'end' => $endTime
    ];

    // If process completed
    if ($processes[$originalIndex]['remaining'] == 0) {

      $completionTime = $currentTime;

      $tat =
        $completionTime -
        $processes[$originalIndex]['arrival'];

      $wt =
        $tat -
        $processes[$originalIndex]['burst'];

      $completed[] = [

        'pid' => $processes[$originalIndex]['id'],

        'arrival' => $processes[$originalIndex]['arrival'],

        'burst' => $processes[$originalIndex]['burst'],

        'priority' => $processes[$originalIndex]['priority'],

        'finish' => $completionTime,

        'tat' => $tat,

        'wt' => $wt,

        'rt' => $processes[$originalIndex]['rt']
      ];

      $completedCount++;
    }
  }

  // Average Calculations
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
