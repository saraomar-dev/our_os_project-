<form method="POST" action="simulate.php">

<table class="table table-hover table-striped table-bordered text-center align-middle"
    id="processTable">

    <thead class="table-dark">
        <tr>
            <th>Process ID</th>
            <th>Arrival Time</th>
            <th>Burst Time</th>
            <th>Priority</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><input type="text" name="pid[]" class="form-control pid" value="P1" required></td>
            <td><input type="number" name="arrival[]" class="form-control" required></td>
            <td><input type="number" name="burst[]" class="form-control" required></td>
            <td><input type="number" name="priority[]" class="form-control"></td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">X</button>
            </td>
        </tr>
    </tbody>

</table>

<div class="text-center mt-3">

    <button type="button" class="btn btn-success px-4 fw-bold me-2" onclick="addRow()">
        + Add Process
    </button>

    
    <button type="submit" class="btn btn-primary px-4 fw-bold">
        Submit
    </button>

</div>

</form>

<script>

let counter = 1;

// Add row
function addRow() {

    counter++;

    let table = document.getElementById("processTable").getElementsByTagName('tbody')[0];

    let newRow = table.insertRow();

    newRow.innerHTML = `
        <td><input type="text" name="pid[]" class="form-control pid" value="P${counter}" required></td>
        <td><input type="number" name="arrival[]" class="form-control" required></td>
        <td><input type="number" name="burst[]" class="form-control" required></td>
        <td><input type="number" name="priority[]" class="form-control"></td>
        <td>
            <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">X</button>
        </td>
    `;
}

// Delete row
function deleteRow(btn) {
    btn.parentNode.parentNode.remove();
    updateProcessIDs();
}

// Re-index IDs
function updateProcessIDs() {

    let rows = document.querySelectorAll(".pid");

    counter = 0;

    rows.forEach((input, index) => {
        counter = index + 1;
        input.value = "P" + counter;
    });
}

</script>