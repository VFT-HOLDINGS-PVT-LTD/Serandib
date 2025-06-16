<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Styles -->
  <?php $this->load->view('template/css.php'); ?>
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> -->
  <style>
    /* Main Layout */
    .new-content-wrapper {
      /* background-color: #f5f7fa; */
      min-height: 100vh;
    }

    .new-static-content {
      /* padding: 20px; */
    }

    .new-page-content {
      /* background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      padding: 20px; */
    }

    /* Breadcrumb */
    .new-breadcrumb {
      background: transparent;
      padding: 0;
      margin-bottom: 20px;
    }

    .new-breadcrumb-item a {
      color: #6c757d;
      text-decoration: none;
    }

    .new-breadcrumb-item.active a {
      color: #495057;
      font-weight: 500;
    }

    /* Tabs */
    .new-nav-tabs {
      border-bottom: 2px solid #dee2e6;
    }

    .new-tab-item {
      margin-bottom: -2px;
    }

    .new-tab-link {
      color: #6c757d;
      border: none;
      padding: 12px 20px;
      font-weight: 500;
      /* border-radius: 0; */
    }

    .new-tab-item.active .new-tab-link {
      color: #3a7bd5;
      border-bottom: 2px solid #3a7bd5;
      background: transparent;
    }

    /* Panels */
    .new-panel {
      border: none;
      /* border-radius: 8px; */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 20px;
    }

    .new-panel-heading {
      background: linear-gradient(135deg, #3a7bd5, #00d2ff);
      color: white;
      /* border-radius: 8px 8px 0 0 !important; */
      padding: 15px 20px;
      border: none;
    }

    .new-panel-title {
      font-size: 18px;
      font-weight: 600;
      margin: 0;
    }

    .new-panel-body {
      padding: 20px;
      background-color: #fff;
      /* border-radius: 0 0 8px 8px; */
    }

    /* Form Elements */
    .new-form-group {
      margin-bottom: 20px;
    }

    .new-input-label {
      font-weight: 500;
      color: #495057;
      margin-bottom: 8px;
      display: block;
    }

    .new-input-control {
      border: 1px solid #e1e5eb;
      /* border-radius: 6px; */
      padding: 10px 15px;
      height: auto;
      transition: all 0.3s;
    }

    .new-input-control:focus {
      border-color: #3a7bd5;
      box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
    }

    .new-select-control {
      appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 15px;
      height: 40px;
    }

    /* Checkboxes */
    .new-form-check {
      padding-left: 5px;
      margin-bottom: 10px;
    }

    .new-checkbox {
      /* margin-left: -30px;
      margin-top: 0;
      width: 20px;
      height: 20px;
      border: 2px solid #e1e5eb; */
    }

    .new-checkbox:checked {
      background-color: #3a7bd5;
      border-color: #3a7bd5;
    }

    .new-checkbox-label {
      cursor: pointer;
      user-select: none;
    }

    /* Buttons */
    .new-submit-button {
      background: linear-gradient(135deg, #3a7bd5, #00d2ff);
      color: white;
      border: none;
      border-radius: 6px;
      padding: 10px 20px;
      font-weight: 500;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      width: 100%;
      margin-top: 25px;
    }

    .new-submit-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(58, 123, 213, 0.3);
    }

    .new-button-icon {
      margin-right: 8px;
    }

    .new-action-button {
      background-color: #fff;
      color: #3a7bd5;
      border: 1px solid #3a7bd5;
      border-radius: 6px;
      padding: 10px;
      font-weight: 500;
      transition: all 0.3s;
      width: 100%;
      margin-bottom: 10px;
    }

    .new-action-button:hover {
      background-color: #3a7bd5;
      color: white;
    }

    .new-duplicate-button {
      background-color: #fff;
      color: #17a2b8;
      border: 1px solid #17a2b8;
      border-radius: 6px;
      padding: 10px;
      font-weight: 500;
      transition: all 0.3s;
      width: 100%;
      margin-top: 25px;
    }

    .new-duplicate-button:hover {
      background-color: #17a2b8;
      color: white;
    }

    .new-duplicate-icon {
      margin-right: 8px;
    }

    /* Progress Bar */
    .new-progress-container {
      margin: 15px 0;
    }

    .new-progress-track {
      background-color: #f3f3f3;
      border-radius: 10px;
      overflow: hidden;
      height: 20px;
    }

    .new-progress-bar {
      width: 0%;
      height: 100%;
      background: linear-gradient(135deg, #3a7bd5, #00d2ff);
      text-align: center;
      color: white;
      font-size: 12px;
      line-height: 20px;
      transition: width 0.3s;
    }

    /* Section Headers */
    .new-section-header {
      /* margin: 25px 0 15px; */
      position: relative;
    }

    .new-section-title {
      font-size: 16px;
      font-weight: 500;
      color: #495057;
      position: relative;
      display: inline-block;
      padding-bottom: 5px;
    }

    .new-section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 2px;
      background: linear-gradient(135deg, rgb(0, 0, 0), rgb(0, 0, 0));
    }

    /* Divider */
    .new-divider {
      width: 100%;
      height: 2px;
      background: linear-gradient(135deg, rgb(0, 0, 0), rgb(0, 0, 0));
      margin: 20px 0;
      opacity: 0.2;
    }

    /* Tables */
    .new-data-table {
      border: 1px solid #e1e5eb;
      border-radius: 6px;
      overflow: hidden;
    }

    .new-table-header {
      background-color: #f8f9fa;
      background: linear-gradient(60deg, rgba(59, 105, 129, 1) 0%, rgba(54, 120, 150, 0.644782913165266) 100%);
      color: white;
      /* border-radius: 30px; */
    }

    .new-table-header th {
      font-weight: 600;
      color: white;
      border-bottom: 2px solid #e1e5eb !important;
    }

    .new-table-body td {
      vertical-align: middle;
    }

    .new-edit-button {
      background-color: #28a745;
      color: white;
      border-radius: 4px;
      padding: 5px 10px;
    }

    /* .new-delete-button {
      background-color: #dc3545;
      color: white;
      border-radius: 4px;
      padding: 5px 10px;
    } */

    /* Alerts */
    .new-alert-success {
      background-color: #d4edda;
      color: #155724;
      border: none;
      border-radius: 6px;
    }

    .new-alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: none;
      border-radius: 6px;
    }

    /* Icon */
    .new-icon-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .new-icon-image {
      max-height: 80px;
      filter: drop-shadow(0 4px 6px rgba(58, 123, 213, 0.2));
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {

      .new-col-left,
      .new-col-right {
        width: 100%;
      }

      .new-button-row {
        margin-bottom: 10px;
      }

      .new-action-button {
        margin-bottom: 10px;
      }
    }

    tbody tr {
      cursor: move;
    }
  </style>
</head>

<body class="infobar-offcanvas">

  <!--header-->

  <?php $this->load->view('template/header.php'); ?>

  <!--end header-->

  <div id="wrapper">
    <div id="layout-static">
      <!--dashboard side-->
      <?php $this->load->view('template/dashboard_side.php'); ?>
      <!--dashboard side end-->

      <div class="static-content-wrapper new-content-wrapper">
        <div class="static-content new-static-content">
          <div class="page-content new-page-content">
            <ol class="breadcrumb new-breadcrumb">
              <li><a href="index.html">HOME</a></li>
              <li class="active"><a href="index.html">SUB DEPARTMENT</a></li>
            </ol>

            <div class="page-tabs new-page-tabs">
              <ul class="nav nav-tabs new-nav-tabs">
                <li class="active new-tab-item"><a data-toggle="tab" href="#tab1" class="new-tab-link">SUB
                    DEPARTMENT</a></li>
                <li class="new-tab-item"><a data-toggle="tab" href="#tab2" class="new-tab-link">EDIT SUB
                    DEPARTMENT</a></li>
              </ul>
            </div>

            <div class="container-fluid new-container-fluid">
              <div class="tab-content new-tab-content">
                <div class="tab-pane active new-tab-pane" id="tab1">
                  <div class="row new-main-row">
                    <div class="col-xs-12 new-col-full">
                      <!-- Progress Bar -->
                      <div id="uploadProgressBar" class="new-progress-container" style="display:none;">
                        <div class="new-progress-track">
                          <div id="uploadBar" class="new-progress-bar">0%</div>
                        </div>
                      </div>

                      <div class="row new-content-row">
                        <!-- Left Panel - Add Sub Department -->
                        <div class="col-md-4 new-col-left">
                          <div class="panel panel-info new-panel">
                            <div class="panel-heading new-panel-heading">
                              <h2 class="new-panel-title">ADD SUB DEPARTMENT</h2>
                            </div>
                            <div class="panel-body new-panel-body">
                              <!-- Success Message -->
                              <?php if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != '') { ?>
                                <div id="spnmessage"
                                  class="alert alert-success alert-dismissible fade show new-alert-success">
                                  <strong>Success!</strong> <?php echo $_SESSION['success_message']; ?>
                                </div>
                              <?php } ?>

                              <!-- Error Message -->
                              <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != '') { ?>
                                <div id="spnmessage"
                                  class="alert alert-danger alert-dismissible fade show new-alert-error">
                                  <strong>Error!</strong> <?php echo $_SESSION['error_message']; ?>
                                </div>
                              <?php } ?>

                              <!-- <div class="form-row mb-5 new-form-row">
                                <div class="form-group col-md-3 new-icon-container">
                                  <img class="new-icon-image"
                                    src="<?php echo base_url(); ?>assets/images/employee_group.png" alt="Group Icon">
                                </div>
                              </div> -->

                              <div class="form-group new-form-group">
                                <label for="department_select" class="new-input-label">Department</label>
                                <select class="form-control new-select-control" id="department_select"
                                  name="department_select">
                                  <option value="">-- Select --</option>
                                  <?php foreach ($data_dep as $t_data) { ?>
                                    <option value="<?php echo $t_data->Dep_ID; ?>"><?php echo $t_data->Dep_Name; ?>
                                    </option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="form-group new-form-group">
                                <label for="txt_group_name" class="new-input-label">Sub Department Name</label>
                                <input type="text" class="form-control new-input-control" id="txt_group_name"
                                  name="txt_group_name" placeholder="Ex: Office">
                              </div>

                              <div class="new-section-header">
                                <h5 class="new-section-title">Additional Settings</h5>
                              </div>

                              <div class="row new-checkbox-row">
                                <div class="col-md-6 new-checkbox-col">
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="ot_m"
                                      id="chk_1st_morning">
                                    <label class="form-check-label new-checkbox-label" for="chk_1st_morning">OT
                                      Morning</label>
                                  </div>
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="late"
                                      id="chk_late">
                                    <label class="form-check-label new-checkbox-label" for="chk_late">Late
                                      Deduction</label>
                                  </div>
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="late_ot"
                                      id="chk_late_ot">
                                    <label class="form-check-label new-checkbox-label" for="chk_late_ot">Late Deduct
                                      from OT</label>
                                  </div>
                                </div>
                                <div class="col-md-6 new-checkbox-col">
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="ot_e"
                                      id="chk_1st_evening">
                                    <label class="form-check-label new-checkbox-label" for="chk_1st_evening">OT
                                      Evening</label>
                                  </div>
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="ed" id="chk_ed">
                                    <label class="form-check-label new-checkbox-label" for="chk_ed">Early Departure
                                      Deduction</label>
                                  </div>
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="sh_lv"
                                      id="chk_sh_lv">
                                    <label class="form-check-label new-checkbox-label" for="chk_sh_lv">Late Deduct for
                                      Half
                                      Day</label>
                                  </div>
                                </div>
                              </div>

                              <div class="row new-checkbox-row">
                                <div class="col-md-6 new-checkbox-col">
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="dot_holyday"
                                      id="chk_dot_holiday">
                                    <label class="form-check-label new-checkbox-label" for="chk_dot_holiday">Double OT
                                      for Holiday Day</label>
                                  </div>
                                </div>
                                <div class="col-md-6 new-checkbox-col">
                                  <div class="form-check new-form-check">
                                    <input class="form-check-input new-checkbox" type="checkbox" name="dot_offday"
                                      id="chk_dot_offday">
                                    <label class="form-check-label new-checkbox-label" for="chk_dot_offday">Double OT
                                      for OFF Day</label>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group new-form-group">
                                <label for="min_t_ot" class="new-input-label">Min Time to Morning OT</label>
                                <input type="number" class="form-control new-input-control" id="min_t_ot"
                                  name="min_t_ot" placeholder="Ex: 120">
                              </div>

                              <div class="form-group new-form-group">
                                <label for="min_t_e_ot" class="new-input-label">Min Time to Evening OT</label>
                                <input type="number" class="form-control new-input-control" id="min_t_e_ot"
                                  name="min_t_e_ot" placeholder="Ex: 120">
                              </div>

                              <div class="form-group new-form-group">
                                <label for="round" class="new-input-label">Round Up</label>
                                <input type="number" class="form-control new-input-control" id="round" name="round"
                                  placeholder="Ex: 120">
                              </div>

                              <div class="form-group new-form-group">
                                <label for="late_gp" class="new-input-label">Late Grace Period</label>
                                <input type="number" class="form-control new-input-control" id="late_gp" name="late_gp"
                                  placeholder="Ex: 120">
                              </div>

                              <div id="divmessage" class="new-message-container">
                                <div id="spnmessage" class="new-message-text"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Right Panel - Set Sub Department Authority -->
                        <div class="col-md-8 new-col-right">
                          <div class="panel panel-info new-panel">
                            <div class="panel-heading new-panel-heading">
                              <h2 class="new-panel-title">SET SUB DEPARTMENT AUTHORITY</h2>
                            </div>
                            <div class="panel-body new-panel-body">
                              <!-- Success Message -->
                              <?php if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != '') { ?>
                                <div id="spnmessage"
                                  class="alert alert-success alert-dismissible fade show new-alert-success">
                                  <strong>Success!</strong> <?php echo $_SESSION['success_message']; ?>
                                </div>
                              <?php } ?>

                              <!-- Error Message -->
                              <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != '') { ?>
                                <div id="spnmessage"
                                  class="alert alert-danger alert-dismissible fade show new-alert-error">
                                  <strong>Error!</strong> <?php echo $_SESSION['error_message']; ?>
                                </div>
                              <?php } ?>

                              <div class="form-group new-form-group">
                                <div class="row new-search-row">
                                  <div class="col-sm-8 new-search-col">
                                    <label for="txt_supervisor_search" class="new-input-label">Group Supervisor</label>
                                    <input type="text" class="form-control new-input-control"
                                      name="txt_supervisor_search" id="txt_supervisor_search"
                                      placeholder="Search by ID or Name">
                                    <input type="hidden" name="cmb_Supervisor" id="cmb_Supervisor">
                                  </div>
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" id="submit_departments" class="new-submit-button">
                                      <span class="new-button-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15"
                                          height="15">
                                          <path fill="none" d="M0 0h24v24H0z"></path>
                                          <path fill="currentColor"
                                            d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                          </path>
                                        </svg>
                                      </span>
                                      <span>SUBMIT</span>
                                    </button>
                                  </div>
                                </div>
                              </div>

                              <div class="new-button-group">
                                <div class="row new-button-row">
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-primary new-action-button"
                                      id="btn_add_department">Attendance</button>
                                  </div>
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-primary new-action-button"
                                      id="btn_add_department2">Leave</button>
                                  </div>
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-primary new-action-button"
                                      id="btn_add_department3">Perf Evaluation</button>
                                  </div>
                                </div>
                                <div class="row new-button-row">
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-primary new-action-button"
                                      id="btn_add_department4">Salary Advance</button>
                                  </div>
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-primary new-action-button"
                                      id="btn_add_department5">OT Approval</button>
                                  </div>
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-primary new-action-button"
                                      id="btn_add_department6">Staff Loans</button>
                                  </div>
                                </div>
                              </div>

                              <div class="new-divider"></div>

                              <div class="form-group new-form-group">
                                <div class="row new-duplicate-row">
                                  <div class="col-sm-8 new-select-col">
                                    <label for="select_existing_group" class="new-input-label">Select Existing
                                      Group</label>
                                    <select class="form-control new-select-control" id="select_existing_group">
                                      <option value="">-- Select Group --</option>
                                      <?php foreach ($data_grp as $group) { ?>
                                        <option value="<?= $group->Grp_ID ?>"><?= $group->EmpGroupName ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="col-sm-4 new-button-col">
                                    <button type="button" class="btn btn-info new-duplicate-button"
                                      id="btn_duplicate_group">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-copy" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                          d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                                      </svg>
                                      Duplicate Group
                                    </button>
                                  </div>
                                </div>
                              </div>


                              <div id="divmessage" class="new-message-container">
                                <div id="spnmessage" class="new-message-text"></div>
                              </div>

                              <!-- Authority Tables -->
                              <div class="new-authority-tables">
                                <!-- Table 1 - Attendance -->
                                <div class="col-md-12 new-table-container" id="departmentDiv1" style="display: none;">
                                  <h5 class="new-section-title">Authority Tables</h5>
                                  <div class="panel panel-info new-table-panel">
                                    <div class="panel-body panel-no-padding new-table-body">
                                      <span class="new-table-title">Attendance</span>
                                      <table class="table table-striped table-bordered new-data-table"
                                        id="departmentTable1" style="margin-top: 10px;">
                                        <thead class="new-table-header">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User Level Type</th>
                                            <th>Authority Type</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="sortableRows1" class="new-table-body"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="new-divider"></div>
                                </div>

                                <!-- Table 2 - Leave -->
                                <div class="col-md-12 new-table-container" id="departmentDiv2" style="display: none;">
                                  <div class="new-table-divider"></div>
                                  <div class="panel panel-info new-table-panel">
                                    <div class="panel-body panel-no-padding new-table-body">
                                      <span class="new-table-title">Leave</span>
                                      <table class="table table-striped table-bordered new-data-table"
                                        id="departmentTable2" style="margin-top: 10px;">
                                        <thead class="new-table-header">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User Level Type</th>
                                            <th>Authority Type</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="sortableRows2" class="new-table-body"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="new-divider"></div>
                                </div>


                                <!-- Table 3 - Performance Evaluation -->
                                <div class="col-md-12 new-table-container" id="departmentDiv3" style="display: none;">
                                  <div class="new-table-divider"></div>
                                  <div class="panel panel-info new-table-panel">
                                    <div class="panel-body panel-no-padding new-table-body">
                                      <span class="new-table-title">Perf Evaluation</span>
                                      <table class="table table-striped table-bordered new-data-table"
                                        id="departmentTable3" style="margin-top: 10px;">
                                        <thead class="new-table-header">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User Level Type</th>
                                            <th>Authority Type</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="sortableRows3" class="new-table-body"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="new-divider"></div>
                                </div>

                                <!-- Table 4 - Salary Advance -->
                                <div class="col-md-12 new-table-container" id="departmentDiv4" style="display: none;">
                                  <div class="new-table-divider"></div>
                                  <div class="panel panel-info new-table-panel">
                                    <div class="panel-body panel-no-padding new-table-body">
                                      <span class="new-table-title">Salary Advance</span>
                                      <table class="table table-striped table-bordered new-data-table"
                                        id="departmentTable4" style="margin-top: 10px;">
                                        <thead class="new-table-header">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User Level Type</th>
                                            <th>Authority Type</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="sortableRows4" class="new-table-body"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="new-divider"></div>
                                </div>

                                <!-- Table 5 - OT Approval -->
                                <div class="col-md-12 new-table-container" id="departmentDiv5" style="display: none;">
                                  <div class="new-table-divider"></div>
                                  <div class="panel panel-info new-table-panel">
                                    <div class="panel-body panel-no-padding new-table-body">
                                      <span class="new-table-title">OT Approval</span>
                                      <table class="table table-striped table-bordered new-data-table"
                                        id="departmentTable5" style="margin-top: 10px;">
                                        <thead class="new-table-header">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User Level Type</th>
                                            <th>Authority Type</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="sortableRows5" class="new-table-body"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="new-divider"></div>
                                </div>

                                <!-- Table 6 - Staff Loans -->
                                <div class="col-md-12 new-table-container" id="departmentDiv6" style="display: none;">
                                  <div class="new-table-divider"></div>
                                  <div class="panel panel-info new-table-panel">
                                    <div class="panel-body panel-no-padding new-table-body">
                                      <span class="new-table-title">Staff Loans</span>
                                      <table class="table table-striped table-bordered new-data-table"
                                        id="departmentTable6" style="margin-top: 10px;">
                                        <thead class="new-table-header">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User Level Type</th>
                                            <th>Authority Type</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="sortableRows6" class="new-table-body"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tab 2 - Grid View (Hidden) -->
                <div class="tab-pane new-tab-pane" id="tab2" style="display: none;">
                  <div class="row new-grid-row">
                    <div class="col-md-12 new-grid-col">
                      <div class="panel panel-primary new-grid-panel">
                        <div class="panel-heading new-grid-heading">
                          <h2 class="new-grid-title">USER LEVEL DETAILS</h2>
                        </div>
                        <div class="panel-body panel-no-padding new-grid-body">
                          <table id="example" class="table table-striped table-bordered new-grid-table" cellspacing="0"
                            width="100%">
                            <thead class="new-grid-header">
                              <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>OT MORNING</th>
                                <th>OT EVENING</th>
                                <th>LATE</th>
                                <th>EARLY DEPARTURE</th>
                                <th>GRACE PERIOD</th>
                                <th>SUPERVISOR NAME</th>
                                <th>GROUP ADMIN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                              </tr>
                            </thead>
                            <tbody class="new-grid-body">
                              <?php foreach ($data_set as $data) { ?>
                                <tr class="odd gradeX new-grid-row">
                                  <td><?php echo $data->Grp_ID; ?></td>
                                  <td><?php echo $data->EmpGroupName; ?></td>
                                  <td><?php echo $data->Ot_m; ?></td>
                                  <td><?php echo $data->Ot_e; ?></td>
                                  <td><?php echo $data->Late; ?></td>
                                  <td><?php echo $data->Ed; ?></td>
                                  <td><?php echo $data->late_Grs_prd; ?></td>
                                  <td><?php echo $data->Sup_Name; ?></td>
                                  <td><?php echo $data->Admin_Name; ?></td>
                                  <td>
                                    <?php $url = base_url() . "Master/Employee_Groups/updateAttView?id=$data->Grp_ID"; ?>
                                    <a class="btn btn-green new-edit-button" href="<?php echo $url; ?>" title="EDIT">
                                      <i class="fa fa-edit new-edit-icon"></i>
                                    </a>
                                  </td>
                                  <td>
                                    <button class="btn btn-danger new-delete-button" data-toggle="modal"
                                      href="javascript:void()" title="DELETE"
                                      onclick="delete_id(<?php echo $data->Grp_ID ?>)">
                                      <i class="fa fa-times-circle new-delete-icon"></i>
                                    </button>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--Footer-->
          <?php $this->load->view('template/footer.php'); ?>
          <!--End Footer-->
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('template/js.php'); ?> <!-- Initialize scripts for this page-->

  <script>
    $("#success_message_my").hide("bounce", 2000, 'fast');
    $("#submit").click(function () {
      $('#search_body').html('<center><p><img style="width: 50;height: 50;" src="<?php echo base_url(); ?>assets/images/processing.gif" /></p><center>');

    });
    $(document).ready(function () {
      $('#cmb_emp_status').change(function () {
        if ($(this).val() == '1') {
          $('#group_admin_section').show();
        } else {
          $('#group_admin_section').hide();
        }
      });
    });

    function delete_id(id) {
      swal({ title: "Are you sure?", text: "You will not be able to recover this data!", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Yes, Delete This!", cancelButtonText: "No, Cancel This!", closeOnConfirm: false, closeOnCancel: false },
        function (isConfirm) {
          if (isConfirm) {

            $.ajax({
              url: baseurl + "index.php/Master/Employee_Groups/ajax_delete/" + id,
              type: "POST",
              dataType: "JSON",
              success: function (data) {

                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
              }

            });


            swal("Deleted!", "Selected data has been deleted.", "success");


            $(document).ready(function () {
              setTimeout(function () {
                window.location.replace(baseurl + "Master/Employee_Groups/");
              }, 1000);
            });


          } else {
            swal("Cancelled", "Selected data Cancelled", "error");

          }

        });


    }
  </script>
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
          cell5.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)" style="width: 100%;border-radius: 10px; height:40px; margin-top:4px">Remove</button>';

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

    // Submit departments
    document.getElementById("submit_departments").addEventListener("click", function (e) {
      e.preventDefault();

      // Collect top-level input values
      var groupName = document.getElementById("txt_group_name").value.trim();
      var departmentSelect = document.getElementById("department_select").value;

      if (!groupName || departmentSelect === "") {
        alert("Please enter Group Name and select a Department.");
        return;
      }

      // Collect settings (checkboxes)
      var settings = {
        ot_morning: document.getElementById("chk_1st_morning").checked,
        ot_evening: document.getElementById("chk_1st_evening").checked,
        late_deduction: document.getElementById("chk_late").checked,
        early_departure: document.getElementById("chk_ed").checked,
        late_deduct_ot: document.getElementById("chk_late_ot").checked,
        dot_holiday: document.getElementById("chk_dot_holiday").checked,
        dot_offday: document.getElementById("chk_dot_offday").checked,
        sh_leave: document.getElementById("chk_sh_lv").checked,
        round: document.getElementById("round").value,
        late_gp: document.getElementById("late_gp").value,
        min_t_ot: document.getElementById("min_t_ot").value,
        min_t_e_ot: document.getElementById("min_t_e_ot").value,
      };

      // Collect departments from all 6 tables
      var departments = [];

      for (let i = 1; i <= 6; i++) {
        var tableLabel = $("#departmentDiv" + i + " span").text().trim(); // Move this line here

        $("#sortableRows" + i + " tr").each(function () {
          var departmentId = $(this).find("td:nth-child(1)").text().trim();
          var departmentName = $(this).find("td:nth-child(2)").text().trim();
          var selectedValue = $(this).find("td:nth-child(3) select").val();
          var AuthorityValue = $(this).find("td:nth-child(4) select").val();

          if (!departmentId || !departmentName) {
            alert("Please fill all fields in table " + i + " before submitting.");
            return false; // break from .each
          }

          departments.push({
            id: departmentId,
            name: departmentName,
            selected: selectedValue,
            Authority: AuthorityValue,
            button_name: tableLabel // ← Add the button label to the payload
          });
        });
      }

      if (departments.length === 0) {
        alert("No departments to submit.");
        return;
      }

      const payload = {
        group_name: groupName,
        department_id: departmentSelect,
        settings: settings,
        departments: departments
      };

      console.log("Submitting payload:", payload); // For debugging

      // Show and animate progress bar with "Uploading" text
      $("#uploadProgressBar").show();
      $("#uploadProgressBar").prepend("<p id='uploadingText'>Uploading</p>");

      let progress = 0;
      let interval = setInterval(() => {
        if (progress < 100) {
          progress += 1;
          $("#uploadBar").css("width", progress + "%").text(progress + "%");
        } else {
          clearInterval(interval);

          // Wait 3 seconds after reaching 100%
          setTimeout(() => {
            // AJAX submission
            $.ajax({
              url: "<?php echo base_url(); ?>Master/Emp_Attendance/insert_data",
              type: "POST",
              contentType: "application/json",
              data: JSON.stringify(payload),
              dataType: "json",
              success: function (response) {
                $("#uploadBar").css("width", "100%").text("100%");

                setTimeout(() => {
                  $("#uploadProgressBar").fadeOut(() => {
                    $("#uploadBar").css("width", "0%").text("0%");
                    $("#uploadingText").remove(); // remove "Uploading" text
                  });
                }, 1000);

                console.log("Success:", response);
                alert("Group and departments submitted successfully!");
                window.location.reload(); // Reload the page to see changes
              },
              error: function (xhr, status, error) {
                $("#uploadBar").css("width", "100%").css("background-color", "red").text("Failed");

                setTimeout(() => {
                  $("#uploadProgressBar").fadeOut(() => {
                    $("#uploadBar").css("width", "0%").css("background-color", "#4caf50").text("0%");
                    $("#uploadingText").remove(); // remove "Uploading" text
                  });
                }, 1500);

                console.error("Error:", error);
                console.error("Response:", xhr.responseText);
                alert("An error occurred while submitting.");
              }
            });
          }, 1000); // ⏳ Delay of 1 seconds after reaching 100%
        }
      }, 1.5); // 100 * 100 = 10,000 ms = 10 seconds
    });


    // dublicate row function
    document.getElementById("btn_duplicate_group").addEventListener("click", function () {
      var groupId = document.getElementById("select_existing_group").value;

      if (!groupId) {
        alert("Please select a group to duplicate.");
        return;
      }

      $.ajax({
        url: "<?php echo base_url(); ?>Master/Emp_Attendance/get_group_data",
        type: "POST",
        data: { group_id: groupId },
        dataType: "json",
        success: function (response) {
          if (response.success) {
            const tables = response.tables;

            for (let i = 1; i <= 6; i++) {
              let tbody = $("#sortableRows" + i);
              tbody.empty();

              if (tables[i]) {
                tables[i].forEach((row, index) => {
                  let html = `
                                <tr data-id="${row.id}">
                                    <td>${index + 1}</td>
                                    <td>${row.emp_no}</td>
                                    <td>
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
                                    </td>
                                    <td>
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
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" onclick="removeRow(this)" style="width: 100%; border-radius: 10px; height:40px; margin-top:4px">Remove</button>
                                    </td>
                                </tr>
                            `;
                  tbody.append(html);
                });

                $("#departmentDiv" + i).show();
              } else {
                $("#departmentDiv" + i).hide();
              }
            }
          } else {
            alert("No data found for this group.");
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", error);
          alert("An error occurred while loading the group.");
        }
      });
    });


  </script>

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

  <style>
    .ui-state-highlight {
      height: 40px;
      background-color: #d9edf7;
      border: 1px dashed #31708f;
    }
  </style>
</body>

</html>