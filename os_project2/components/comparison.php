<div class="card shadow-sm mt-4 p-4 border-primary">
    <h3 class="text-primary border-bottom pb-2">Performance Analysis & Comparison</h3>
    <div class="row mt-3">
        <div class="col-md-6">
            <p><strong>Average Waiting Time (WT) Comparison:</strong></p>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Shortest Job First (SJF)
                    <span class="badge bg-success rounded-pill"><?php echo number_format($_SESSION['sjf']['avg_wt'], 2); ?> ms</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Priority Scheduling
                    <span class="badge bg-warning rounded-pill"><?php echo number_format($_SESSION['priority']['avg_wt'], 2); ?> ms</span>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <p><strong>Analysis Insight:</strong></p>
            <p class="text-muted">
                <?php 
                if($_SESSION['sjf']['avg_wt'] < $_SESSION['priority']['avg_wt']) {
                    echo "SJF achieved a lower average waiting time, making it more efficient for this workload.";
                } else {
                    echo "Priority scheduling focused on process importance, which increased the overall average wait.";
                }
                ?>
            </p>
        </div>
    </div>
</div>



<div class="card shadow-sm mt-4 p-4 border-primary">
    <h3 class="text-primary border-bottom pb-2">Performance Analysis & Comparison for premetive</h3>
    <div class="row mt-3">
        <div class="col-md-6">
            <p><strong>Average Waiting Time (WT) Comparison:</strong></p>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Shortest Job First (SJF)
                    <span class="badge bg-success rounded-pill"><?php echo number_format($_SESSION['sjfpre']['avg_wt'], 2); ?> ms</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Priority Scheduling
                    <span class="badge bg-warning rounded-pill"><?php echo number_format($_SESSION['Prioritypre']['avg_wt'], 2); ?> ms</span>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <p><strong>Analysis Insight:</strong></p>
            <p class="text-muted">
                <?php 
                if($_SESSION['sjf']['avg_wt'] < $_SESSION['priority']['avg_wt']) {
                    echo "SJF achieved a lower average waiting time, making it more efficient for this workload.";
                } else {
                    echo "Priority scheduling focused on process importance, which increased the overall average wait.";
                }
                ?>
            </p>
        </div>
    </div>
</div>
