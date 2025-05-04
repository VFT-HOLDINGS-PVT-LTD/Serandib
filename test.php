<div class="form-group col-sm-6 icheck-flat">
    <label for="focusedinput" class="col-sm-4 control-label">Select Payment Percentage</label>
    <div class="col-sm-8">
        <select class="form-control" id="cmb_percentage" name="cmb_percentage">
            <option value="" default>-- Select --</option>
            <option value="Direct">Directly</option>
            <option value="Common">Common</option>
        </select>
    </div>
</div>

<!-- Department Dropdown (Hidden by default) -->
<div class="form-group col-sm-6" id="departmentDiv" style="display: none;">
    <label for="focusedinput" class="col-sm-4 control-label">Department <span style="color: red;">*</span></label>
    <div class="col-sm-7">
        <select class="form-control" required="" id="cmb_dep" name="cmb_dep">
        <option value="" default>-- Select --</option>
            <!-- Example Departments -->
            <option value="1">HR</option>
            <option value="2">Finance</option>
            <option value="3">IT</option>
        </select>
    </div>
    <button type="button" class="btn btn-success col-2" id="btn_add_department">Add</button>
</div>

<!-- Table to display added departments and percentages -->
<table class="table" id="departmentTable">
    <thead>
        <tr>
            <th>Department</th>
            <th>Percentage</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Rows will be added dynamically here -->
    </tbody>
</table>

<script>
// JavaScript to handle the display of the department div when "Common" is selected
document.getElementById("cmb_percentage").addEventListener("change", function () {
    var departmentDiv = document.getElementById("departmentDiv");

    // Check if "Common" is selected
    if (this.value === "Common") {
        departmentDiv.style.display = "block";  // Show the department div
    } else {
        departmentDiv.style.display = "none";  // Hide the department div
    }
});

// JavaScript to handle adding the department and percentage to the table
document.getElementById("btn_add_department").addEventListener("click", function () {
    var departmentSelect = document.getElementById("cmb_dep");
    var percentageSelect = document.getElementById("cmb_percentage");
    
    var departmentId = departmentSelect.value;
    var departmentName = departmentSelect.options[departmentSelect.selectedIndex].text;
    var percentage = percentageSelect.value;

    // Check if both department and percentage are selected
    if (departmentId && percentage) {
        var table = document.getElementById("departmentTable").getElementsByTagName('tbody')[0];

        // Create a new row and populate it with the department name and percentage
        var newRow = table.insertRow();
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);

        // Add department name and percentage to the row
        cell1.innerHTML = departmentName;
        cell2.innerHTML = percentage;

        // Add an input field in the action column for editing the department or percentage
        cell3.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>';

        // Clear the selection after adding to the table
        departmentSelect.value = "";
        percentageSelect.value = "";
    } else {
        alert("Please select both department and percentage!");
    }
});

// Function to remove a row from the table
function removeRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
</script>
