<?php

function validateProcesses($processes) {

    foreach ($processes as $i => $p) {

        // check required fields
        if (!isset($p['id'], $p['arrival'], $p['burst'])) {
            return "Missing data at row " . ($i + 1);
        }

        // Process ID
        if (trim($p['id']) === "") {
            return "Process ID is required at row " . ($i + 1);
        }

        // Numeric check
        if (!is_numeric($p['arrival']) || !is_numeric($p['burst'])) {
            return "Arrival and Burst must be numbers at row " . ($i + 1);
        }

        // Arrival
        if ($p['arrival'] < 0) {
            return "Arrival must be ≥ 0 at row " . ($i + 1);
        }

        // Burst
        if ($p['burst'] <= 0) {
            return "Burst must be > 0 at row " . ($i + 1);
        }

        // Priority
        if (isset($p['priority']) && $p['priority'] !== "" && $p['priority'] < 0) {
            return "Priority must be ≥ 0 at row " . ($i + 1);
        }
    }

    return true;
}