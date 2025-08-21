<!DOCTYPE html>


<!--Description of dashboard page

@author VFT Software Team-->


<html lang="en">


<head>
    <!-- Styles -->
    <?php $this->load->view('template/css.php'); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
        
        #departmentDiv1 {
            /* width: 50%; */
            margin-top: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 10px 20px 40px rgb(185 185 185 / 29%);;
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* #departmentDiv1:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        } */

        /* .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            color: #2d3748;
        } */

        .table thead {
            background: linear-gradient(60deg, rgba(59, 105, 129, 1) 0%, rgba(54, 120, 150, 0.644782913165266) 100%);
            position: relative;
            border-radius: 30px;
        }

        .table thead::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        }

        .table th {
            padding: 20px 24px;
            text-align: left;
            font-weight: 600;
            color: white;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
        }

        .table th:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%;
            height: 50%;
            width: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .table tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.05), rgba(124, 58, 237, 0.05));
            transform: scale(1.01);
        } */

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table td {
            padding: 18px 24px;
            font-weight: 500;
            position: relative;
        }

        .table td:first-child {
            font-weight: 600;
            color: #4f46e5;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #departmentDiv1 {
                width: 90%;
                border-radius: 15px;
                margin: 10px auto;
            }
            
            .table th,
            .table td {
                padding: 12px 16px;
                font-size: 12px;
            }
        }

        /* Loading animation for dynamic content */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .loading-row {
            animation: pulse 1.5s ease-in-out infinite;
        }

        /* Modern scrollbar */
        #departmentDiv1::-webkit-scrollbar {
            width: 6px;
        }

        #departmentDiv1::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }

        #departmentDiv1::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 3px;
        }

        /* Demo styles for visibility */
        .demo-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .demo-row {
            animation: slideInUp 0.5s ease-out forwards;
            opacity: 0;
        }

        .demo-row:nth-child(1) { animation-delay: 0.1s; }
        .demo-row:nth-child(2) { animation-delay: 0.2s; }
        .demo-row:nth-child(3) { animation-delay: 0.3s; }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .action-btn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
        }
    </style>
     <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --success-color: #10b981;
            --border-radius: 12px;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            overflow: hidden;
        }
        
        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .modal-footer {
            border-top: none;
            padding: 1.5rem;
            background: #f9fafb;
        }
        
        .step {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }
        
        .step.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .progress-container {
            margin-bottom: 2rem;
        }
        
        .progress {
            height: 6px;
            border-radius: 3px;
            background-color: #e5e7eb;
        }
        
        .progress-bar {
            background-color: var(--primary-color);
            transition: var(--transition);
        }
        
        .step-header {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.1rem;
        }
        
        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0;
            color: #111827;
        }
        
        .form-control, .form-select {
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        
        .btn {
            border-radius: var(--border-radius);
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-success:hover {
            background-color: #0d9e6e;
            border-color: #0d9e6e;
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background-color: #f3f4f6;
            border-color: #f3f4f6;
            color: #4b5563;
        }
        
        .btn-secondary:hover {
            background-color: #e5e7eb;
            border-color: #e5e7eb;
            color: #1f2937;
        }
        
        .review-card {
            border-radius: var(--border-radius);
            border: 1px solid #e5e7eb;
            margin-bottom: 1rem;
            transition: var(--transition);
        }
        
        .review-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--box-shadow);
        }
        
        .review-card .card-body {
            padding: 1.5rem;
        }
        
        .review-card h5 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .floating-label input, .floating-label select {
            height: 50px;
            padding-top: 1.2rem;
        }
        
        .floating-label label {
            position: absolute;
            top: 15px;
            left: 15px;
            color: #6b7280;
            transition: var(--transition);
            pointer-events: none;
        }
        
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label,
        .floating-label select:focus + label,
        .floating-label select:not([value=""]) + label {
            top: 5px;
            left: 15px;
            font-size: 0.75rem;
            color: var(--primary-color);
        }
        
        .checkbox-card {
            border-radius: var(--border-radius);
            border: 1px solid #e5e7eb;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .checkbox-card:hover {
            border-color: var(--primary-color);
        }
        
        .checkbox-card.selected {
            border-color: var(--primary-color);
            background-color: rgba(99, 102, 241, 0.05);
        }
        
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.2em;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
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

            <div class="static-content-wrapper">
                <div class="static-content">
                    <div class="page-content">
                        <ol class="breadcrumb">

                            <li class=""><a href="index.html">HOME</a></li>
                            <li class="active"><a href="index.html">EMPLOYEE GROUPS</a></li>

                        </ol>


                        <div class="page-tabs">
                            <ul class="nav nav-tabs">

                                <li class="active"><a data-toggle="tab" href="#tab1">EMPLOYEE GROUPS</a></li>
                                <li><a data-toggle="tab" href="#tab2">VIEW EMPLOYEE GROUPS</a></li>


                            </ul>
                        </div>
                        <div class="container-fluid">


                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">

                                    <div class="row">
                                        <div class="col-xs-12">


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h2>ADD EMPLOYEE GROUPS</h2>
                                                        </div>
                                                        <div class="panel-body">
                                                            <form class="form-horizontal" id="frm_emp_group"
                                                                name="frm_emp_group"
                                                                action="<?php echo base_url(); ?>Master/Employee_Groups/insert_Data"
                                                                method="POST">
                                                                <!--success Message-->
                                                                <?php if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != '') { ?>
                                                                    <div id="spnmessage"
                                                                        class="alert alert-dismissable alert-success success_redirect">
                                                                        <strong>Success !</strong>
                                                                        <?php echo $_SESSION['success_message'] ?>
                                                                    </div>
                                                                <?php } ?>

                                                                <!--Error Message-->
                                                                <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != '') { ?>
                                                                    <div id="spnmessage"
                                                                        class="alert alert-dismissable alert-danger error_redirect">
                                                                        <strong>Error !</strong>
                                                                        <?php echo $_SESSION['error_message'] ?>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="form-group col-sm-12">
                                                                    <div class="col-sm-8">
                                                                        <img class="imagecss"
                                                                            src="<?php echo base_url(); ?>assets/images/employee_group.png">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">

                                                                    <div class="form-group col-sm-5">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Group
                                                                            Name</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_group_name"
                                                                                name="txt_group_name"
                                                                                placeholder="Ex: Office">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-5">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Group
                                                                            Supervisor</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                name="txt_supervisor_search"
                                                                                id="txt_supervisor_search"
                                                                                placeholder="Search by ID or Name">
                                                                            <input type="hidden" name="cmb_Supervisor"
                                                                                id="cmb_Supervisor">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-2">
                                                                        <button type="button"
                                                                            class="btn btn-success col-2"
                                                                            id="btn_add_department">Add</button>
                                                                    </div>


                                                                </div>
                                                                <!-- Table to display added departments and percentages -->
                                                                <!-- Table -->
                                                                <div class="form-group col-md-12" >
                                                                    <div class="form-group col-sm-2">
                                                                        
                                                                    </div>
                                                                    <div class="form-group col-sm-8" id="departmentDiv1" style="display: none;">
                                                                        <table class="table" id="departmentTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Name</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="sortableRows">
                                                                            <!-- Rows dynamically added -->
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <!-- Modal -->
<div class="modal fade" id="setupModal" tabindex="-1" aria-labelledby="setupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-magic me-2"></i> Setup Wizard</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2">
                        <small>Step <span id="current-step">1</span> of <span id="total-steps">4</span></small>
                        <small><span id="progress-percent">25</span>% Complete</small>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%;"></div>
                    </div>
                </div>
                
                <!-- Form Steps -->
                <form id="setupForm">
                    <!-- Step 1 -->
                    <div class="step active" id="step1">
                        <div class="step-header">
                            <div class="step-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <h4 class="step-title">Personal Information</h4>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="floating-label">
                                    <input type="text" class="form-control" id="firstName" placeholder=" " required>
                                    <label for="firstName">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="floating-label">
                                    <input type="text" class="form-control" id="lastName" placeholder=" " required>
                                    <label for="lastName">Last Name</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="floating-label">
                            <input type="email" class="form-control" id="email" placeholder=" " required>
                            <label for="email">Email Address</label>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="step" id="step2">
                        <div class="step-header">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h4 class="step-title">Account Security</h4>
                        </div>
                        
                        <div class="floating-label">
                            <input type="text" class="form-control" id="username" placeholder=" " required>
                            <label for="username">Choose Username</label>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="floating-label">
                                    <input type="password" class="form-control" id="password" placeholder=" " required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-text">Minimum 8 characters</div>
                            </div>
                            <div class="col-md-6">
                                <div class="floating-label">
                                    <input type="password" class="form-control" id="confirmPassword" placeholder=" " required>
                                    <label for="confirmPassword">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="step" id="step3">
                        <div class="step-header">
                            <div class="step-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <h4 class="step-title">Preferences</h4>
                        </div>
                        
                        <h6 class="mb-3 text-muted">Notification Settings</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkbox-card" onclick="toggleCheckbox('emailNotifications')">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="emailNotifications">
                                        <label class="form-check-label" for="emailNotifications">
                                            <strong>Email Notifications</strong>
                                            <p class="text-muted small mb-0">Receive important updates via email</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox-card" onclick="toggleCheckbox('pushNotifications')">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pushNotifications">
                                        <label class="form-check-label" for="pushNotifications">
                                            <strong>Push Notifications</strong>
                                            <p class="text-muted small mb-0">Get real-time alerts on your device</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="floating-label mt-3">
                            <select class="form-select" id="theme" required>
                                <option value="" selected disabled></option>
                                <option value="light">Light Theme</option>
                                <option value="dark">Dark Theme</option>
                                <option value="system">System Default</option>
                            </select>
                            <label for="theme">Theme Preference</label>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="step" id="step4">
                        <div class="step-header">
                            <div class="step-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h4 class="step-title">Review & Submit</h4>
                        </div>
                        
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i> Almost done! Please review your information before submitting.
                        </div>
                        
                        <div class="review-card">
                            <div class="card-body">
                                <h5><i class="fas fa-user-circle me-2"></i> Personal Information</h5>
                                <p id="review-name" class="mb-1"><strong>Name:</strong> <span class="text-muted">Loading...</span></p>
                                <p id="review-email"><strong>Email:</strong> <span class="text-muted">Loading...</span></p>
                            </div>
                        </div>
                        
                        <div class="review-card">
                            <div class="card-body">
                                <h5><i class="fas fa-shield-alt me-2"></i> Account Details</h5>
                                <p id="review-username"><strong>Username:</strong> <span class="text-muted">Loading...</span></p>
                            </div>
                        </div>
                        
                        <div class="review-card">
                            <div class="card-body">
                                <h5><i class="fas fa-sliders-h me-2"></i> Preferences</h5>
                                <p id="review-notifications" class="mb-1"><strong>Notifications:</strong> <span class="text-muted">Loading...</span></p>
                                <p id="review-theme"><strong>Theme:</strong> <span class="text-muted">Loading...</span></p>
                            </div>
                        </div>
                        
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                            <label class="form-check-label" for="termsAgreement">
                                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Cancel
                </button>
                <button type="button" class="btn btn-outline-secondary" id="prevBtn" disabled>
                    <i class="fas fa-arrow-left me-1"></i> Previous
                </button>
                <button type="button" class="btn btn-primary" id="nextBtn">
                    Next <i class="fas fa-arrow-right ms-1"></i>
                </button>
                <button type="button" class="btn btn-success" id="submitBtn" style="display: none;">
                    <i class="fas fa-paper-plane me-1"></i> Submit
                </button>
            </div>
        </div>
    </div>
</div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Allow
                                                                            Admin</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_emp_status"
                                                                                name="cmb_emp_status">
                                                                                <option value="0" selected>Deny</option>
                                                                                <option value="1">Allow</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-6"
                                                                        id="group_admin_section" style="display: none;">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Group
                                                                            Admin</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                name="txt_admin_search"
                                                                                id="txt_admin_search"
                                                                                placeholder="Search by ID or Name">
                                                                            <input type="hidden" name="cmb_Admin"
                                                                                id="cmb_Admin">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <!-- <div class="form-group row col-md-12 justify-content-end">
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Group
                                                                            Admin</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                name="txt_admin_search"
                                                                                id="txt_admin_search"
                                                                                placeholder="Search by ID or Name">
                                                                            <input type="hidden" name="cmb_Admin"
                                                                                id="cmb_Admin">
                                                                        </div>

                                                                    </div>
                                                                </div> -->


                                                                <div class="form-group col-md-12">
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">OT
                                                                            Morning</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="ot_m"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">OT
                                                                            Evening</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="ot_e"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Min Time to
                                                                            Morning OT</label>
                                                                        <div class="col-sm-2">
                                                                            <input type="number" class="form-control"
                                                                                id="txt_max_l_size" name="min_t_ot"
                                                                                placeholder="Ex: 120">
                                                                        </div>
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Min Time to
                                                                            Evening OT</label>
                                                                        <div class="col-sm-2">
                                                                            <input type="number" class="form-control"
                                                                                id="txt_max_l_size" name="min_t_e_ot"
                                                                                placeholder="Ex: 120">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Late</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="late"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">ED</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox" name="ed"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-5 control-label">Late decuct
                                                                            for Leave in Half Day</label>
                                                                        <div class="col-sm-1 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="sh_lv"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Late deduct
                                                                            from OT</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="late_ot"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Double OT for
                                                                            Holiday</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="dot_holyday"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Double OT for
                                                                            OFF Day</label>
                                                                        <div class="col-sm-2 icheck-flat">
                                                                            <div class="checkbox green icheck">
                                                                                <label><input type="checkbox"
                                                                                        name="dot_offday"
                                                                                        id="chk_1st"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Round
                                                                            Up</label>
                                                                        <div class="col-sm-2">
                                                                            <input type="number" class="form-control"
                                                                                id="txt_max_l_size" name="round"
                                                                                placeholder="Ex: 120">
                                                                        </div>
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Late Grace
                                                                            Period</label>
                                                                        <div class="col-sm-2">
                                                                            <input type="number" class="form-control"
                                                                                id="late_gp" name="late_gp"
                                                                                placeholder="Ex: 120">
                                                                        </div>

                                                                    </div>

                                                                </div>




                                                                <!--submit button-->
                                                                <?php $this->load->view('template/btn_submit.php'); ?>
                                                                <!--end submit-->

<!-- Trigger Button -->
<button type="button" class="btn btn-primary btn-lg mx-auto d-block mt-5" data-bs-toggle="modal" data-bs-target="#setupModal">
    <i class="fas fa-rocket me-2"></i> Launch Setup
</button>
                                                            </form>
                                                            <hr>


                                                            <div id="divmessage" class="">

                                                                <div id="spnmessage"> </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <!--***************************-->
                                <!-- Grid View -->

                                <div class="tab-pane" id="tab2">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h2>USER LEVEL DETAILS</h2>
                                                            <div class="panel-ctrls">
                                                            </div>
                                                        </div>
                                                        <div class="panel-body panel-no-padding">
                                                            <table id="example"
                                                                class="table table-striped table-bordered"
                                                                cellspacing="0" width="100%">
                                                                <thead>
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
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($data_set as $data) {
                                                                        ?>
                                                                        <tr class='odd gradeX'>
                                                                            <td width='100'><?php echo $data->Grp_ID; ?>
                                                                            </td>
                                                                            <td width='100'>
                                                                                <?php echo $data->EmpGroupName; ?>
                                                                            </td>
                                                                            <td width='50'><?php echo $data->Ot_m; ?></td>
                                                                            <td width='50'><?php echo $data->Ot_e; ?></td>
                                                                            <td width='100'><?php echo $data->Late; ?></td>
                                                                            <td width='50'><?php echo $data->Ed; ?></td>
                                                                            <td width='50'>
                                                                                <?php echo $data->late_Grs_prd; ?>
                                                                            </td>
                                                                            <td width='200'><?php echo $data->Sup_Name; ?>
                                                                            </td>
                                                                            <td width='200'><?php echo $data->Admin_Name; ?>
                                                                            </td>
                                                                            <td width='15'>
                                                                                <?php $url = base_url() . "Master/Employee_Groups/updateAttView?id=$data->Grp_ID"; ?>
                                                                                <a class="edit_data btn btn-green"
                                                                                    href="<?php echo $url; ?>" title="EDIT">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                            </td>
                                                                            <td width='15'>
                                                                                <button class='action_comp btn btn-danger'
                                                                                    data-toggle='modal'
                                                                                    href='javascript:void()' title='DELETE'
                                                                                    onclick='delete_id(<?php echo $data->Grp_ID ?>)'>
                                                                                    <i class='fa fa-times-circle'></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <div class="panel-footer"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- End Grid View -->
                                <!--***************************-->

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                                <h2 class="modal-title">DESIGNATION</h2>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal"
                                                    action="<?php echo base_url(); ?>Master/Designation/edit"
                                                    method="post">
                                                    <div class="form-group col-sm-12">
                                                        <label for="focusedinput"
                                                            class="col-sm-4 control-label">ID</label>
                                                        <div class="col-sm-8">
                                                            <input value="<?php echo $data->Des_ID; ?>" type="text"
                                                                class="form-control" readonly="readonly" name="id"
                                                                id="id" class="m-wrap span3">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="focusedinput"
                                                            class="col-sm-4 control-label">DEPARTMENT</label>
                                                        <div class="col-sm-8">
                                                            <input value="<?php echo $data->Desig_Name; ?>" type="text"
                                                                name="Desig_Name" id="Desig_Name"
                                                                class="form-control m-wrap span6"><br>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="focusedinput"
                                                            class="col-sm-4 control-label">ORDER</label>
                                                        <div class="col-sm-8">
                                                            <input value="<?php echo $data->Desig_Order; ?>" type="text"
                                                                name="Desig_Order" id="Desig_Order"
                                                                class="form-control m-wrap span6"><br>
                                                        </div>
                                                    </div>


                                            </div>

                                            <br>
                                            <!--<input class="btn green" type="submit" value="submit" id="submit">-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                            </form>
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->








                            </div>

                        </div> <!-- .container-fluid -->
                    </div>

                    <!--Footer-->
                    <?php $this->load->view('template/footer.php'); ?>
                    <!--End Footer-->

                </div>
            </div>
        </div>




        <!-- Load site level scripts -->

        <?php $this->load->view('template/js.php'); ?> <!-- Initialize scripts for this page-->

        <!-- End loading page level scripts-->

        <!--Ajax-->
        <!-- <script src="<?php echo base_url(); ?>system_js/Master/Emp_Group.js"></script> -->

</body>

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


    $(function () {
        // Autocomplete
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

        // Make rows sortable
        $("#sortableRows").sortable({
            placeholder: "ui-state-highlight"
        }).disableSelection();
    });
    $(function () {
        $("#txt_admin_search").autocomplete({
            source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_emp_no_and_name",
            minLength: 1,
            select: function (event, ui) {
                $("#cmb_Admin").val(ui.item.value);
                $("#txt_admin_search").val(ui.item.value + ' - ' + ui.item.label);
                return false;
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<div>" + item.value + " - " + item.label + "</div>")
                .appendTo(ul);
        };
    });

    // $(function () {
    //             $("#txt_emp_name").autocomplete({
    //                 source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_auto_emp_name" // path to the get_birds method
    //             });
    //         });

    //         $(function () {
    //             $("#txt_emp").autocomplete({
    //                 source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_auto_emp_no" // path to the get_birds method
    //             });
    //         });
    function updateRowNumbers() {
        const rows = document.querySelectorAll("#sortableRows tr");
        rows.forEach((row, index) => {
            row.querySelector("td").textContent = index + 1;
        });
    }

    // Add department row
    document.getElementById("btn_add_department").addEventListener("click", function () {
        var departmentInput = document.getElementById("txt_supervisor_search");
        var departmentId = document.getElementById("cmb_Supervisor").value;
        var departmentName = departmentInput.value;

        if (departmentName !== "" && departmentId !== "") {

              // ✅ Check for duplicates
            var exists = false;
            $("#sortableRows tr").each(function () {
                if ($(this).attr("data-id") === departmentId) {
                    exists = true;
                    return false; // exit loop
                }
            });

            if (exists) {
                alert("This department has already been added.");
                return;
            }
            var tableBody = document.getElementById("departmentTable").getElementsByTagName('tbody')[0];

            var newRow = tableBody.insertRow();
            newRow.setAttribute("data-id", departmentId);
            newRow.classList.add("draggable");

            var cell1 = newRow.insertCell(0); // No.
            var cell2 = newRow.insertCell(1); // Department name
            var cell3 = newRow.insertCell(2); // Remove button

            cell1.textContent = ""; // Will be set by updateRowNumbers
            cell2.textContent = departmentName;
            cell3.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>';

            departmentInput.value = "";
            document.getElementById("cmb_Supervisor").value = "";

            document.getElementById("departmentDiv1").style.display = "block";

            updateRowNumbers();
        } else {
            alert("Please select a valid supervisor.");
        }
    });

    // Remove row
    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        if (document.querySelectorAll("#sortableRows tr").length === 0) {
            document.getElementById("departmentDiv1").style.display = "none";
        }

        updateRowNumbers();
    }

    // Update on drag-and-drop
    $(function () {
        $("#sortableRows").sortable({
            placeholder: "ui-state-highlight",
            update: function () {
                updateRowNumbers();
            }
        }).disableSelection();
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

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = new bootstrap.Modal(document.getElementById('setupModal'));
        const steps = document.querySelectorAll('.step');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.querySelector('.progress-bar');
        const currentStepDisplay = document.getElementById('current-step');
        const totalStepsDisplay = document.getElementById('total-steps');
        const progressPercentDisplay = document.getElementById('progress-percent');
        let currentStep = 0;
        
        // Initialize the form
        totalStepsDisplay.textContent = steps.length;
        showStep(currentStep);
        
        // Next button click handler
        nextBtn.addEventListener('click', function() {
            if (currentStep < steps.length - 1) {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                    updateProgress();
                }
            }
        });
        
        // Previous button click handler
        prevBtn.addEventListener('click', function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
                updateProgress();
            }
        });
        
        // Submit button click handler
        submitBtn.addEventListener('click', function() {
            if (validateStep(currentStep)) {
                updateReviewSection();
                
                // Simulate form submission
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...';
                submitBtn.disabled = true;
                
                setTimeout(function() {
                    // In a real app, you would submit the form here
                    alert('Setup completed successfully!');
                    modal.hide();
                    resetForm();
                }, 1500);
            }
        });
        
        // Show the current step with animation
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                if (index === stepIndex) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });
            
            // Update button visibility
            prevBtn.disabled = stepIndex === 0;
            nextBtn.style.display = stepIndex === steps.length - 1 ? 'none' : 'inline-block';
            submitBtn.style.display = stepIndex === steps.length - 1 ? 'inline-block' : 'none';
            currentStepDisplay.textContent = stepIndex + 1;
        }
        
        // Validate the current step
        function validateStep(stepIndex) {
            let isValid = true;
            const currentStepEl = steps[stepIndex];
            
            // Validate required fields
            const requiredFields = currentStepEl.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                    
                    // Add error message if not already present
                    if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('invalid-feedback')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'invalid-feedback';
                        errorDiv.textContent = 'This field is required';
                        field.parentNode.insertBefore(errorDiv, field.nextSibling);
                    }
                } else {
                    field.classList.remove('is-invalid');
                    const errorMsg = field.nextElementSibling;
                    if (errorMsg && errorMsg.classList.contains('invalid-feedback')) {
                        errorMsg.remove();
                    }
                }
            });
            
            // Special validation for passwords
            if (stepIndex === 1) {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;
                
                if (password.length < 8) {
                    document.getElementById('password').classList.add('is-invalid');
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    errorDiv.textContent = 'Password must be at least 8 characters';
                    document.getElementById('password').parentNode.insertBefore(errorDiv, document.getElementById('password').nextSibling);
                    isValid = false;
                }
                
                if (password !== confirmPassword) {
                    document.getElementById('confirmPassword').classList.add('is-invalid');
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    errorDiv.textContent = 'Passwords do not match';
                    document.getElementById('confirmPassword').parentNode.insertBefore(errorDiv, document.getElementById('confirmPassword').nextSibling);
                    isValid = false;
                }
            }
            
            // Special validation for terms agreement
            if (stepIndex === 3 && !document.getElementById('termsAgreement').checked) {
                document.getElementById('termsAgreement').classList.add('is-invalid');
                isValid = false;
            }
            
            return isValid;
        }
        
        // Update progress indicators
        function updateProgress() {
            const progress = ((currentStep + 1) / steps.length) * 100;
            progressBar.style.width = `${progress}%`;
            progressPercentDisplay.textContent = Math.round(progress);
        }
        
        // Update the review section
        function updateReviewSection() {
            document.getElementById('review-name').innerHTML = 
                `<strong>Name:</strong> <span class="text-muted">${document.getElementById('firstName').value} ${document.getElementById('lastName').value}</span>`;
            document.getElementById('review-email').innerHTML = 
                `<strong>Email:</strong> <span class="text-muted">${document.getElementById('email').value}</span>`;
            document.getElementById('review-username').innerHTML = 
                `<strong>Username:</strong> <span class="text-muted">${document.getElementById('username').value}</span>`;
                
            const notifications = [];
            if (document.getElementById('emailNotifications').checked) notifications.push('Email');
            if (document.getElementById('pushNotifications').checked) notifications.push('Push');
            
            document.getElementById('review-notifications').innerHTML = 
                `<strong>Notifications:</strong> <span class="text-muted">${notifications.join(', ') || 'None'}</span>`;
            document.getElementById('review-theme').innerHTML = 
                `<strong>Theme:</strong> <span class="text-muted">${document.getElementById('theme').options[document.getElementById('theme').selectedIndex].text}</span>`;
        }
        
        // Reset the form
        function resetForm() {
            document.getElementById('setupForm').reset();
            currentStep = 0;
            showStep(currentStep);
            updateProgress();
            submitBtn.innerHTML = '<i class="fas fa-paper-plane me-1"></i> Submit';
            submitBtn.disabled = false;
        }
    });
    
    // Helper function for checkbox cards
    function toggleCheckbox(id) {
        const checkbox = document.getElementById(id);
        checkbox.checked = !checkbox.checked;
        const card = checkbox.closest('.checkbox-card');
        if (checkbox.checked) {
            card.classList.add('selected');
        } else {
            card.classList.remove('selected');
        }
    }
</script>

</html>