<div class="alert alert-dark mt-4 shadow-sm border-start border-5 border-primary">
    <h4 class="alert-heading text-primary fw-bold">Final Conclusion</h4>
    <hr>
    <p>After comparing both algorithms, we conclude the following:</p>
    <ul>
        <li><strong>SJF:</strong> Best for minimizing wait times and maximizing system efficiency.</li>
        <li><strong>Priority:</strong> Best for systems that require urgent task execution regardless of job length.</li>
    </ul>
    <p class="mb-0"><strong>Recommendation:</strong> Use SJF for high-performance computing and Priority for real-time mission-critical systems.</p>
</div>


<div class="alert alert-dark mt-4 shadow-sm border-start border-5 border-indigo" style="border-color: #6610f2 !important;">
    <h4 class="alert-heading fw-bold" style="color: #6610f2;">Preemptive Analysis: SJF vs. Priority</h4>
    <hr>
    <p>Comparing the preemptive behavior of both algorithms:</p>
    <ul>
        <li>
            <strong>Preemptive SJF (SRTF):</strong> Based on <strong>Shortest Remaining Time</strong>. A running process is preempted only if a new process arrives with a shorter remaining burst time.
            <br><em>Note:</em> It reduces average waiting time but increases context switching overhead.
        </li>

        <li>
            <strong>Preemptive Priority:</strong> Based on <strong>process importance (priority rank)</strong>.
            A running process is immediately preempted if a higher priority process arrives.
        </li>
    </ul>

    <p class="mb-0">
        <strong>Key Difference:</strong> SJF focuses on minimizing waiting time, while Priority focuses on executing the most important tasks first regardless of execution time.
    </p>
</div>


<!-- Row 1: Non-Preemptive Comparison -->
<div class="row mt-4">
    <div class="col-md-12 mb-3">
        <h5 class="fw-bold text-secondary border-bottom pb-2">1. Non-Preemptive Algorithms</h5>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold">SJF (Non-Preemptive)</div>
            <div class="card-body bg-light">
                <ul class="small mb-0">
                    <li><strong>Concept:</strong> Once a process starts execution, it runs until completion without interruption.</li>
                    <li><strong>Selection:</strong> The CPU selects the process with the smallest burst time from the ready queue.</li>
                    <li><strong>Efficiency:</strong> Reduces average waiting time compared to FCFS.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-success text-white fw-bold">Priority (Non-Preemptive)</div>
            <div class="card-body bg-light">
                <ul class="small mb-0">
                    <li><strong>Concept:</strong> The running process cannot be interrupted once it starts execution.</li>
                    <li><strong>Selection:</strong> The process with the highest priority (lowest number) is selected.</li>
                    <li><strong>Note:</strong> May cause <strong>starvation</strong> for low-priority processes.</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Row 2: Preemptive Comparison -->
<div class="row mt-4">
    <div class="col-md-12 mb-3">
        <h5 class="fw-bold text-secondary border-bottom pb-2">2. Preemptive Algorithms</h5>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header text-white fw-bold" style="background-color: #6610f2;">SRTF (Preemptive SJF)</div>
            <div class="card-body bg-light">
                <ul class="small mb-0">
                    <li><strong>Concept:</strong> The CPU always executes the process with the shortest remaining time.</li>
                    <li><strong>Preemption:</strong> A process is interrupted if a shorter job arrives.</li>
                    <li><strong>Performance:</strong> Optimal for minimizing average waiting time.</li>
                    <li><strong>Note:</strong> May increase context switching overhead.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-dark text-white fw-bold">Preemptive Priority</div>
            <div class="card-body bg-light">
                <ul class="small mb-0">
                    <li><strong>Concept:</strong> CPU always executes the highest priority process available.</li>
                    <li><strong>Preemption:</strong> Higher priority process immediately interrupts current execution.</li>
                    <li><strong>Usage:</strong> Suitable for real-time and critical systems.</li>
                    <li><strong>Note:</strong> May lead to starvation of low-priority processes.</li>
                </ul>
            </div>
        </div>
    </div>
</div>