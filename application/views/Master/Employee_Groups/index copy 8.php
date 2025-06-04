<!DOCTYPE html>


<html lang="en">


<head>
    <!-- Styles -->
    <?php $this->load->view('template/css.php'); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <style>
        #departmentDiv1 {
            /* width: 50%; */
            margin-top: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 10px 20px 40px rgb(185 185 185 / 29%);
            ;
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
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

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
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

        .demo-row:nth-child(1) {
            animation-delay: 0.1s;
        }

        .demo-row:nth-child(2) {
            animation-delay: 0.2s;
        }

        .demo-row:nth-child(3) {
            animation-delay: 0.3s;
        }

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

    <style>
        /* * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        } */

        .new-trigger-btn {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .new-trigger-btn:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .new-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .new-modal-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .new-modal-container {
            background-color: white;
            border-radius: 12px;
            width: 90%;
            /* max-width: 600px; */
            max-height: 110vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .new-modal-overlay.active .new-modal-container {
            transform: translateY(0);
        }

        .new-modal-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .new-modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
        }

        .new-close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s ease;
        }

        .new-close-btn:hover {
            color: #111827;
        }

        .new-modal-body {
            padding: 20px;
        }

        .new-progress-container {
            margin-bottom: 24px;
        }

        .new-progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .new-progress-bar {
            height: 6px;
            background-color: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }

        .new-progress-fill {
            height: 100%;
            background-color: #4f46e5;
            width: 25%;
            transition: width 0.4s ease;
        }

        .new-step {
            display: none;
            animation: fadeIn 0.4s ease-out;
        }

        .new-step.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .new-step-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #111827;
        }

        .new-form-group {
            margin-bottom: 20px;
        }

        .new-form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }

        .new-form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .new-form-control:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .new-form-row {
            display: flex;
            gap: 16px;
        }

        .new-form-row .new-form-group {
            flex: 1;
        }

        .new-checkbox-group {
            margin-bottom: 16px;
        }

        .new-checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .new-custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .new-checkbox-input:checked+.new-custom-checkbox {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .new-checkbox-input:checked+.new-custom-checkbox::after {
            content: '✓';
            color: white;
            font-size: 12px;
        }

        .new-checkbox-text {
            font-size: 14px;
        }

        .new-checkbox-text strong {
            font-weight: 600;
            color: #111827;
        }

        .new-checkbox-description {
            font-size: 13px;
            color: #6b7280;
            margin-left: 30px;
            margin-top: 4px;
        }

        .new-review-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .new-review-card h5 {
            font-size: 16px;
            color: #4f46e5;
            margin-bottom: 12px;
        }

        .new-review-item {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .new-review-item strong {
            color: #374151;
        }

        .new-review-item span {
            color: #6b7280;
        }

        .new-modal-footer {
            padding: 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
        }

        .new-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .new-btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            border: none;
        }

        .new-btn-secondary:hover {
            background-color: #e5e7eb;
        }

        .new-btn-primary {
            background-color: #4f46e5;
            color: white;
            border: none;
        }

        .new-btn-primary:hover {
            background-color: #4338ca;
        }

        .new-btn-success {
            background-color: #10b981;
            color: white;
            border: none;
        }

        .new-btn-success:hover {
            background-color: #0d9e6e;
        }

        .new-error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .new-form-control.error {
            border-color: #ef4444;
        }

        .new-terms-agreement {
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .new-form-row {
                flex-direction: column;
                gap: 0;
            }
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




                                                                <div class="new-modal-overlay" id="modalOverlay">
                                                                    <div class="new-modal-container">
                                                                        <div class="new-modal-header">
                                                                            <h2 class="new-modal-title">Setup Wizard
                                                                            </h2>
                                                                            <button class="new-close-btn"
                                                                                id="closeBtn">&times;</button>
                                                                        </div>
                                                                        <div class="new-modal-body">
                                                                            <div class="new-progress-container">
                                                                                <div class="new-progress-steps">
                                                                                    <span>Step <span
                                                                                            id="currentStep">1</span> of
                                                                                        4</span>
                                                                                    <span><span
                                                                                            id="progressPercent">25</span>%
                                                                                        Complete</span>
                                                                                </div>
                                                                                <div class="new-progress-bar">
                                                                                    <div class="new-progress-fill"
                                                                                        id="progressFill"></div>
                                                                                </div>
                                                                            </div>

                                                                            <form id="setupForm">
                                                                                <!-- Step 1 -->
                                                                                <div class="new-step active" id="step1">
                                                                                    <h3 class="new-step-title">Personal
                                                                                        Information</h3>

                                                                                    <div class="form-group col-md-12">

                                                                                        <div
                                                                                            class="form-group col-sm-6" style="display: no;">
                                                                                            <label for="focusedinput"
                                                                                                class="col-sm-4 control-label">Category</label>
                                                                                            <div class="col-sm-8">
                                                                                                <select
                                                                                                    class="form-control"
                                                                                                    required
                                                                                                    id="cmb_cat"
                                                                                                    name="cmb_cat"
                                                                                                    onchange="selctcity()">
                                                                                                    <option value=""
                                                                                                        default>--
                                                                                                        Select --
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Employee">
                                                                                                        Employee
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Department">
                                                                                                        Department
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Designation">
                                                                                                        Designation
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Employee_Group">
                                                                                                        Employee_Group
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Company">
                                                                                                        Company</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div id="dynamic-fields"></div>
                                                                                        <div
                                                                                            class="form-group col-sm-5">
                                                                                            <label for="focusedinput"
                                                                                                class="col-sm-4 control-label">Group
                                                                                                Supervisor</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="txt_supervisor_search"
                                                                                                    id="txt_supervisor_search"
                                                                                                    placeholder="Search by ID or Name">
                                                                                                <input type="hidden"
                                                                                                    name="cmb_Supervisor"
                                                                                                    id="cmb_Supervisor">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-2">
                                                                                            <button type="button"
                                                                                                class="btn btn-success col-2"
                                                                                                id="btn_add_department">Add</button>
                                                                                        </div>


                                                                                    </div>
                                                                                    <!-- Table to display added departments and percentages -->
                                                                                    <!-- Table -->
                                                                                    <div class="form-group col-md-12">
                                                                                        <div
                                                                                            class="form-group col-sm-2">

                                                                                        </div>
                                                                                        <div class="form-group col-sm-8"
                                                                                            id="departmentDiv1"
                                                                                            style="display: none;">
                                                                                            <table class="table"
                                                                                                id="departmentTable">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>No</th>
                                                                                                        <th>Name</th>
                                                                                                        <th>Action</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody
                                                                                                    id="sortableRows">
                                                                                                    <!-- Rows dynamically added -->
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <!-- Step 2 -->
                                                                                <div class="new-step" id="step2">
                                                                                    <h3 class="new-step-title">Account
                                                                                        Security</h3>

                                                                                    <div class="new-form-group">
                                                                                        <label class="new-form-label"
                                                                                            for="username">Username</label>
                                                                                        <input type="text"
                                                                                            class="new-form-control"
                                                                                            id="username" required>
                                                                                        <div class="new-error-message"
                                                                                            id="usernameError">Please
                                                                                            choose
                                                                                            a username</div>
                                                                                    </div>

                                                                                    <div class="new-form-row">
                                                                                        <div class="new-form-group">
                                                                                            <label
                                                                                                class="new-form-label"
                                                                                                for="password">Password</label>
                                                                                            <input type="password"
                                                                                                class="new-form-control"
                                                                                                id="password" required>
                                                                                            <div class="new-error-message"
                                                                                                id="passwordError">
                                                                                                Password
                                                                                                must be at least 8
                                                                                                characters
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="new-form-group">
                                                                                            <label
                                                                                                class="new-form-label"
                                                                                                for="confirmPassword">Confirm
                                                                                                Password</label>
                                                                                            <input type="password"
                                                                                                class="new-form-control"
                                                                                                id="confirmPassword"
                                                                                                required>
                                                                                            <div class="new-error-message"
                                                                                                id="confirmPasswordError">
                                                                                                Passwords don't match
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Step 3 -->
                                                                                <div class="new-step" id="step3">
                                                                                    <h3 class="new-step-title">
                                                                                        Preferences
                                                                                    </h3>

                                                                                    <div class="new-form-group">
                                                                                        <label
                                                                                            class="new-form-label">Notification
                                                                                            Settings</label>

                                                                                        <div class="new-checkbox-group">
                                                                                            <label
                                                                                                class="new-checkbox-label">
                                                                                                <input type="checkbox"
                                                                                                    class="new-checkbox-input"
                                                                                                    id="emailNotifications">
                                                                                                <span
                                                                                                    class="new-custom-checkbox"></span>
                                                                                                <span
                                                                                                    class="new-checkbox-text"><strong>Email
                                                                                                        Notifications</strong></span>
                                                                                            </label>
                                                                                            <div
                                                                                                class="new-checkbox-description">
                                                                                                Receive important
                                                                                                updates
                                                                                                via email</div>
                                                                                        </div>

                                                                                        <div class="new-checkbox-group">
                                                                                            <label
                                                                                                class="new-checkbox-label">
                                                                                                <input type="checkbox"
                                                                                                    class="new-checkbox-input"
                                                                                                    id="pushNotifications">
                                                                                                <span
                                                                                                    class="new-custom-checkbox"></span>
                                                                                                <span
                                                                                                    class="new-checkbox-text"><strong>Push
                                                                                                        Notifications</strong></span>
                                                                                            </label>
                                                                                            <div
                                                                                                class="new-checkbox-description">
                                                                                                Get real-time alerts on
                                                                                                your
                                                                                                device</div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="new-form-group">
                                                                                        <label class="new-form-label"
                                                                                            for="theme">Theme
                                                                                            Preference</label>
                                                                                        <select class="new-form-control"
                                                                                            id="theme" required>
                                                                                            <option value="" disabled
                                                                                                selected>Select a theme
                                                                                            </option>
                                                                                            <option value="light">Light
                                                                                                Theme</option>
                                                                                            <option value="dark">Dark
                                                                                                Theme
                                                                                            </option>
                                                                                            <option value="system">
                                                                                                System
                                                                                                Default</option>
                                                                                        </select>
                                                                                        <div class="new-error-message"
                                                                                            id="themeError">Please
                                                                                            select a
                                                                                            theme</div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Step 4 -->
                                                                                <div class="new-step" id="step4">
                                                                                    <h3 class="new-step-title">Review
                                                                                        Information</h3>

                                                                                    <div class="new-review-card">
                                                                                        <h5>Personal Information</h5>
                                                                                        <div class="new-review-item">
                                                                                            <strong>Name:</strong> <span
                                                                                                id="reviewName"></span>
                                                                                        </div>
                                                                                        <div class="new-review-item">
                                                                                            <strong>Email:</strong>
                                                                                            <span
                                                                                                id="reviewEmail"></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="new-review-card">
                                                                                        <h5>Account Details</h5>
                                                                                        <div class="new-review-item">
                                                                                            <strong>Username:</strong>
                                                                                            <span
                                                                                                id="reviewUsername"></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="new-review-card">
                                                                                        <h5>Preferences</h5>
                                                                                        <div class="new-review-item">
                                                                                            <strong>Notifications:</strong>
                                                                                            <span
                                                                                                id="reviewNotifications"></span>
                                                                                        </div>
                                                                                        <div class="new-review-item">
                                                                                            <strong>Theme:</strong>
                                                                                            <span
                                                                                                id="reviewTheme"></span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="new-terms-agreement">
                                                                                        <label
                                                                                            class="new-checkbox-label">
                                                                                            <input type="checkbox"
                                                                                                class="new-checkbox-input"
                                                                                                id="termsAgreement"
                                                                                                required>
                                                                                            <span
                                                                                                class="new-custom-checkbox"></span>
                                                                                            <span
                                                                                                class="new-checkbox-text">I
                                                                                                agree to the Terms of
                                                                                                Service and Privacy
                                                                                                Policy</span>
                                                                                        </label>
                                                                                        <div class="new-error-message"
                                                                                            id="termsError">You must
                                                                                            agree
                                                                                            to the terms</div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="new-modal-footer">
                                                                            <button class="new-btn new-btn-secondary"
                                                                                id="cancelBtn">Cancel</button>
                                                                            <div>
                                                                                <button
                                                                                    class="new-btn new-btn-secondary"
                                                                                    id="prevBtn"
                                                                                    disabled>Previous</button>
                                                                                <button class="new-btn new-btn-primary"
                                                                                    id="nextBtn">Next</button>
                                                                                <button class="new-btn new-btn-success"
                                                                                    id="submitBtn"
                                                                                    style="display: none;">Submit</button>
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


                                                            </form>
                                                            <hr>
                                                            <button class="new-trigger-btn" id="triggerBtn">Start
                                                                Setup</button>



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

<!-- pop model -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // DOM Elements
        const triggerBtn = document.getElementById('triggerBtn');
        const modalOverlay = document.getElementById('modalOverlay');
        const closeBtn = document.getElementById('closeBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const currentStepDisplay = document.getElementById('currentStep');
        const progressPercentDisplay = document.getElementById('progressPercent');
        const progressFill = document.getElementById('progressFill');
        const steps = document.querySelectorAll('.new-step');

        // Form state
        let currentStep = 0;
        const totalSteps = steps.length;

        // Initialize
        updateProgress();

        // Event Listeners
        triggerBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        prevBtn.addEventListener('click', prevStep);
        nextBtn.addEventListener('click', nextStep);
        submitBtn.addEventListener('click', submitForm);

        // Modal control functions
        function openModal() {
            modalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modalOverlay.classList.remove('active');
            document.body.style.overflow = '';
            resetForm();
        }

        // Step navigation
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepIndex);
            });

            // Update button visibility
            prevBtn.disabled = stepIndex === 0;
            nextBtn.style.display = stepIndex === totalSteps - 1 ? 'none' : 'block';
            submitBtn.style.display = stepIndex === totalSteps - 1 ? 'block' : 'none';
            currentStepDisplay.textContent = stepIndex + 1;
        }

        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps - 1) {
                    currentStep++;
                    showStep(currentStep);
                    updateProgress();
                }
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
                updateProgress();
            }
        }

        // Form validation
        function validateStep(stepIndex) {
            let isValid = true;
            const currentStepEl = steps[stepIndex];

            // Validate required fields
            const requiredInputs = currentStepEl.querySelectorAll('[required]');
            requiredInputs.forEach(input => {
                const errorId = input.id + 'Error';
                const errorElement = document.getElementById(errorId);

                if (!input.value.trim()) {
                    input.classList.add('error');
                    if (errorElement) errorElement.style.display = 'block';
                    isValid = false;
                } else {
                    input.classList.remove('error');
                    if (errorElement) errorElement.style.display = 'none';
                }
            });

            // Special validation for email
            if (stepIndex === 0) {
                const email = document.getElementById('email');
                const emailError = document.getElementById('emailError');

                if (email.value && !validateEmail(email.value)) {
                    email.classList.add('error');
                    emailError.textContent = 'Please enter a valid email address';
                    emailError.style.display = 'block';
                    isValid = false;
                }
            }

            // Special validation for passwords
            if (stepIndex === 1) {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('confirmPassword');
                const passwordError = document.getElementById('passwordError');
                const confirmError = document.getElementById('confirmPasswordError');

                if (password.value.length < 8) {
                    password.classList.add('error');
                    passwordError.style.display = 'block';
                    isValid = false;
                }

                if (password.value !== confirmPassword.value) {
                    confirmPassword.classList.add('error');
                    confirmError.style.display = 'block';
                    isValid = false;
                }
            }

            // Special validation for terms agreement
            if (stepIndex === 3) {
                const termsCheckbox = document.getElementById('termsAgreement');
                const termsError = document.getElementById('termsError');

                if (!termsCheckbox.checked) {
                    termsError.style.display = 'block';
                    isValid = false;
                } else {
                    termsError.style.display = 'none';
                }
            }

            return isValid;
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Progress tracking
        function updateProgress() {
            const progress = ((currentStep + 1) / totalSteps) * 100;
            progressFill.style.width = `${progress}%`;
            progressPercentDisplay.textContent = Math.round(progress);
        }

        // Form submission
        function submitForm() {
            if (validateStep(currentStep)) {
                updateReviewSection();

                // Simulate form submission
                submitBtn.textContent = 'Processing...';
                submitBtn.disabled = true;

                setTimeout(() => {
                    alert('Setup completed successfully!');
                    closeModal();
                }, 1500);
            }
        }

        function updateReviewSection() {
            // Personal info
            document.getElementById('reviewName').textContent =
                `${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
            document.getElementById('reviewEmail').textContent =
                document.getElementById('email').value;

            // Account info
            document.getElementById('reviewUsername').textContent =
                document.getElementById('username').value;

            // Preferences
            const notifications = [];
            if (document.getElementById('emailNotifications').checked) notifications.push('Email');
            if (document.getElementById('pushNotifications').checked) notifications.push('Push');
            document.getElementById('reviewNotifications').textContent =
                notifications.join(', ') || 'None';

            const themeSelect = document.getElementById('theme');
            document.getElementById('reviewTheme').textContent =
                themeSelect.options[themeSelect.selectedIndex].text;
        }

        // Form reset
        function resetForm() {
            document.getElementById('setupForm').reset();
            currentStep = 0;
            showStep(currentStep);
            updateProgress();

            // Clear errors
            document.querySelectorAll('.new-error-message').forEach(el => {
                el.style.display = 'none';
            });
            document.querySelectorAll('.new-form-control').forEach(el => {
                el.classList.remove('error');
            });

            // Reset submit button
            submitBtn.textContent = 'Submit';
            submitBtn.disabled = false;
        }
    });
</script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.itemName').select2({
            placeholder: '--- Find ---',
            ajax: {
                url: "<?php echo base_url(); ?>Leave_Transaction/Leave_Entry/search",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('#txt_nic').on('change', function () {
            var empNo = $(this).val();
            if (empNo) {
                $.ajax({
                    url: '<?php echo base_url(); ?>Leave_Transaction/Leave_Entry/get_mem_data/' + empNo,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (data.length > 0) {
                            $('#txt_emp_name').val(data[0].Emp_Full_Name);
                        }
                    }
                });
            }
        });

        $('#cmb_cat').on('change', function () {
            var selectedValue = $(this).val();
            var dynamicFields = $('#dynamic-fields');
            dynamicFields.empty();

            // if (selectedValue === 'Employee') {
                dynamicFields.html(`
                        <div class="form-group col-sm-6">
                            <label for="" class="col-sm-4 control-label">Emp Number</label>
                            <div class="col-sm-8">
                                <select type="text" required="required" autocomplete="off" class="form-control txt_nic itemName" name="txt_nic" id="txt_nic" placeholder="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="txt_emp_name" class="col-sm-4 control-label">Selected Emp Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="txt_emp_name" name="txt_emp_name" placeholder="Selected Emp Name" readonly>
                            </div>
                        </div>
                    `);

                $('.itemName').select2({
                    placeholder: '--- Find ---',
                    ajax: {
                        url: "<?php echo base_url(); ?>Leave_Transaction/Leave_Entry/search",
                        dataType: 'json',
                        delay: 250,
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                        cache: true
                    }
                });

                $('#txt_nic').on('change', function () {
                    var empNo = $(this).val();
                    if (empNo) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>Leave_Transaction/Leave_Entry/get_mem_data/' + empNo,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                if (data.length > 0) {
                                    $('#txt_emp_name').val(data[0].Emp_Full_Name);
                                }
                            }
                        });
                    }
                });
            // } else {
            //     dynamicFields.html(`
            //             <div class="form-group col-sm-6">
            //                 <label for="" class="col-sm-4 control-label">Select</label>
            //                 <div class="col-sm-8" id="cat_div">
            //                     <select class="form-control" required id="cmb_cat2" name="cmb_cat2">
            //                     </select>
            //                 </div>
            //             </div>
            //         `);

            //     $.post('<?php echo base_url(); ?>index.php/Pay/Allowance/dropdown/', { cmb_cat: selectedValue }, function (data) {
            //         $('#cmb_cat2').html(data);
            //     });
            // }
        });

        $("#cmb_cat").trigger("change");
    });
</script>

<style>
    .ui-state-highlight {
        height: 40px;
        background-color: #d9edf7;
        border: 1px dashed #31708f;
    }
</style>

</html>