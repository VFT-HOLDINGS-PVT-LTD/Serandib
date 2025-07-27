<!DOCTYPE html>


<!--Add Employee

@author Ashan Rathsara-->


<html lang="en">


<head>
    <title><?php echo $title ?></title>
    <!-- Styles -->
    <?php $this->load->view('template/css.php'); ?>


</head>

<style type="text/css">
    .thumb-image {
        float: left;
        width: 200px;
        height: 250px;
        position: relative;
        padding: 5px;
    }
</style>

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
                        <ol class="">

                            <!--                                <li class=""><a href="#">HOME</a></li>
                                                                <li class="active"><a href="#">EMPLOYEES</a></li>-->

                        </ol>


                        <!--                            <div class="page-tabs">
                                                            <ul class="nav nav-tabs">
                            
                                                                <li class="active"><a data-toggle="tab" href="#tab1">EMPLOYEES</a></li>
                            
                            
                            
                                                            </ul>
                                                        </div>-->
                        <div class="container-fluid">


                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">

                                    <div class="row">
                                        <div class="col-xs-12">


                                            <div class="panel">
                                                <div style="background: rgb(59,105,129);
                                                         background: linear-gradient(60deg, rgba(59,105,129,1) 0%, rgba(54,120,150,0.644782913165266) 100%);border-radius: 30px;"
                                                    class="panel-heading">
                                                    <img style="height: 70px; float: left"
                                                        src="<?php echo base_url(); ?>assets/images/user-group.png">
                                                    <h2 style="color: #ffffff">EMPLOYEE</h2>
                                                    <!--                                                        <div class="options">
                                                                                                                    <ul class="nav nav-tabs">
                                                        
                                                                                                                        <li class="active"><a href="#horizontal-form" data-toggle="tab">MASTER</a></li>
                                                                                                                        <li ><a href="#vertical-form" data-toggle="tab">PERSONAL DETAILS</a></li>
                                                                                                                        <li><a href="#bordered-row" data-toggle="tab">OTHER DETAILS</a></li>
                                                                                                                        <li><a href="#login" data-toggle="tab">LOGIN DETAILS</a></li>
                                                                                                                        <li><a href="#tabular-form" data-toggle="tab">DOCUMENTS</a></li>
                                                                                                                    </ul>
                                                                                                                </div>-->
                                                </div>
                                                <div class="panel-body ">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="horizontal-form">
                                                            <!-- <form class="form-horizontal" id="frm_employee"
                                                                name="frm_employee"
                                                                action="<?php echo base_url(); ?>Employee_Management/ADD_Employees/insert_Data"
                                                                method="POST" enctype="multipart/form-data"> -->
                                                            <form id="employeeForm" enctype="multipart/form-data">

                                                                <div class="form-group col-md-12">
                                                                    <!--success Message-->
                                                                    <?php if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != '') { ?>
                                                                        <div id="spnmessage"
                                                                            class="alert alert-dismissable alert-success">
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
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Employee
                                                                            No <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control"
                                                                                id="txt_emp_no" name="txt_emp_no"
                                                                                placeholder="Ex: 00001" required="">
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Enroll
                                                                            No <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control"
                                                                                id="txt_enroll_no" name="txt_enroll_no"
                                                                                placeholder="Ex: 1" required="">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Company No
                                                                            <span
                                                                                style="color: red; font-size: 12px;">(Do
                                                                                not leave any space) *</span>
                                                                        </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_cmp_no" name="txt_cmp_no"
                                                                                placeholder="Ex: 00001" required="">

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">EPF
                                                                            No </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_epf_no" name="txt_epf_no"
                                                                                placeholder="Ex: 1">
                                                                        </div>

                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">EPF
                                                                            Category</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_epf_cat" name="cmb_epf_cat">


                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php foreach ($data_epf as $t_data) { ?>
                                                                                    <option
                                                                                        value="<?php echo $t_data->EPF_CAT; ?>">
                                                                                        <?php echo $t_data->EPF_CAT_Name; ?>
                                                                                    </option>

                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Employee
                                                                            Status <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_emp_status"
                                                                                name="cmb_emp_status" required="">


                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php foreach ($data_status as $t_data) { ?>
                                                                                    <option
                                                                                        value="<?php echo $t_data->EMP_ST_ID; ?>">
                                                                                        <?php echo $t_data->EMP_ST_Name; ?>
                                                                                    </option>

                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">EPF
                                                                            Liable <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" id="cmb_if_epf"
                                                                                name="cmb_if_epf" required="">
                                                                                <option value="">-- Select --</option>
                                                                                <option value="1">Yes</option>
                                                                                <option value="0">No</option>

                                                                            </select>
                                                                        </div>

                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Occupation
                                                                            Code</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_ocp_code" name="txt_ocp_code"
                                                                                placeholder="Ex: 15">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Title <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_emp_title" name="cmb_emp_title"
                                                                                required="">
                                                                                <option value="">-- Select --
                                                                                </option>
                                                                                <option value="Unknown.">Unknown
                                                                                </option>
                                                                                <option value="Mr.">Mr.</option>
                                                                                <option value="Mrs.">Mrs.</option>
                                                                                <option value="Miss.">Miss.</option>
                                                                                <option value="Dr.">Dr.</option>


                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Full
                                                                            Name <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_emp_name" name="txt_emp_name"
                                                                                required=""
                                                                                placeholder="Ex: Ashan Rathsara">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Name With
                                                                            Initials <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_emp_name_init"
                                                                                name="txt_emp_name_init" required=""
                                                                                placeholder="Ex: L.A.R">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">

                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Image <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-6">
                                                                            <div class="fileinput fileinput-new"
                                                                                style="width: 100%;"
                                                                                data-provides="fileinput">
                                                                                <div class="fileinput-preview thumbnail mb20"
                                                                                    data-trigger="fileinput"
                                                                                    style="width: 100%; height: 150px;">
                                                                                </div>
                                                                                <div>
                                                                                    <a href="#"
                                                                                        class="btn btn-default fileinput-exists"
                                                                                        data-dismiss="fileinput">Remove</a>
                                                                                    <span
                                                                                        class="btn btn-default btn-file"><span
                                                                                            class="fileinput-new">Select
                                                                                            image</span><span
                                                                                            class="fileinput-exists">Change</span><input
                                                                                            type="file"
                                                                                            name="img_employee"
                                                                                            id="img_employee"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>


                                                                </div>

                                                                <div class="form-group col-md-12">

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Gender <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select required="" class="form-control"
                                                                                id="cmb_gender" name="cmb_gender">
                                                                                <option value="" default>-- Select --
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <!-- <div class="form-group col-sm-6 ">
                                                                        <label
                                                                            class="col-sm-4 control-label">Status</label>
                                                                        <div class="col-sm-8">
                                                                            <label class="radio-inline icheck">
                                                                                <input type="radio" id="inlineradio1"
                                                                                    required="" value="Active" <?php echo ($data_set[0]->Status == '1') ? 'checked' : '' ?>
                                                                                    name="employee_status"> Active
                                                                            </label>
                                                                            <label class="radio-inline icheck">
                                                                                <input type="radio" id="inlineradio2"
                                                                                    value="Inactive" <?php echo ($data_set[0]->Status == '0') ? 'checked' : '' ?>
                                                                                    name="employee_status"> Inactive
                                                                            </label>

                                                                        </div>

                                                                    </div> -->

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Designation
                                                                            <span style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" required=""
                                                                                id="cmb_desig" name="cmb_desig">


                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php foreach ($data_desig as $t_data) { ?>
                                                                                    <option
                                                                                        value="<?php echo $t_data->Des_ID; ?>">
                                                                                        <?php echo $t_data->Desig_Name; ?>
                                                                                    </option>

                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Department
                                                                            <span style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" required=""
                                                                                id="cmb_dep" name="cmb_dep">


                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php foreach ($data_dep as $t_data) { ?>
                                                                                    <option
                                                                                        value="<?php echo $t_data->Dep_ID; ?>">
                                                                                        <?php echo $t_data->Dep_Name; ?>
                                                                                    </option>

                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Sub
                                                                            Department <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                required="required" id="cmb_group"
                                                                                name="cmb_group">


                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php foreach ($data_grp as $t_data) { ?>
                                                                                    <option
                                                                                        value="<?php echo $t_data->Grp_ID; ?>">
                                                                                        <?php echo $t_data->EmpGroupName; ?>
                                                                                    </option>

                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <!-- <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Roster
                                                                            Pattern</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_roster_pattern"
                                                                                name="cmb_roster_pattern">
                                                                                <?php
                                                                                foreach ($data_Rstr as $t_data) {
                                                                                    if ($t_data->RosterCode == $data_set[0]->RosterCode) {
                                                                                        echo "<option selected value='" . $t_data->RosterCode . "'>" . $t_data->RosterName . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->RosterCode . "'>" . $t_data->RosterName . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                    </div> -->


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Branch<span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" id="cmb_branch"
                                                                                name="cmb_branch" required="">


                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php
                                                                                foreach ($data_branch as $t_data) {
                                                                                    if ($t_data->B_id == $data_set[0]->B_id) {
                                                                                        echo "<option selected value='" . $t_data->B_id . "'>" . $t_data->B_name . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->B_id . "'>" . $t_data->B_name . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">OT
                                                                            Pattern</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_ot_pattern"
                                                                                name="cmb_ot_pattern">
                                                                                <?php
                                                                                foreach ($data_ot as $t_data) {
                                                                                    if ($t_data->OTCode == $data_set[0]->OTCode) {
                                                                                        echo "<option selected value='" . $t_data->OTCode . "'>" . $t_data->OTName . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->OTCode . "'>" . $t_data->OTName . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>




                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Appoint Date
                                                                            <span style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_appoint_date"
                                                                                name="txt_appoint_date" required=""
                                                                                placeholder="Ex: Select Date">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Permanent
                                                                            Date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_permanent_date"
                                                                                name="txt_permanent_date"
                                                                                placeholder="Select Date">
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- <div class="tab-pane" id="vertical-form">

                                                                    <label
                                                                        style="font-weight: bold; color: #000">Academic
                                                                        Qualifications <span
                                                                            style="color: red;">*</span></label>
                                                                    <hr>

                                                                    <div class="form-group col-md-12">
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">O/L</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label>
                                                                                        <input type="checkbox" name="ol"
                                                                                            id="ol" <?php if (!empty($data_set[0]->OL_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>>
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">A/L</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="al" id="al" <?php if (!empty($data_set[0]->AL_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-5 control-label">Diploma</label>
                                                                            <div class="col-sm-1 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="diploma" id="diploma"
                                                                                            <?php if (!empty($data_set[0]->Diploma_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Higher
                                                                                National Diploma (HND)</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="hnd" id="hnd" <?php if (!empty($data_set[0]->HND_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Degree</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="degree" id="degree"
                                                                                            <?php if (!empty($data_set[0]->Degree_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Master</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="master" id="master"
                                                                                            <?php if (!empty($data_set[0]->Master_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-5 control-label">Master of
                                                                                Philosophy (mphil)</label>
                                                                            <div class="col-sm-1 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="mphil" id="mphil"
                                                                                            <?php if (!empty($data_set[0]->Mphill_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Doctor of
                                                                                Philosophy (Phd)</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="phd" id="phd" <?php if (!empty($data_set[0]->PHD_Data)) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?>></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Other</label>
                                                                            <div class="col-sm-8">
                                                                                <textarea class="form-control"
                                                                                    id="other" name="other"
                                                                                    placeholder="Ex:"><?php echo $data_set[0]->Academic_Other_Data; ?></textarea>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                                 <div class="tab-pane" id="vertical-form">

                                                                    <label
                                                                        style="font-weight: bold; color: #000">Academic
                                                                        Qualifications <span
                                                                            style="color: red;">*</span></label>
                                                                    <hr>

                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Qualification
                                                                                <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control"
                                                                                    id="qualificationSelect">
                                                                                    <option value="">-- Select
                                                                                        Qualification
                                                                                        --</option>
                                                                                    <option value="ol">O/L (Ordinary
                                                                                        Level)
                                                                                    </option>
                                                                                    <option value="al">A/L (Advanced
                                                                                        Level)
                                                                                    </option>
                                                                                    <option value="diploma">Diploma
                                                                                    </option>
                                                                                    <option value="hnd">Higher National
                                                                                        Diploma (HND)</option>
                                                                                    <option value="degree">Degree
                                                                                    </option>
                                                                                    <option value="master">Master
                                                                                    </option>
                                                                                    <option value="mphil">Master of
                                                                                        Philosophy (MPhil)</option>
                                                                                    <option value="phd">Doctor of
                                                                                        Philosophy
                                                                                        (PhD)</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Notes
                                                                                <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-6">
                                                                                <textarea class="form-control"
                                                                                    id="notesInput" rows="2"
                                                                                    placeholder="Additional notes or remarks"></textarea>
                                                                            </div>
                                                                            <div class="col-sm-1">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    id="addQualification">Add</button>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <div class="col-sm-2"></div>

                                                                            <div class="col-sm-10">
                                                                                <!-- Hidden inputs to store selected qualifications -->
                                                                                <div id="hiddenInputs"></div>

                                                                                <div class="form-group row">
                                                                                    <div
                                                                                        class="table-container col-sm-12">
                                                                                        <!-- <h4>Selected Qualifications</h4> -->
                                                                                        <table
                                                                                            class="table table-striped table-bordered"
                                                                                            id="qualificationTable">
                                                                                            <thead class="thead-dark">
                                                                                                <tr>
                                                                                                    <th>Qualification
                                                                                                    </th>
                                                                                                    <th>Notes</th>
                                                                                                    <th>Action</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody
                                                                                                id="qualificationTableBody">
                                                                                                <tr id="emptyRow">
                                                                                                    <td colspan="3"
                                                                                                        class="text-center text-muted">
                                                                                                        No
                                                                                                        qualifications
                                                                                                        added</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="vertical-form">

                                                                    <label
                                                                        style="font-weight: bold; color: #000">Payroll
                                                                        Details</label>
                                                                    <hr>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Basic
                                                                            Salary</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_basic_sal" name="txt_basic_sal"
                                                                                placeholder="Ex: 35500">
                                                                        </div>

                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Incentive</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_Incentive" name="txt_Incentive"
                                                                                placeholder="Ex: 15500">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Budgetary
                                                                            Allowance 1</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_BG_Allowance"
                                                                                name="txt_BG_Allowance1"
                                                                                placeholder="Ex: 5500">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Budgetary
                                                                            Allowance 2 </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_BG_Allowance"
                                                                                name="txt_BG_Allowance2"
                                                                                placeholder="Ex: 5500">
                                                                        </div>

                                                                    </div>




                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Bank <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" id="cmb_bank"
                                                                                name="cmb_bank" required="">

                                                                                <option value="" default>-- Select --
                                                                                </option>
                                                                                <?php foreach ($data_bank as $t_data) { ?>
                                                                                    <option
                                                                                        value="<?php echo $t_data->Bnk_ID; ?>">
                                                                                        <?php echo $t_data->bank_name; ?>
                                                                                    </option>

                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Branch
                                                                            ID</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_B_Branch" name="txt_B_Branch"
                                                                                placeholder="Ex: 023">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Account
                                                                            No <span
                                                                                style="color: red;">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_account" name="txt_account"
                                                                                placeholder="Ex: 112457854" required="">
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                </div>


                                                                <div class="tab-pane" id="vertical-form">

                                                                    <label
                                                                        style="font-weight: bold; color: #000">Personal
                                                                        Details</label>
                                                                    <hr>

                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Full
                                                                                Address <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_address" name="txt_address"
                                                                                    placeholder="Ex: No: 123, Street, City"
                                                                                    required="">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">City
                                                                                <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_city" name="txt_city"
                                                                                    placeholder="Ex: No: 123, Street, City"
                                                                                    required="">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">District
                                                                                <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control"
                                                                                    id="cmb_district"
                                                                                    name="cmb_district" required="">

                                                                                    <option value="">--Select--</option>
                                                                                    <option value="Unknown">Unknown
                                                                                    </option>
                                                                                    <option value="Ampara">Ampara
                                                                                    </option>
                                                                                    <option value="Anuradhapura">
                                                                                        Anuradhapura</option>
                                                                                    <option value="Badulla">Badulla
                                                                                    </option>
                                                                                    <option value="Batticaloa">
                                                                                        Batticaloa</option>
                                                                                    <option value="Colombo">Colombo
                                                                                    </option>
                                                                                    <option value="Galle">Galle</option>
                                                                                    <option value="Gampaha">Gampaha
                                                                                    </option>
                                                                                    <option value="Hambantota">
                                                                                        Hambantota</option>
                                                                                    <option value="Jaffna">Jaffna
                                                                                    </option>
                                                                                    <option value="Kalutara">Kalutara
                                                                                    </option>
                                                                                    <option value="Kegalle">Kegalle
                                                                                    </option>
                                                                                    <option value="Kilinochchi">
                                                                                        Kilinochchi</option>
                                                                                    <option value="Kurunegala">
                                                                                        Kurunegala</option>
                                                                                    <option value="Kandy">Kandy</option>
                                                                                    <option value="Mannar">Mannar
                                                                                    </option>
                                                                                    <option value="Matale">Matale
                                                                                    </option>
                                                                                    <option value="Moneragala">
                                                                                        Moneragala</option>
                                                                                    <option value="Mullaitivu">
                                                                                        Mullaitivu</option>
                                                                                    <option value="NuwaraEliya">
                                                                                        NuwaraEliya</option>
                                                                                    <option value="Polonnaruwa">
                                                                                        Polonnaruwa</option>
                                                                                    <option value="Puttalam">Puttalam
                                                                                    </option>
                                                                                    <option value="Ratnapura">Ratnapura
                                                                                    </option>
                                                                                    <option value="Trincomalee">
                                                                                        Trincomalee</option>
                                                                                    <option value="Vavuniya">Vavuniya
                                                                                    </option>

                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Temp Full
                                                                                Address</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_tmp_address"
                                                                                    name="txt_tmp_address"
                                                                                    placeholder="Ex: No: 123, Street, City">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Temp
                                                                                City</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_tmp_city"
                                                                                    name="txt_tmp_city"
                                                                                    placeholder="Ex: No: 123, Street, City">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Temp
                                                                                District</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control"
                                                                                    id="cmb_tmp_district"
                                                                                    name="cmb_tmp_district">

                                                                                    <option value="">--Select--</option>
                                                                                    <option value="Unknown">Unknown
                                                                                    </option>
                                                                                    <option value="Ampara">Ampara
                                                                                    </option>
                                                                                    <option value="Anuradhapura">
                                                                                        Anuradhapura</option>
                                                                                    <option value="Badulla">Badulla
                                                                                    </option>
                                                                                    <option value="Batticaloa">
                                                                                        Batticaloa</option>
                                                                                    <option value="Colombo">Colombo
                                                                                    </option>
                                                                                    <option value="Galle">Galle</option>
                                                                                    <option value="Gampaha">Gampaha
                                                                                    </option>
                                                                                    <option value="Hambantota">
                                                                                        Hambantota</option>
                                                                                    <option value="Jaffna">Jaffna
                                                                                    </option>
                                                                                    <option value="Kalutara">Kalutara
                                                                                    </option>
                                                                                    <option value="Kegalle">Kegalle
                                                                                    </option>
                                                                                    <option value="Kilinochchi">
                                                                                        Kilinochchi</option>
                                                                                    <option value="Kurunegala">
                                                                                        Kurunegala</option>
                                                                                    <option value="Kandy">Kandy</option>
                                                                                    <option value="Mannar">Mannar
                                                                                    </option>
                                                                                    <option value="Matale">Matale
                                                                                    </option>
                                                                                    <option value="Moneragala">
                                                                                        Moneragala</option>
                                                                                    <option value="Mullaitivu">
                                                                                        Mullaitivu</option>
                                                                                    <option value="NuwaraEliya">
                                                                                        NuwaraEliya</option>
                                                                                    <option value="Polonnaruwa">
                                                                                        Polonnaruwa</option>
                                                                                    <option value="Puttalam">Puttalam
                                                                                    </option>
                                                                                    <option value="Ratnapura">Ratnapura
                                                                                    </option>
                                                                                    <option value="Trincomalee">
                                                                                        Trincomalee</option>
                                                                                    <option value="Vavuniya">Vavuniya
                                                                                    </option>

                                                                                </select>
                                                                            </div>

                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Contact
                                                                                No (Home)</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_cont_home"
                                                                                    name="txt_cont_home"
                                                                                    placeholder="Ex: 0112 234 567">
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Contact
                                                                                No (Mobile)<span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_cont_mobile"
                                                                                    name="txt_cont_mobile"
                                                                                    placeholder="Ex: 071 733 8110"
                                                                                    required="">
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Email
                                                                                <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_email" name="txt_email"
                                                                                    placeholder="Ex: ashan.rathsara@gmail.com"
                                                                                    required="">
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Driving
                                                                                Licence No</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_dLicence"
                                                                                    name="txt_dLicence"
                                                                                    placeholder="B1234567">
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">NIC <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" required=""
                                                                                    class="form-control" id="txt_nic"
                                                                                    name="txt_nic"
                                                                                    placeholder="Ex: 923244786V"
                                                                                    required="">
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Passport
                                                                                No</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_passport"
                                                                                    name="txt_passport"
                                                                                    placeholder="Ex: 923244786">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Date of
                                                                                Birth <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_dob" name="txt_dob"
                                                                                    required="">
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Blood
                                                                                Group</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control"
                                                                                    id="cmb_blood" name="cmb_blood">

                                                                                    <option value="">--Select--</option>
                                                                                    <option value="A+">A+</option>
                                                                                    <option value="A-">A-</option>
                                                                                    <option value="B+">B+</option>
                                                                                    <option value="B-">B-</option>
                                                                                    <option value="AB">AB</option>
                                                                                    <option value="AB+">AB+</option>
                                                                                    <option value="O">O</option>
                                                                                    <option value="O+">O+</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Religion
                                                                                <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control"
                                                                                    id="cmb_religin" name="cmb_religin"
                                                                                    required="">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="Buddhist">Buddhist
                                                                                    </option>
                                                                                    <option value="Hindu">Hindu
                                                                                    </option>
                                                                                    <option value="Islam">Islam
                                                                                    </option>
                                                                                    <option value="Christian">Christian
                                                                                    </option>
                                                                                    <option value="Catholic">Catholic
                                                                                    </option>
                                                                                    <option value="Other">Other
                                                                                    </option>

                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Civil
                                                                                Status <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control"
                                                                                    id="cmb_civil_status"
                                                                                    name="cmb_civil_status" required="">

                                                                                    <option value="">--Select--</option>
                                                                                    <option value="SINGLE">SINGLE
                                                                                    </option>
                                                                                    <option value="MARRIED">MARRIED
                                                                                    </option>
                                                                                    <option value="DIVORCED">DIVORCED
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>



                                                                <div class="row">

                                                                </div>

                                                                <div class="tab-pane" id="bordered-row">

                                                                    <label style="font-weight: bold; color: #000">Family
                                                                        Details</label>
                                                                    <hr>
                                                                    <div class="form-horizontal">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Relation's
                                                                                Name <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_rel_name"
                                                                                    name="txt_rel_name"
                                                                                    placeholder="Mr. Nimal Perera"
                                                                                    required="">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Relation's
                                                                                Contact No <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_rel_cont"
                                                                                    name="txt_rel_cont"
                                                                                    placeholder="Mr. 071 111 222"
                                                                                    required="">
                                                                            </div>

                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">No of
                                                                                Children</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_no_child"
                                                                                    name="txt_no_child"
                                                                                    placeholder="Ex: 4">
                                                                            </div>

                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                </div>

                                                                <div class="tab-pane" id="bordered-row">

                                                                    <label
                                                                        style="font-weight: bold; color: #000">Emergency
                                                                        Contact</label>
                                                                    <hr>

                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Emergency
                                                                                Contact Name <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_emergency_name"
                                                                                    name="txt_emergency_name"
                                                                                    placeholder="Mr. Nimal Perera"
                                                                                    required="">
                                                                            </div>

                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Emergency
                                                                                Contact Telephone <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_emergency_tel"
                                                                                    name="txt_emergency_tel"
                                                                                    placeholder="071 111 222"
                                                                                    required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Emergency
                                                                                Contact Address <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_emergency_address"
                                                                                    name="txt_emergency_address"
                                                                                    placeholder="Ex: No: 123, Street, City"
                                                                                    required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Emergency
                                                                                Contact Relationship <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_emergency_relationship"
                                                                                    name="txt_emergency_relationship"
                                                                                    placeholder="Ex: Father"
                                                                                    required="">
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="bordered-row">

                                                                    <label style="font-weight: bold; color: #000">Bond
                                                                        Guarantor Details</label>
                                                                    <hr>

                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Guarantor's
                                                                                name</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_bond_guarantor_name"
                                                                                    name="txt_bond_guarantor_name"
                                                                                    placeholder="Mr. Nimal Perera">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Address</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_bond_guarantor_address"
                                                                                    name="txt_bond_guarantor_address"
                                                                                    placeholder="Ex: No: 123, Street, City">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">NIC</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_bond_guarantor_nic"
                                                                                    name="txt_bond_guarantor_nic"
                                                                                    placeholder="Ex: 123456789V">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Email</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_bond_guarantor_email"
                                                                                    name="txt_bond_guarantor_email"
                                                                                    placeholder="nimal@gmail.com">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Contact
                                                                                No</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="txt_bond_guarantor_contact"
                                                                                    name="txt_bond_guarantor_contact"
                                                                                    placeholder="Ex: 071 111 222">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Bond
                                                                                Entitlement</label>
                                                                            <div class="col-sm-2 icheck-flat">
                                                                                <div class="checkbox green icheck">
                                                                                    <label><input type="checkbox"
                                                                                            name="bond_guarantor_entitlement"
                                                                                            id="bond_guarantor_entitlement"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Bond End
                                                                                Date</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="bond_end_date"
                                                                                    placeholder="Select Date"
                                                                                    name="bond_end_date">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="bordered-row">

                                                                    <label style="font-weight: bold; color: #000">Non
                                                                        Related Referee 01</label>
                                                                    <hr>
                                                                    <div class="form-group col-md-12">

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Referee's
                                                                                Name <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_name"
                                                                                    name="non_related_referee_name"
                                                                                    placeholder="Mr. Nimal Perera"
                                                                                    required="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Designation
                                                                                <span style="color: red;">*</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_designation"
                                                                                    name="non_related_referee_designation"
                                                                                    placeholder="Manager" required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">NIC <span
                                                                                    style="color: red;">*</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_nic"
                                                                                    name="non_related_referee_nic"
                                                                                    placeholder="9456565656v"
                                                                                    required="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Mobile
                                                                                Number <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_contact"
                                                                                    name="non_related_referee_contact"
                                                                                    placeholder="071 111 222"
                                                                                    required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Email</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_email"
                                                                                    name="non_related_referee_email"
                                                                                    placeholder="nimal@gmail.com">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Address
                                                                                <span style="color: red;">*</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_address"
                                                                                    name="non_related_referee_address"
                                                                                    placeholder="Ex: No: 123, Street, City"
                                                                                    required="">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="bordered-row">

                                                                    <label style="font-weight: bold; color: #000">Non
                                                                        Related Referee 02</label>
                                                                    <hr>

                                                                    <div class="form-group col-md-12">
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Referee's
                                                                                Name <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_2_name"
                                                                                    name="non_related_referee_2_name"
                                                                                    placeholder="Mr.Nimal Perera"
                                                                                    required="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Designation
                                                                                <span style="color: red;">*</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_2_designation"
                                                                                    name="non_related_referee_2_designation"
                                                                                    placeholder="Manager" required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">NIC <span
                                                                                    style="color: red;">*</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_2_nic"
                                                                                    name="non_related_referee_2_nic"
                                                                                    placeholder="9456565656v"
                                                                                    required="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Mobile
                                                                                Number <span
                                                                                    style="color: red;">*</span></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_2_contact"
                                                                                    name="non_related_referee_2_contact"
                                                                                    placeholder="071 111 222"
                                                                                    required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Email</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_2_email"
                                                                                    name="non_related_referee_2_email"
                                                                                    placeholder="nimal@gmail.com">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Address
                                                                                <span style="color: red;">*</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="non_related_referee_2_address"
                                                                                    name="non_related_referee_2_address"
                                                                                    placeholder="Ex: No: 123, Street, City"
                                                                                    required="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                </div>


                                                                <div class="tab-pane" id="login">

                                                                    <label style="font-weight: bold; color: #000">Login
                                                                        Details</label>
                                                                    <hr>
                                                                    <div class="form-horizontal">

                                                                        <div class="form-group col-md-12">

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">User
                                                                                    Name <span
                                                                                        style="color: red;">*</span></label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        autocomplete="off"
                                                                                        class="form-control"
                                                                                        id="txt_user_name"
                                                                                        name="txt_user_name"
                                                                                        placeholder="Nimal" required="">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-md-6 ">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">User
                                                                                    Level <span
                                                                                        style="color: red;">*</span></label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        id="cmb_user_level"
                                                                                        name="cmb_user_level"
                                                                                        required="">

                                                                                        <option value="" default>--
                                                                                            Select --</option>
                                                                                        <?php foreach ($data_u_lvl as $t_data) { ?>
                                                                                            <option
                                                                                                value="<?php echo $t_data->user_level_id; ?>">
                                                                                                <?php echo $t_data->user_level_name; ?>
                                                                                            </option>

                                                                                        <?php }
                                                                                        ?>


                                                                                    </select>
                                                                                </div>


                                                                            </div>

                                                                        </div>



                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Remarks</label>
                                                                            <div class="col-sm-8">
                                                                                <textarea type="text"
                                                                                    class="form-control"
                                                                                    id="txt_remarks" name="txt_remarks"
                                                                                    placeholder="Ex: Remarks"></textarea>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label for="focusedinput"
                                                                                class="col-sm-4 control-label">Highlights</label>
                                                                            <div class="col-sm-8">
                                                                                <textarea type="text"
                                                                                    class="form-control" id="txt_high"
                                                                                    name="txt_high"
                                                                                    placeholder="Ex:"></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                </div>

                                                                <div class="row">

                                                                </div>
                                                                <br>

                                                                <!--submit button-->
                                                                <!-- <?php $this->load->view('template/btn_submit.php'); ?> -->
                                                                <button type="button" id="submitEmployeeForm"
                                                                    class="btn btn-primary">Submit</button>
                                                                <!--end submit-->

                                                            </form>
                                                        </div>
                                                        <br>

                                                        <div id="divmessage" class="">

                                                            <div id="spnmessage"> </div>
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div> <!-- .container-fluid -->
                        </div>
                        <!--Footer-->
                        <?php $this->load->view('template/footer.php'); ?>
                        <!--End Footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Load site level scripts -->

    <?php $this->load->view('template/js.php'); ?> <!-- Initialize scripts for this page-->


    <!-- Initialize scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/plugins/form-jasnyupload/fileinput.min.js"></script>
    <!-- End loading page level scripts-->
    <!-- End loading page level scripts-->
    <!--Ajax-->
    <!--<script src="<?php echo base_url(); ?>system_js/Master/Employee.js"></script>-->

    <script>
        document.getElementById('txt_cmp_no').addEventListener('input', function (e) {
            this.value = this.value.replace(/\s/g, '');
        });
    </script>

    <script>
        $("#frm_employee").validate({
            rules: {
                cmb_emp_title: "required",
                cmb_gender: "required",
                img_employee: "required",
                bankName: "required",
                txt_account: "required",
                txt_address: "required",
                txt_city: "required",
                cmb_district: "required",
                txt_email: {
                    required: true,
                    email: true
                },
                cmb_if_epf: "required",
            },
            messages: {
                cmb_emp_title: "Please select a title",
                cmb_gender: "Please select gender",
                img_employee: "Please upload an image"
            }
        });


        $('#txt_appoint_date').datepicker({
            format: "dd/mm/yyyy",
            "todayHighlight": true,
            autoclose: true,
            format: 'yyyy/mm/dd'
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $('#txt_permanent_date').datepicker({
            format: "dd/mm/yyyy",
            "todayHighlight": true,
            autoclose: true,
            format: 'yyyy/mm/dd'
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $('#txt_dob').datepicker({
            format: "dd/mm/yyyy",
            "todayHighlight": true,
            autoclose: true,
            format: 'yyyy/mm/dd'
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });
    </script>


    <script>
        $(document).ready(function () {
            $("#img_employee").on('change', function () {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });
        });
    </script>


    <!--JQuary Validation-->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#frm_employee").validate();
            $("#spnmessage").hide("shake", {
                times: 5
            }, 3500);
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {


            //the min chars for username
            var min_chars = 3;

            //result texts
            var characters_error = 'Minimum amount of chars is 3';
            var checking_html = 'Checking...';

            //when button is clicked
            $('#check_username_availability').click(function () {
                //run the character number check
                if ($('#txt_emp_no').val().length < min_chars) {
                    //if it's bellow the minimum show characters_error text '
                    $('#username_availability_result').html(characters_error);
                } else {
                    //else show the cheking_text and run the function to check
                    $('#username_availability_result').html(checking_html);
                    check_availability();
                }
            });

        });

        //function to check username availability
        function check_availability() {

            //get the username
            var username = $('#txt_emp_no').val();

            //use ajax to run the check
            $.post(baseurl + "Employee_Management/ADD_Employees/check_emp", {
                EmpNo: username
            },
                function (result) {
                    //if the result is 1
                    if (result == 1) {
                        //show that the username is available
                        $('#username_availability_result').html(username + ' is Available');
                    } else {
                        //show that the username is NOT available
                        $('#username_availability_result').html(username + ' is not Available');
                    }
                });

        }
    </script>

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

        document.getElementById("cmb_percentage").addEventListener("change", function () {
            var departmentDiv1 = document.getElementById("departmentDiv1");

            // Check if "Common" is selected
            if (this.value === "Common") {
                departmentDiv1.style.display = "block";  // Show the department div
            } else {
                departmentDiv1.style.display = "none";  // Hide the department div
            }
        });

        // JavaScript to handle adding the department and percentage to the table
        document.getElementById("btn_add_department").addEventListener("click", function () {
            var departmentSelect = document.getElementById("cmb_dep1"); // Ensure this ID matches your department select input
            var percentageSelect = document.getElementById("cmb_percentage");

            var departmentId = departmentSelect.value;
            var departmentName = departmentSelect.options[departmentSelect.selectedIndex].text;
            var percentage = percentageSelect.value;

            // Check if both department and percentage are selected
            if (departmentId !== "") {
                var table = document.getElementById("departmentTable").getElementsByTagName('tbody')[0];

                // Create a new row and populate it with the department name and percentage
                var newRow = table.insertRow();
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);

                // Add department name to the first column
                cell1.innerHTML = departmentName;

                // Add an input field to the second column for percentage, pre-filled with the selected percentage
                cell2.innerHTML = `<input type="text" class="form-control" value="" />`;

                // Add an action button to the third column (remove button)
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

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            let selectedQualifications = [];

            const qualificationLabels = {
                'O/L': 'O/L (Ordinary Level)',
                'A/L': 'A/L (Advanced Level)',
                'Diploma': 'Diploma',
                'HND': 'Higher National Diploma (HND)',
                'Degree': 'Degree',
                'Master': 'Master',
                'MPhil': 'Master of Philosophy (MPhil)',
                'PhD    ': 'Doctor of Philosophy (PhD)'
            };

            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('employeeForm');
                const submitBtn = document.getElementById('submitEmployeeForm');

                // ✅ Automatically insert error messages for all required fields
                const requiredFields = document.querySelectorAll('input[required], select[required], textarea[required]');
                requiredFields.forEach(field => {
                    const errorP = document.createElement('p');
                    errorP.className = 'text-danger error-message';
                    errorP.textContent = 'This field is required!';
                    errorP.style.display = 'none';

                    if (field.id) {
                        errorP.id = 'error_' + field.id;
                    }

                    field.insertAdjacentElement('afterend', errorP);
                });

                // Qualification Add Handler
                document.getElementById('addQualification').addEventListener('click', function () {
                    const selectElement = document.getElementById('qualificationSelect');
                    const selectedValue = selectElement.value;
                    const selectedText = selectElement.options[selectElement.selectedIndex].text;
                    const notes = document.getElementById('notesInput').value.trim();

                    if (!selectedValue) return;

                    if (selectedQualifications.some(q => q.qualification === selectedValue)) return;

                    const qualificationData = {
                        qualification: selectedValue,
                        qualificationText: selectedText,
                        notes: notes
                    };

                    selectedQualifications.push(qualificationData);
                    addToTable(qualificationData);
                    clearFormFields();
                    document.getElementById('emptyRow').style.display = 'none';

                    // Hide qualification error if previously shown
                    const qualError = document.getElementById('qualification_error');
                    if (qualError) qualError.style.display = 'none';
                });

                // ✅ Submit Handler
                submitBtn.addEventListener('click', function () {
                    const formData = new FormData(form);
                    let isValid = true;

                    // Validate required fields
                    requiredFields.forEach(field => {
                        const value = (field.type === 'file') ? field.files.length : field.value.trim();
                        const errorElement = document.getElementById(`error_${field.id}`);

                        if (!value) {
                            isValid = false;
                            if (errorElement) errorElement.style.display = 'block';
                        } else {
                            if (errorElement) errorElement.style.display = 'none';
                        }
                    });

                    // Validate qualifications
                    const qualError = document.getElementById('qualification_error');
                    if (selectedQualifications.length === 0) {
                        isValid = false;
                        if (qualError) qualError.style.display = 'block';
                    } else {
                        if (qualError) qualError.style.display = 'none';
                    }

                    if (!isValid) return;

                    // Append image
                    const imageInput = document.getElementById('img_employee');
                    formData.append('img_employee', imageInput.files[0]);

                    // Append qualifications
                    selectedQualifications.forEach((data, index) => {
                        formData.append(`qualifications[${index}][qualification]`, data.qualification);
                        formData.append(`qualifications[${index}][notes]`, data.notes || '');
                    });

                    console.log(formData);
                    
                    // Submit via fetch
                    fetch('<?php echo base_url(); ?>Employee_Management/ADD_Employees/insert_Data', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(result => {
                            console.log('Server Response:', result);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Form submitted successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });

                            window.location.href = '<?php echo base_url(); ?>Employee_Management/ADD_Employees'; // Redirect to the same page or another page
                            // alert('Form submitted successfully!');
                            // form.reset(); // Optional
                        })
                        .catch(error => {
                            console.error('Form submission error:', error);
                            alert('An error occurred while submitting the form.');
                        });
                });
            });

            // Reusable functions
            function addToTable(data) {
                const tableBody = document.getElementById('qualificationTableBody');
                const row = document.createElement('tr');
                const index = selectedQualifications.length - 1;
                row.id = 'row_' + index;

                row.innerHTML = `
        <td>${data.qualificationText}</td>
        <td>${data.notes || '-'}</td>
        <td>
            <button type="button" class="btn btn-sm btn-danger" onclick="removeQualification(${index})">
                Remove
            </button>
        </td>
    `;

                tableBody.appendChild(row);
            }

            function removeQualification(index) {
                selectedQualifications.splice(index, 1);
                rebuildTable();
                if (selectedQualifications.length === 0) {
                    document.getElementById('emptyRow').style.display = 'table-row';
                }
            }

            function rebuildTable() {
                const tableBody = document.getElementById('qualificationTableBody');
                tableBody.innerHTML = `
        <tr id="emptyRow" style="display: ${selectedQualifications.length === 0 ? 'table-row' : 'none'}">
            <td colspan="3" class="text-center text-muted">No qualifications added</td>
        </tr>
    `;

                selectedQualifications.forEach((data, index) => {
                    const row = document.createElement('tr');
                    row.id = 'row_' + index;

                    row.innerHTML = `
            <td>${data.qualificationText}</td>
            <td>${data.notes || '-'}</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" onclick="removeQualification(${index})">
                    Remove
                </button>
            </td>
        `;

                    tableBody.appendChild(row);
                });
            }

            function clearFormFields() {
                document.getElementById('qualificationSelect').value = '';
                document.getElementById('notesInput').value = '';
            }

        </script>

</body>


</html>