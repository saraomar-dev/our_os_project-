<?php
include 'includes/navbar.php';
 session_start();
$sjf = $_SESSION['sjf'];
$priority = $_SESSION['priority'];
 ?>
<link rel="stylesheet" href="assets/navbar.css">
<div class="container">
    <h1>CPU Scheduling Results</h1>
    <?php include 'components/gantt_chart.php'; ?>
    <?php include 'components/results.php'; ?>
    <?php include 'components/comparison.php'; ?>
    <?php include 'components/conclusion.php'; ?>
</div>
