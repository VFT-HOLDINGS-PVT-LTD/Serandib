<!DOCTYPE html>
<html>
<head>
    <title>Supervisor Management</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <style>
        .ui-state-highlight {
            height: 2.5em;
            background-color: #f0f0f0;
            border: 1px dashed #ccc;
        }
    </style>
</head>
<body>

<!-- Common Input for Supervisor -->
<div class="form-group row">
    <label for="txt_supervisor_search" class="col-sm-4 control-label">Group Supervisor</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="txt_supervisor_search" id="txt_supervisor_search" placeholder="Search by ID or Name">
        <input type="hidden" name="cmb_Supervisor" id="cmb_Supervisor">
    </div>
</div>

<!-- Buttons for Each Table -->
<div class="row">
    <div class="form-group col-sm-2"><button type="button" class="btn btn-success" id="btn_add_department">Add 1</button></div>
    <div class="form-group col-sm-2"><button type="button" class="btn btn-success" id="btn_add_department2">Add 2</button></div>
    <div class="form-group col-sm-2"><button type="button" class="btn btn-success" id="btn_add_department3">Add 3</button></div>
    <div class="form-group col-sm-2"><button type="button" class="btn btn-success" id="btn_add_department4">Add 4</button></div>
    <div class="form-group col-sm-2"><button type="button" class="btn btn-success" id="btn_add_department5">Add 5</button></div>
    <div class="form-group col-sm-2"><button type="button" class="btn btn-success" id="btn_add_department6">Add 6</button></div>
</div>

<!-- Tables 1 to 6 -->
<div class="row">
    <!-- Generate 6 tables -->
    <!-- You can copy this block and change the number for each -->
    <div class="form-group col-md-12">
        ${[1,2,3,4,5,6].map(i => `
        <div class="form-group col-sm-12" id="departmentDiv${i}" style="display: none;">
            <table class="table" id="departmentTable${i}">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>User Level Type</th>
                        <th>Authority Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="sortableRows${i}"></tbody>
            </table>
        </div>`).join('')}
    </div>
</div>

<script>
// Autocomplete
$(function () {
    $("#txt_supervisor_search").autocomplete({
        source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_emp_no_and_name",
        minLength: 1,
        select: function (event, ui) {
            $("#cmb_Supervisor").val(ui.item.value); // ID
            $("#txt_supervisor_search").val(ui.item.value + ' - ' + ui.item.label); // Display text
            return false;
        }
    }).autocomplete("instance")._renderItem = function (ul, item) {
        return $("<li>")
            .append("<div>" + item.value + " - " + item.label + "</div>")
            .appendTo(ul);
    };
});

// Dynamic Select - PHP-rendered
const dynamicSelect = `<?php ob_start(); ?>
    <div style="position: relative; width: 180px;">
        <select class="modern-select" required="required"
            style="appearance: none; width: 95%; padding: 10px 50px 16px 20px; font-size: 14px; color: #2d3748;
                   background: rgba(255, 255, 255, 0.95); border: 2px solid rgb(143 142 142 / 29%);
                   border-radius: 16px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); outline: none;">
            <option value="0">Choose option</option>
            <?php foreach ($data_level as $data_level1) { ?>
                <option value="<?php echo $data_level1->user_level_id; ?>"><?php echo $data_level1->user_level_name; ?></option>
            <?php } ?>
        </select>
        <svg style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;
                    pointer-events: none; color: #667eea;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6,9 12,15 18,9"></polyline>
        </svg>
    </div>
<?php echo trim(preg_replace('/\s+/', ' ', ob_get_clean())); ?>`;

// Static Select
const staticSelect = `
    <div style="position: relative; width: 180px;">
        <select class="modern-select" required="required"
            style="appearance: none; width: 95%; padding: 10px 50px 16px 20px; font-size: 14px; color: #2d3748;
                   background: rgba(255, 255, 255, 0.95); border: 2px solid rgb(143 142 142 / 29%);
                   border-radius: 16px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); outline: none;">
            <option value="0">Choose option</option>
            <option value="1">Approve Type</option>
            <option value="2">View Only Type</option>
        </select>
        <svg style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;
                    pointer-events: none; color: #667eea;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6,9 12,15 18,9"></polyline>
        </svg>
    </div>`;

// Function to add supervisor row
function addSupervisorRow(buttonId, tableId, tbodyId, containerId) {
    document.getElementById(buttonId).addEventListener("click", function () {
        var input = document.getElementById("txt_supervisor_search");
        var supervisorId = document.getElementById("cmb_Supervisor").value;
        var supervisorName = input.value;

        if (supervisorName !== "" && supervisorId !== "") {
            var exists = false;
            $(`#${tbodyId} tr`).each(function () {
                if ($(this).attr("data-id") === supervisorId) {
                    exists = true;
                    return false;
                }
            });

            if (exists) {
                alert("This supervisor has already been added.");
                return;
            }

            var tableBody = document.getElementById(tableId).getElementsByTagName('tbody')[0];
            var newRow = tableBody.insertRow();
            newRow.setAttribute("data-id", supervisorId);
            newRow.classList.add("draggable");

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.textContent = "";
            cell2.textContent = supervisorName;
            cell3.innerHTML = dynamicSelect;
            cell4.innerHTML = staticSelect;
            cell5.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>';

            input.value = "";
            document.getElementById("cmb_Supervisor").value = "";

            document.getElementById(containerId).style.display = "block";
            updateRowNumbers(tbodyId);
        } else {
            alert("Please select a valid supervisor.");
        }
    });
}

// Row number updater
function updateRowNumbers(tbodyId) {
    const rows = document.querySelectorAll(`#${tbodyId} tr`);
    rows.forEach((row, index) => {
        row.querySelector("td").textContent = index + 1;
    });
}

// Remove row
function removeRow(button) {
    var row = button.parentNode.parentNode;
    var tbody = row.parentNode;
    var tableDiv = tbody.closest("div[id^='departmentDiv']");
    row.remove();

    if (tbody.querySelectorAll("tr").length === 0) {
        tableDiv.style.display = "none";
    }

    updateRowNumbers(tbody.id);
}

// Init drag-and-drop and row functions
$(function () {
    for (let i = 1; i <= 6; i++) {
        addSupervisorRow(`btn_add_department${i === 1 ? '' : i}`, `departmentTable${i}`, `sortableRows${i}`, `departmentDiv${i}`);
        $(`#sortableRows${i}`).sortable({
            placeholder: "ui-state-highlight",
            update: function () {
                updateRowNumbers(this.id);
            }
        }).disableSelection();
    }
});
</script>

</body>
</html>
