<!DOCTYPE html>


<!--Description of dashboard page

@author Ashan Rathsara-->


<html lang="en">


<head>
    <!-- Styles -->
    <?php $this->load->view('template/css.php'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        #departmentDiv1 {
            /* width: 50%; */
            margin-top: 1rem;
            /* background: rgba(255, 255, 255, 0.95); */
            backdrop-filter: blur(20px);
            border-radius: 20px;
            /* box-shadow: 10px 20px 40px rgb(185 185 185 / 29%); */
            /* border: 1px solid rgba(255, 255, 255, 0.2); */
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
        /* From Uiverse.io by adamgiebl */
        button {
            /* font-family: inherit; */
            font-size: 13px;
            /* background: #78c552; */
            color: white;
            padding: 0.7em 1em;
            padding-left: 0.9em;
            display: flex;
            align-items: center;
            border: none;
            border-radius: 0px;
            overflow: hidden;
            transition: all 0.2s;
            cursor: pointer;
            width: 31%;
            height: 35px;
        }

        button span {
            display: block;
            margin-left: 0.3em;
            transition: all 0.3s ease-in-out;
        }

        button svg {
            display: block;
            transform-origin: center center;
            transition: transform 0.3s ease-in-out;
        }

        button:hover .svg-wrapper {
            animation: fly-1 0.6s ease-in-out infinite alternate;
        }

        button:hover svg {
            transform: translateX(1.2em) rotate(45deg) scale(1.1);
        }

        button:hover span {
            transform: translateX(5em);
        }

        button:active {
            transform: scale(0.95);
        }

        @keyframes fly-1 {
            from {
                transform: translateY(0.1em);
            }

            to {
                transform: translateY(-0.1em);
            }
        }
    </style>
    <style>
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 0 auto;
            max-width: 1000px;
        }

        .table-title {
            color: #2d3748;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
        }

        .table-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        #departmentTable {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
        }

        #departmentTable thead {
            background: linear-gradient(60deg, rgba(59, 105, 129, 1) 0%, rgba(54, 120, 150, 0.644782913165266) 100%);
            color: white;
        }

        #departmentTable thead th {
            border: none;
            padding: 1.2rem 1rem;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            position: relative;
        }

        #departmentTable thead th:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
        }

        #departmentTable tbody td {
            padding: 1rem;
            border: none;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
            font-size: 15px;
            color: #4a5568;
        }

        /* #departmentTable tbody tr {
            transition: all 0.3s ease;
            position: relative;
        } */

        #departmentTable tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        #departmentTable tbody tr:last-child td {
            border-bottom: none;
        }

        /* Row number styling */
        #departmentTable tbody tr td:first-child {
            font-weight: 600;
            /* color: #667eea; */
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 10px;
            margin: 5px;
            text-align: center;
            width: 60px;
            position: relative;
        }

        /* Action buttons */
        .btn-action {
            padding: 0.4rem 0.8rem;
            margin: 0 0.2rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-action::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-action:hover::before {
            left: 100%;
        }

        .btn-edit {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #38a169, #2f855a);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(72, 187, 120, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #f56565, #e53e3e);
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #e53e3e, #c53030);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 101, 101, 0.4);
        }

        .btn-view {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #3182ce, #2c5282);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(66, 153, 225, 0.4);
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .table-container {
                margin: 0 1rem;
                padding: 1rem;
                border-radius: 15px;
            }

            .table-title {
                font-size: 1.5rem;
            }

            #departmentTable {
                font-size: 0.8rem;
            }

            #departmentTable thead th,
            #departmentTable tbody td {
                padding: 0.8rem 0.5rem;
            }

            .btn-action {
                padding: 0.3rem 0.6rem;
                font-size: 0.7rem;
            }
        }

        /* Loading animation for empty state */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #718096;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Sortable row indicator */
        #sortableRows tr {
            cursor: move;
        }

        #sortableRows tr:hover {
            cursor: move;
        }

        .drag-handle {
            color: #cbd5e0;
            cursor: move;
            margin-right: 0.5rem;
        }

        .drag-handle:hover {
            color: #667eea;
        }
    </style>

    <style>
        .modern-btn {
            background: linear-gradient(135deg, #3eb519 0%, #8ad94e 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 40px 28px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
            text-transform: none;
            letter-spacing: 0.5px;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .modern-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }

        .modern-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .modern-btn:hover::before {
            left: 100%;
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
                                <!-- <li><a data-toggle="tab" href="#tab2">VIEW EMPLOYEE GROUPS</a></li> -->


                            </ul>
                        </div>
                        <div class="container-fluid">


                            <div class="tab-content">


                                <div class="tab-pane active" id="tab1">

                                    <div class="row">
                                        <div class="col-xs-12">

                                            <!-- Progress Bar (initially hidden) -->
                                            <div id="uploadProgressBar" style="display:none; margin-top: 15px;">
                                                <div
                                                    style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                                                    <div id="uploadBar"
                                                        style="width: 0%; height: 20px; background-color: #4caf50; text-align: center; color: white;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h2>ADD EMPLOYEE GROUPS</h2>
                                                        </div>

                                                        <div class="panel-body">
                                                            <!-- <form class="form-horizontal" id="frm_emp_group"
                                                                name="frm_emp_group"
                                                                action="<?php echo base_url(); ?>Master/Employee_Groups/insert_Data"
                                                                method="POST"> -->

                                                            <!-- Success Message -->
                                                            <?php if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != '') { ?>
                                                                <div id="spnmessage"
                                                                    class="alert alert-success alert-dismissible fade show success_redirect"
                                                                    role="alert">
                                                                    <strong>Success!</strong>
                                                                    <?php echo $_SESSION['success_message']; ?>
                                                                </div>
                                                            <?php } ?>

                                                            <!-- Error Message -->
                                                            <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != '') { ?>
                                                                <div id="spnmessage"
                                                                    class="alert alert-danger alert-dismissible fade show error_redirect"
                                                                    role="alert">
                                                                    <strong>Error!</strong>
                                                                    <?php echo $_SESSION['error_message']; ?>
                                                                </div>
                                                            <?php } ?>


                                                            <div class="form-row mb-5">
                                                                <div class="form-group col-md-3">
                                                                    <img class="imagecss"
                                                                        src="<?php echo base_url(); ?>assets/images/employee_group.png"
                                                                        alt="Group Icon" style="max-height: 100px;">
                                                                </div>
                                                            </div>


                                                            <div class="form-row mb-5">
                                                                <div class="form-group col-md-12">
                                                                    <label for="txt_group_name">Group Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="txt_group_name" name="txt_group_name"
                                                                        placeholder="Ex: Office">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="department_select">Department</label>
                                                                    <select class="form-control" id="department_select"
                                                                        name="department_select">
                                                                        <option value="">-- Select --</option>
                                                                        <?php foreach ($data_dep as $t_data) { ?>
                                                                            <option value="<?php echo $t_data->Dep_ID; ?>">
                                                                                <?php echo $t_data->Dep_Name; ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-row mb-5">
                                                                <div class="form-group col-md-12">
                                                                    <h5 class="mt-1" style="margin-top: 15px;">
                                                                        Additional
                                                                        Settings</h5>
                                                                </div>
                                                            </div>



                                                            <div class="form-row">
                                                                <div class="form-group col-md-6"
                                                                    style="margin-top: -8px;">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="ot_m" id="chk_1st_morning">
                                                                        <label class="form-check-label"
                                                                            for="chk_1st_morning">OT Morning</label>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group col-md-6"
                                                                    style="margin-top: -8px;">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="ot_e" id="chk_1st_evening">
                                                                        <label class="form-check-label"
                                                                            for="chk_1st_evening">OT Evening</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-check" style="margin-top: 1px;">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="late" id="chk_late">
                                                                        <label class="form-check-label"
                                                                            for="chk_late">Late Deduction</label>
                                                                    </div>
                                                                    <div class="form-check" style="margin-top: 10px;">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="ed" id="chk_ed">
                                                                        <label class="form-check-label"
                                                                            for="chk_ed">Early Departure
                                                                            Deduction</label>
                                                                    </div>
                                                                    <div class="form-check" style="margin-top: 10px;">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="late_ot" id="chk_late_ot">
                                                                        <label class="form-check-label"
                                                                            for="chk_late_ot">Late Deduct from
                                                                            OT</label>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="form-check" style="margin-top: 1px;">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="dot_holyday" id="chk_dot_holiday">
                                                                        <label class="form-check-label"
                                                                            for="chk_dot_holiday">Double OT for
                                                                            Holiday Day</label>
                                                                    </div>
                                                                    <div class="form-check" style="margin-top: 10px;">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="dot_offday" id="chk_dot_offday">
                                                                        <label class="form-check-label"
                                                                            for="chk_dot_offday">Double OT for OFF
                                                                            Day</label>
                                                                    </div>
                                                                    <div class="form-check" style="margin-top: 10px;">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="sh_lv" id="chk_sh_lv">
                                                                        <label class="form-check-label"
                                                                            for="chk_sh_lv">Late Deduct for Half
                                                                            Day</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <div class="form-check">
                                                                        <label for="round">Min Time to Morning
                                                                            OT</label>
                                                                        <input type="number" class="form-control"
                                                                            id="min_t_ot" name="min_t_ot"
                                                                            placeholder="Ex: 120">
                                                                    </div>
                                                                    <div class="form-check mt-2">
                                                                        <label for="late_gp">Min Time to Evening
                                                                            OT</label>
                                                                        <input type="number" class="form-control"
                                                                            id="min_t_e_ot" name="min_t_e_ot"
                                                                            placeholder="Ex: 120">
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <label for="round">Round Up</label>
                                                                        <input type="number" class="form-control"
                                                                            id="round" name="round"
                                                                            placeholder="Ex: 120">
                                                                    </div>
                                                                    <div class="form-check mt-2">
                                                                        <label for="late_gp">Late Grace
                                                                            Period</label>
                                                                        <input type="number" class="form-control"
                                                                            id="late_gp" name="late_gp"
                                                                            placeholder="Ex: 120">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="form-group col-sm-2"
                                                                    style="margin-top: 10px;">
                                                                    <button type="submit" name="submit"
                                                                        class="btn-success">
                                                                        <div class="svg-wrapper-1">
                                                                            <div class="svg-wrapper">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24" width="15"
                                                                                    height="15">
                                                                                    <path fill="none" d="M0 0h24v24H0z">
                                                                                    </path>
                                                                                    <path fill="currentColor"
                                                                                        d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                                                                    </path>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <span> NEXT</span>
                                                                    </button>
                                                                </div> -->
                                                            <!-- </form> -->

                                                            <hr>

                                                            <div id="divmessage" class="mt-3">
                                                                <div id="spnmessage"></div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-8">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h2>ADD EMPLOYEE GROUPS</h2>
                                                        </div>
                                                        <div class="panel-body">

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
                                                            <!-- <div class="form-group col-sm-12">
                                                                <div class="col-sm-8">
                                                                    <img class="imagecss"
                                                                        src="<?php echo base_url(); ?>assets/images/employee_group.png">
                                                                </div>
                                                            </div> -->

                                                            <div class="form-group col-md-12">

                                                                <div class="form-group col-sm-12">
                                                                    <label for="focusedinput"
                                                                        class="col-sm-2 control-label">Group
                                                                        Supervisor</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control"
                                                                            name="txt_supervisor_search"
                                                                            id="txt_supervisor_search"
                                                                            placeholder="Search by ID or Name">
                                                                        <input type="hidden" name="cmb_Supervisor"
                                                                            id="cmb_Supervisor">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <!-- ✅ Change type to "button" -->
                                                                        <button type="button" id="submit_departments"
                                                                            class="btn-success">
                                                                            <div class="svg-wrapper-1">
                                                                                <div class="svg-wrapper">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 24 24" width="15"
                                                                                        height="15">
                                                                                        <path fill="none"
                                                                                            d="M0 0h24v24H0z">
                                                                                        </path>
                                                                                        <path fill="currentColor"
                                                                                            d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                                                                        </path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <span>SUBMIT</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- <div class="col-sm-3">
                                                                        <button type="button" class="btn btn-info"
                                                                            id="btn_duplicate_group"
                                                                            style="width: 100%;">
                                                                            <i class="fas fa-copy"></i> Duplicate
                                                                        </button>

                                                                    </div> -->

                                                                </div>
                                                                <!-- Buttons for Each Table -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-block"
                                                                                id="btn_add_department">Attendance</button>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-block"
                                                                                id="btn_add_department2">Leave</button>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-block"
                                                                                id="btn_add_department3">Perf
                                                                                Evaluation</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <div class="col-sm-4">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-block"
                                                                                id="btn_add_department4">Salary
                                                                                Advance</button>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-block"
                                                                                id="btn_add_department5">OT
                                                                                Approval</button>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-block"
                                                                                id="btn_add_department6">Staff
                                                                                Loans</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    style="width: 100%;height: 2px;background-color: #aab4b9; margin-bottom: 15px;margin-top: 20px;">
                                                                </div>
                                                                <div class="form-group col-sm-12">
                                                                    <label for="focusedinput"
                                                                        class="col-sm-2 control-label">Select Existing
                                                                        Group</label>
                                                                    <div class="col-sm-6">
                                                                        <select class="form-control"
                                                                            id="select_existing_group">
                                                                            <option value="">-- Select Group
                                                                                --</option>
                                                                            <?php foreach ($data_grp as $group) { ?>
                                                                                <option value="<?= $group->Grp_ID ?>">
                                                                                    <?= $group->EmpGroupName ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <!-- ✅ Change type to "button" -->
                                                                        <button type="button" class="btn btn-info"
                                                                            id="btn_duplicate_group" style="width: 60%;">
                                                                            <i class="fas fa-copy"></i>
                                                                            Duplicate Group
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label
                                                                                        for="select_existing_group">Select
                                                                                        Existing Group</label>
                                                                                    <select class="form-control"
                                                                                        id="select_existing_group">
                                                                                        <option value="">-- Select Group
                                                                                            --</option>
                                                                                        <?php foreach ($data_grp as $group) { ?>
                                                                                            <option
                                                                                                value="<?= $group->Grp_ID ?>">
                                                                                                <?= $group->EmpGroupName ?>
                                                                                            </option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group col-md-6"
                                                                                    style="margin-top: 24px;">
                                                                                    <button type="button"
                                                                                        class="btn btn-info"
                                                                                        id="btn_duplicate_group">
                                                                                        <i class="fas fa-copy"></i>
                                                                                        Duplicate Group
                                                                                    </button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div> -->

                                                                <!-- Table to display added departments and percentages -->
                                                                <!-- Table -->




                                                                <div id="divmessage" class="">

                                                                    <div id="spnmessage"> </div>
                                                                </div>

                                                            </div>


                                                        </div>
                                                        <!-- Tables 1 to 6 -->
                                                        <!-- Tables 1 to 6 -->
                                                        <div class="row">
                                                            <div class="form-group col-md-12"
                                                                style="margin-top: -20px;">
                                                                <div class="col-md-12" id="departmentDiv1"
                                                                    style="display: none;">
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body panel-no-padding">
                                                                            <!-- Table 1 -->
                                                                            <div class="form-group col-sm-12">
                                                                                <span>Attendance</span>
                                                                                <table
                                                                                    class="table table-striped table-bordered"
                                                                                    id="departmentTable1"
                                                                                    style="margin-top: 15px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>User Level Type</th>
                                                                                            <th>Authority Type</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="sortableRows1"></tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Table 2 -->
                                                                <div class="col-md-12" id="departmentDiv2"
                                                                    style="display: none;">
                                                                    <div
                                                                        style="width: 97%;height: 2px;background-color: #aab4b9;margin-top: -40px;position: absolute;">
                                                                    </div>
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body panel-no-padding">
                                                                            <div class="form-group col-sm-12"
                                                                                style="margin-top: -30px;">
                                                                                <span>Leave</span>
                                                                                <table
                                                                                    class="table table-striped table-bordered"
                                                                                    id="departmentTable2"
                                                                                    style="margin-top: 15px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>User Level Type</th>
                                                                                            <th>Authority Type</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="sortableRows2"></tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Table 3 -->
                                                                <div class="col-md-12" id="departmentDiv3"
                                                                    style="display: none;">
                                                                    <div
                                                                        style="width: 97%;height: 2px;background-color: #aab4b9;margin-top: -40px;position: absolute;">
                                                                    </div>
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body panel-no-padding">
                                                                            <div class="form-group col-sm-12"
                                                                                style="margin-top: -30px;">
                                                                                <span>Perf Evaluation</span>
                                                                                <table
                                                                                    class="table table-striped table-bordered"
                                                                                    id="departmentTable3"
                                                                                    style="margin-top: 15px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>User Level Type</th>
                                                                                            <th>Authority Type</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="sortableRows3"></tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Table 4 -->
                                                                <div class="col-md-12" id="departmentDiv4"
                                                                    style="display: none;">
                                                                    <div
                                                                        style="width: 97%;height: 2px;background-color: #aab4b9;margin-top: -40px;position: absolute;">
                                                                    </div>
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body panel-no-padding">
                                                                            <div class="form-group col-sm-12"
                                                                                style="margin-top: -30px;">
                                                                                <span>Salary Advance</span>
                                                                                <table
                                                                                    class="table table-striped table-bordered"
                                                                                    id="departmentTable4"
                                                                                    style="margin-top: 15px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>User Level Type</th>
                                                                                            <th>Authority Type</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="sortableRows4"></tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Table 5 -->
                                                                <div class="col-md-12" id="departmentDiv5"
                                                                    style="display: none;">
                                                                    <div
                                                                        style="width: 97%;height: 2px;background-color: #aab4b9;margin-top: -40px;position: absolute;">
                                                                    </div>
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body panel-no-padding">
                                                                            <div class="form-group col-sm-12"
                                                                                style="margin-top: -30px;">
                                                                                <span>OT Approval</span>
                                                                                <table
                                                                                    class="table table-striped table-bordered"
                                                                                    id="departmentTable5"
                                                                                    style="margin-top: 15px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>User Level Type</th>
                                                                                            <th>Authority Type</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="sortableRows5"></tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Table 6 -->
                                                                <div class="col-md-12" id="departmentDiv6"
                                                                    style="display: none;">
                                                                    <div
                                                                        style="width: 97%;height: 2px;background-color: #aab4b9;margin-top: -40px;position: absolute;">
                                                                    </div>
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body panel-no-padding">
                                                                            <div class="form-group col-sm-12"
                                                                                style="margin-top: -30px;">
                                                                                <span>Staff Loans</span>
                                                                                <table
                                                                                    class="table table-striped table-bordered"
                                                                                    id="departmentTable6"
                                                                                    style="margin-top: 15px;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>User Level Type</th>
                                                                                            <th>Authority Type</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="sortableRows6"></tbody>
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


                                    <!--***************************-->
                                    <!-- Grid View -->

                                    <div class="tab-pane" id="tab2" style="display: none;">

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
                                                                                <td width='50'><?php echo $data->Ot_m; ?>
                                                                                </td>
                                                                                <td width='50'><?php echo $data->Ot_e; ?>
                                                                                </td>
                                                                                <td width='100'><?php echo $data->Late; ?>
                                                                                </td>
                                                                                <td width='50'><?php echo $data->Ed; ?></td>
                                                                                <td width='50'>
                                                                                    <?php echo $data->late_Grs_prd; ?>
                                                                                </td>
                                                                                <td width='200'>
                                                                                    <?php echo $data->Sup_Name; ?>
                                                                                </td>
                                                                                <td width='200'>
                                                                                    <?php echo $data->Admin_Name; ?>
                                                                                </td>
                                                                                <td width='15'>
                                                                                    <?php $url = base_url() . "Master/Employee_Groups/updateAttView?id=$data->Grp_ID"; ?>
                                                                                    <a class="edit_data btn btn-green"
                                                                                        href="<?php echo $url; ?>"
                                                                                        title="EDIT">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td width='15'>
                                                                                    <button
                                                                                        class='action_comp btn btn-danger'
                                                                                        data-toggle='modal'
                                                                                        href='javascript:void()'
                                                                                        title='DELETE'
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
                                                                <input value="<?php echo $data->Desig_Name; ?>"
                                                                    type="text" name="Desig_Name" id="Desig_Name"
                                                                    class="form-control m-wrap span6"><br>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-12">
                                                            <label for="focusedinput"
                                                                class="col-sm-4 control-label">ORDER</label>
                                                            <div class="col-sm-8">
                                                                <input value="<?php echo $data->Desig_Order; ?>"
                                                                    type="text" name="Desig_Order" id="Desig_Order"
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



            <!-- pop model -->

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


                // $(function () {
                //     // Autocomplete
                //     $("#txt_supervisor_search").autocomplete({
                //         source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_emp_no_and_name",
                //         minLength: 1,
                //         select: function (event, ui) {
                //             $("#cmb_Supervisor").val(ui.item.value); // ID
                //             $("#txt_supervisor_search").val(ui.item.value + ' - ' + ui.item.label); // Display text
                //             return false;
                //         }
                //     }).autocomplete("instance")._renderItem = function (ul, item) {
                //         return $("<li>")
                //             .append("<div>" + item.value + " - " + item.label + "</div>")
                //             .appendTo(ul);
                //     };

                //     // Make rows sortable
                //     $("#sortableRows").sortable({
                //         placeholder: "ui-state-highlight"
                //     }).disableSelection();
                // });
                // $(function () {
                //     $("#txt_admin_search").autocomplete({
                //         source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_emp_no_and_name",
                //         minLength: 1,
                //         select: function (event, ui) {
                //             $("#cmb_Admin").val(ui.item.value);
                //             $("#txt_admin_search").val(ui.item.value + ' - ' + ui.item.label);
                //             return false;
                //         }
                //     }).autocomplete("instance")._renderItem = function (ul, item) {
                //         return $("<li>")
                //             .append("<div>" + item.value + " - " + item.label + "</div>")
                //             .appendTo(ul);
                //     };
                // });

                // // $(function () {
                // //             $("#txt_emp_name").autocomplete({
                // //                 source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_auto_emp_name" // path to the get_birds method
                // //             });
                // //         });

                // //         $(function () {
                // //             $("#txt_emp").autocomplete({
                // //                 source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_auto_emp_no" // path to the get_birds method
                // //             });
                // //         });
                // function updateRowNumbers() {
                //     const rows = document.querySelectorAll("#sortableRows tr");
                //     rows.forEach((row, index) => {
                //         row.querySelector("td").textContent = index + 1;
                //     });
                // }

                // // Add department row
                // document.getElementById("btn_add_department").addEventListener("click", function () {
                //     var departmentInput = document.getElementById("txt_supervisor_search");
                //     var departmentId = document.getElementById("cmb_Supervisor").value;
                //     var departmentName = departmentInput.value;

                //     if (departmentName !== "" && departmentId !== "") {
                //         var exists = false;
                //         $("#sortableRows tr").each(function () {
                //             if ($(this).attr("data-id") === departmentId) {
                //                 exists = true;
                //                 return false;
                //             }
                //         });

                //         if (exists) {
                //             alert("This department has already been added.");
                //             return;
                //         }

                //         var tableBody = document.getElementById("departmentTable").getElementsByTagName('tbody')[0];
                //         var newRow = tableBody.insertRow();
                //         newRow.setAttribute("data-id", departmentId);
                //         newRow.classList.add("draggable");

                //         var cell1 = newRow.insertCell(0); // No.
                //         var cell2 = newRow.insertCell(1); // Department name
                //         var cell3 = newRow.insertCell(2); // Dynamic select (PHP rendered)
                //         var cell4 = newRow.insertCell(3); // Static select
                //         var cell5 = newRow.insertCell(4); // Remove button

                //         cell1.textContent = "";
                //         cell2.textContent = departmentName;

                //         // PHP-rendered select should be generated server-side and inserted into the JS variable
                //         const dynamicSelect = `<?php ob_start(); ?>
                //         <div style="position: relative; width: 180px;">
                //             <select class="modern-select" required="required"
                //                     style="appearance: none; -webkit-appearance: none; -moz-appearance: none; width: 95%; padding: 10px 50px 16px 20px; font-size: 14px; color: #2d3748; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 2px solid rgb(143 142 142 / 29%); border-radius: 16px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); outline: none;">
                //                 <option value="0">Choose option</option>
                //                 <?php foreach ($data_level as $data_level1) { ?>
                //                     <option value="<?php echo $data_level1->user_level_id; ?>"><?php echo $data_level1->user_level_name; ?></option>
                //                 <?php } ?>
                //             </select>
                //             <svg style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #667eea;"
                //                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                //                 <polyline points="6,9 12,15 18,9"></polyline>
                //             </svg>
                //         </div>
                //     <?php echo trim(preg_replace('/\s+/', ' ', ob_get_clean())); ?>`;

                //         cell3.innerHTML = dynamicSelect;

                //         // Static select dropdown (Approve/View Only)
                //         cell4.innerHTML = `
                //         <div style="position: relative; width: 180px;">
                //             <select class="modern-select" required="required"
                //                     style="appearance: none; -webkit-appearance: none; -moz-appearance: none; width: 95%; padding: 10px 50px 16px 20px; font-size: 14px; color: #2d3748; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 2px solid rgb(143 142 142 / 29%); border-radius: 16px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); outline: none;">
                //                 <option value="0">Choose option</option>
                //                 <option value="1">Approve Type</option>
                //                 <option value="2">View Only Type</option>
                //             </select>
                //             <svg style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #667eea;"
                //                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                //                 <polyline points="6,9 12,15 18,9"></polyline>
                //             </svg>
                //         </div>
                //     `;

                //         // Remove button
                //         cell5.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>';

                //         // Reset fields
                //         departmentInput.value = "";
                //         document.getElementById("cmb_Supervisor").value = "";

                //         // Show department section
                //         document.getElementById("departmentDiv1").style.display = "block";

                //         // Update numbering
                //         updateRowNumbers();
                //     } else {
                //         alert("Please select a valid supervisor.");
                //     }
                // });

                // // Remove row
                // function removeRow(button) {
                //     var row = button.parentNode.parentNode;
                //     row.parentNode.removeChild(row);

                //     if (document.querySelectorAll("#sortableRows tr").length === 0) {
                //         document.getElementById("departmentDiv1").style.display = "none";
                //     }

                //     updateRowNumbers();
                // }

                // // Update on drag-and-drop
                // $(function () {
                //     $("#sortableRows").sortable({
                //         placeholder: "ui-state-highlight",
                //         update: function () {
                //             updateRowNumbers();
                //         }
                //     }).disableSelection();
                // });


                // Handle form submission
                // document.getElementById("submit_departments").addEventListener("click", function () {
                //     var departments = [];

                //     $("#sortableRows tr").each(function () {
                //         // var departmentId = $(this).attr("data-id");
                //         var departmentId = $(this).find("td:nth-child(1)").text().trim();
                //         var departmentName = $(this).find("td:nth-child(2)").text().trim();
                //         var selectedValue = $(this).find("td:nth-child(3) select").val(); // Get dropdown value
                //         var AuthorityValue = $(this).find("td:nth-child(4) select").val(); // Get dropdown value

                //         if (!departmentId || !departmentName || selectedValue === "0" || AuthorityValue === "0") {
                //             alert("Please fill all fields before submitting.");
                //             return;
                //         }

                //         departments.push({
                //             id: departmentId,
                //             name: departmentName,
                //             selected: selectedValue,
                //             Authority: AuthorityValue
                //         });
                //     });

                //     if (departments.length === 0) {
                //         alert("No departments to submit.");
                //         return;
                //     }

                //     console.log("Submitting departments:", departments);

                //     $.ajax({
                //         url: "<?php echo base_url(); ?>Master/Emp_Attendance/insert_data",
                //         type: "POST",
                //         contentType: "application/json",
                //         data: JSON.stringify({ departments: departments }),
                //         dataType: "json",
                //         success: function (response) {
                //             console.log("Success:", response);
                //             alert("Departments submitted successfully!");
                //         },
                //         error: function (xhr, status, error) {
                //             console.error("Error:", error);
                //             console.error("Response:", xhr.responseText);
                //             alert("An error occurred while submitting departments.");
                //         }
                //     });
                // });




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
                            cell5.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)" style="width: 100%;">Remove</button>';

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


                // upload departments
                // document.getElementById("submit_departments").addEventListener("click", function (e) {

                //     alert("Submitting departments..."); // ✅ Alert to confirm submission
                //     console.log("Submitting departments..."); // ✅ Console log for debugging
                //     e.preventDefault(); // ✅ Prevents form reload

                //     var departments = [];

                //     for (let i = 1; i <= 6; i++) {
                //         $("#sortableRows" + i + " tr").each(function () {
                //             var departmentId = $(this).find("td:nth-child(1)").text().trim();
                //             var departmentName = $(this).find("td:nth-child(2)").text().trim();
                //             var selectedValue = $(this).find("td:nth-child(3) select").val(); // User Level Type
                //             var AuthorityValue = $(this).find("td:nth-child(4) select").val(); // Authority Type

                //             if (!departmentId || !departmentName) {
                //                 alert("Please fill all fields before submitting in Table " + i + ".");
                //                 return false;
                //             }

                //             departments.push({
                //                 id: departmentId,
                //                 name: departmentName,
                //                 selected: selectedValue,
                //                 Authority: AuthorityValue,
                //                 table: i
                //             });
                //         });
                //     }

                //     if (departments.length === 0) {
                //         alert("No departments to submit.");
                //         return;
                //     }

                //     console.log("Submitting departments:", departments); // ✅ Now this will print

                //     $.ajax({
                //         url: "<?php echo base_url(); ?>Master/Emp_Attendance/insert_data",
                //         type: "POST",
                //         contentType: "application/json",
                //         data: JSON.stringify({ departments: departments }),
                //         dataType: "json",
                //         success: function (response) {
                //             console.log("Success:", response);
                //             alert("Departments submitted successfully!");
                //         },
                //         error: function (xhr, status, error) {
                //             console.error("Error:", error);
                //             console.error("Response:", xhr.responseText);
                //             alert("An error occurred while submitting departments.");
                //         }
                //     });
                // });

                // document.getElementById("submit_departments").addEventListener("click", function () {
                //     // Collect group form values
                //     const groupName = document.getElementById("txt_group_name").value.trim();
                //     const departmentSelect = document.getElementById("department_select").value;

                //     const settings = {
                //         ot_morning: document.getElementById("chk_1st_morning").checked,
                //         ot_evening: document.getElementById("chk_1st_evening").checked,
                //         late_deduction: document.getElementById("chk_late").checked,
                //         early_departure: document.getElementById("chk_ed").checked,
                //         late_from_ot: document.getElementById("chk_late_ot").checked,
                //         double_ot_holiday: document.getElementById("chk_dot_holiday").checked,
                //         double_ot_offday: document.getElementById("chk_dot_offday").checked,
                //         half_day_late: document.getElementById("chk_sh_lv").checked,
                //         round_up: document.getElementById("round").value,
                //         late_grace_period: document.getElementById("late_gp").value
                //     };

                //     // Validate required fields
                //     // if (!groupName || !departmentSelect) {
                //     //     alert("Please enter group name and select a department.");
                //     //     return;
                //     // }

                //     // Collect departments from tables 1 to 6
                //     var departments = [];

                //     for (let i = 1; i <= 6; i++) {
                //         $("#sortableRows" + i + " tr").each(function () {
                //             var departmentId = $(this).find("td:nth-child(1)").text().trim();
                //             var departmentName = $(this).find("td:nth-child(2)").text().trim();
                //             var selectedValue = $(this).find("td:nth-child(3) select").val();
                //             var authorityValue = $(this).find("td:nth-child(4) select").val();

                //             if (!departmentId || !departmentName) {
                //                 alert(`Please complete all dropdowns in Table ${i}.`);
                //                 return false;
                //             }

                //             departments.push({
                //                 id: departmentId,
                //                 name: departmentName,
                //                 selected: selectedValue,
                //                 authority: authorityValue,
                //                 table: i
                //             });
                //         });
                //     }

                //     if (departments.length === 0) {
                //         alert("No department rows to submit.");
                //         return;
                //     }

                //     const payload = {
                //         group_name: groupName,
                //         department_id: departmentSelect,
                //         settings: settings,
                //         departments: departments
                //     };

                //     console.log("Submitting full payload:", payload);

                //     $.ajax({
                //         url: "<?php echo base_url(); ?>Master/Emp_Attendance/insert_data",
                //         type: "POST",
                //         contentType: "application/json",
                //         data: JSON.stringify(payload),
                //         dataType: "json",
                //         success: function (response) {
                //             console.log("✅ Success:", response);
                //             alert("Group and departments submitted successfully!");
                //         },
                //         error: function (xhr, status, error) {
                //             console.error("❌ Error:", error);
                //             console.error("❌ Response:", xhr.responseText);
                //             alert("An error occurred while submitting the form.");
                //         }
                //     });
                // });


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

                    // Show and animate progress bar
                    $("#uploadProgressBar").show();
                    let progress = 0;
                    let interval = setInterval(() => {
                        if (progress < 90) {
                            progress += 5;
                            $("#uploadBar").css("width", progress + "%").text(progress + "%");
                        }
                    }, 150);

                    // AJAX submission
                    $.ajax({
                        url: "<?php echo base_url(); ?>Master/Emp_Attendance/insert_data",
                        type: "POST",
                        contentType: "application/json",
                        data: JSON.stringify(payload),
                        dataType: "json",
                        success: function (response) {
                            clearInterval(interval);
                            $("#uploadBar").css("width", "100%").text("100%");

                            setTimeout(() => {
                                $("#uploadProgressBar").fadeOut();
                                $("#uploadBar").css("width", "0%").text("0%");
                            }, 1000);

                            console.log("Success:", response);
                            alert("Group and departments submitted successfully!");
                        },
                        error: function (xhr, status, error) {
                            clearInterval(interval);
                            $("#uploadBar").css("width", "100%").css("background-color", "red").text("Failed");

                            setTimeout(() => {
                                $("#uploadProgressBar").fadeOut();
                                $("#uploadBar").css("width", "0%").css("background-color", "#4caf50").text("0%");
                            }, 1500);

                            console.error("Error:", error);
                            console.error("Response:", xhr.responseText);
                            alert("An error occurred while submitting.");
                        }
                    });
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
                                        <button class="btn btn-danger btn-sm remove-row" style="width: 100%;">Remove</button>
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