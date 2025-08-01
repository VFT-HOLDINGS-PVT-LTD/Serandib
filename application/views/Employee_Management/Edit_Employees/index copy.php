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
                        <!--                            <ol class="breadcrumb">
                            
                                                            <li class=""><a href="#">HOME</a></li>
                                                            <li class="active"><a href="#">EMPLOYEES</a></li>
                            
                                                        </ol>-->


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


                                            <div class="panel ">
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
                                                            <form class="form-horizontal" id="frm_employee_update"
                                                                name="frm_employee_update"
                                                                action="<?php echo base_url(); ?>Employee_Management/Edit_Employees/update_emp"
                                                                method="POST" enctype="multipart/form-data">

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
                                                                            No</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control"
                                                                                value="<?php echo $data_set[0]->EmpNo ?>"
                                                                                id="txt_emp_no" name="txt_emp_no"
                                                                                placeholder="Ex: 00001">
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Enroll
                                                                            No</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control"
                                                                                value="<?php echo $data_set[0]->Enroll_No ?>"
                                                                                id="txt_enroll_no" name="txt_enroll_no"
                                                                                placeholder="Ex: 1">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Company No
                                                                        </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_cmp_no" name="txt_cmp_no"
                                                                                value="<?php echo $data_set[0]->Cmp_ID ?>"
                                                                                placeholder="Ex: 00001" disabled>

                                                                            <input type="text" class="form-control"
                                                                                name="txt_cmp_no"
                                                                                value="<?php echo $data_set[0]->Cmp_ID ?>"
                                                                                placeholder="Ex: 00001"
                                                                                style="display: none;">

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">EPF
                                                                            No</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $data_set[0]->EPFNO ?>"
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


                                                                                <?php
                                                                                foreach ($data_epf as $t_data) {
                                                                                    if ($t_data->EPF_CAT == $data_set[0]->EPF_CAT) {
                                                                                        echo "<option selected value='" . $t_data->EPF_CAT . "'>" . $t_data->EPF_CAT_Name . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->EPF_CAT . "'>" . $t_data->EPF_CAT_Name . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Employee
                                                                            Status</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_emp_status"
                                                                                name="cmb_emp_status">


                                                                                <option value="" default>-- Select --
                                                                                </option>


                                                                                <?php
                                                                                foreach ($data_status as $t_data) {
                                                                                    if ($t_data->EMP_ST_ID == $data_set[0]->EMP_ST_ID) {
                                                                                        echo "<option selected value='" . $t_data->EMP_ST_ID . "'>" . $t_data->EMP_ST_Name . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->EMP_ST_ID . "'>" . $t_data->EMP_ST_Name . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">EPF
                                                                            Liable</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" id="cmb_if_epf"
                                                                                name="cmb_if_epf">
                                                                                <option
                                                                                    value="<?php echo $data_set[0]->Is_EPF ?>">

                                                                                    <?php
                                                                                    if ($data_set[0]->Is_EPF == 0) {
                                                                                        $En = "No";
                                                                                    } elseif ($data_set[0]->Is_EPF == 1) {
                                                                                        $En = "Yes";
                                                                                    }

                                                                                    echo $En;
                                                                                    ?>
                                                                                </option>
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
                                                                                value="<?php echo $data_set[0]->OCP_Code ?>"
                                                                                id="txt_ocp_code" name="txt_ocp_code"
                                                                                placeholder="Ex: 15">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Title</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control"
                                                                                id="cmb_emp_title" name="cmb_emp_title">
                                                                                <option
                                                                                    value="<?php echo $data_set[0]->Title ?>">
                                                                                    <?php echo $data_set[0]->Title ?>
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
                                                                            Name</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $data_set[0]->Emp_Full_Name ?>"
                                                                                id="txt_emp_name" name="txt_emp_name"
                                                                                required=""
                                                                                placeholder="Ex: Ashan Rathsara">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Name With
                                                                            Initials</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $data_set[0]->Emp_Name_Int ?>"
                                                                                id="txt_emp_name_init"
                                                                                name="txt_emp_name_init" required=""
                                                                                placeholder="Ex: L.A.R">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">

                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Image</label>
                                                                        <div class="col-sm-6">
                                                                            <div class="fileinput fileinput-new"
                                                                                style="width: 100%;"
                                                                                data-provides="fileinput">
                                                                                <div class="fileinput-preview thumbnail mb20"
                                                                                    data-trigger="fileinput"
                                                                                    style="width: 100%; height: 150px;">
                                                                                    <img
                                                                                        src="<?php echo base_url() . 'assets/images/Employees/' . $data_set[0]->Image ?>">
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

                                                                        <input type="text" name="img_Data"
                                                                            value="<?php echo $data_set[0]->Image ?>"
                                                                            style="display: none;">


                                                                    </div>


                                                                </div>

                                                                <div class="form-group col-md-12">

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Gender</label>
                                                                        <div class="col-sm-8">
                                                                            <select required="" class="form-control"
                                                                                id="cmb_gender" name="cmb_gender">
                                                                                <option
                                                                                    value="<?php echo $data_set[0]->Gender ?>">
                                                                                    <?php echo $data_set[0]->Gender ?>
                                                                                </option>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6 ">
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

                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Designation</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" required=""
                                                                                id="cmb_desig" name="cmb_desig">




                                                                                <?php
                                                                                foreach ($data_DS as $t_data) {
                                                                                    if ($t_data->Des_ID == $data_set[0]->Des_ID) {
                                                                                        echo "<option selected value='" . $t_data->Des_ID . "'>" . $t_data->Desig_Name . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->Des_ID . "'>" . $t_data->Desig_Name . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>



                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Department</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" required=""
                                                                                id="cmb_dep" name="cmb_dep">


                                                                                <?php
                                                                                foreach ($data_DP as $t_data) {
                                                                                    if ($t_data->Dep_ID == $data_set[0]->Dep_ID) {
                                                                                        echo "<option selected value='" . $t_data->Dep_ID . "'>" . $t_data->Dep_Name . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->Dep_ID . "'>" . $t_data->Dep_Name . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Sub
                                                                            Department</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" required=""
                                                                                id="cmb_group" name="cmb_group">

                                                                                <?php
                                                                                foreach ($data_Grp as $t_data) {
                                                                                    if ($t_data->Grp_ID == $data_set[0]->Grp_ID) {
                                                                                        echo "<option selected value='" . $t_data->Grp_ID . "'>" . $t_data->EmpGroupName . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->Grp_ID . "'>" . $t_data->EmpGroupName . "</option>";
                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
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

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Branch</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" id="cmb_branch"
                                                                                name="cmb_branch">



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
                                                                            class="col-sm-4 control-label">Appoint
                                                                            Date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $data_set[0]->ApointDate ?>"
                                                                                id="txt_appoint_date"
                                                                                name="txt_appoint_date" required=""
                                                                                placeholder="Ex: 35500">
                                                                        </div>

                                                                    </div>


                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Permanent
                                                                            Date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txt_permanent_date"
                                                                                value="<?php echo $data_set[0]->Permanent_Date ?>"
                                                                                name="txt_permanent_date"
                                                                                placeholder="Select Date">
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="tab-pane" id="vertical-form">

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
                                                                                value="<?php echo $data_set[0]->Basic_Salary ?>"
                                                                                id="txt_basic_sal" name="txt_basic_sal"
                                                                                placeholder="Ex: 35500">
                                                                        </div>

                                                                    </div>



                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Incentive</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $data_set[0]->Incentive ?>"
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
                                                                                value="<?php echo $data_set[0]->BR1 ?>"
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
                                                                                value="<?php echo $data_set[0]->BR2 ?>"
                                                                                id="txt_BG_Allowance"
                                                                                name="txt_BG_Allowance2"
                                                                                placeholder="Ex: 5500">
                                                                        </div>

                                                                    </div>




                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Bank</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control" id="cmb_bank"
                                                                                name="cmb_bank">

                                                                                <?php
                                                                                foreach ($data_bank as $t_data) {
                                                                                    if ($t_data->Bnk_ID == $data_set[0]->Bnk_ID) {
                                                                                        echo "<option selected value='" . $t_data->Bnk_ID . "'>" . $t_data->bank_name . "</option>";
                                                                                    } else {
                                                                                        echo "<option value='" . $t_data->Bnk_ID . "'>" . $t_data->bank_name . "</option>";
                                                                                    }
                                                                                }
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
                                                                                value="<?php echo $data_set[0]->Bnk_Br_ID ?>"
                                                                                id="txt_B_Branch" name="txt_B_Branch"
                                                                                placeholder="Ex: 023">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="focusedinput"
                                                                            class="col-sm-4 control-label">Account
                                                                            No</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $data_set[0]->Account_no ?>"
                                                                                id="txt_account" name="txt_account"
                                                                                placeholder="Ex: 112457854">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-6 icheck-flat">
                                                                        <label for="cmb_percentage"
                                                                            class="col-sm-4 control-label">
                                                                            Select Payment Percentage <span
                                                                                style="color: red;">*</span>
                                                                        </label>
                                                                        <?php
$paymentType = isset($data_set[0]->Advance_Payroll_Data) ? $data_set[0]->Advance_Payroll_Data : '';
?>

<!-- Payment Type Dropdown -->
<select class="form-control" id="cmb_percentage" name="cmb_percentage" required>
    <option value="">-- Select Percentage --</option>
    <option value="1" <?= $paymentType == '1' ? 'selected' : '' ?>>Common</option>
    <option value="2" <?= $paymentType == '0' ? 'selected' : '' ?>>Directly</option>
</select>


                                                                    </div>

                                                                    <div class="tab-pane" id="vertical-form">

                                                                        <label
                                                                            style="font-weight: bold; color: #000; display: none;"
                                                                            id="verticalform1">Advance
                                                                            Payroll
                                                                            Details</label>
                                                                        <hr>

                                                                       <div class="tab-pane" id="vertical-form">

    <label style="font-weight: bold; color: #000;" id="verticalform1">Advance Payroll Details</label>
    <hr>

    <!-- Department Dropdown -->
    <div class="form-group col-sm-6" id="departmentDiv">
        <label for="cmb_dep1" class="col-sm-4 control-label">Department</label>
        <div class="col-sm-7">
            <select class="form-control" id="cmb_dep1" name="cmb_dep1">
                <option value="">-- Select --</option>
                <?php foreach ($data_dep as $t_data): ?>
                    <option value="<?= $t_data->Dep_ID ?>"><?= $t_data->Dep_Name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="button" class="btn btn-success col-2" id="btn_add_department">Add</button>
    </div>

    <!-- Departments Table -->
    <div id="departmentDiv1" class="form-group col-sm-8">
        <table class="table table-bordered" id="departmentTable">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Sub Department</th>
                    <th>Percentage</th>
                    <th>Remove</th>
                    <th>Add</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($advance_payroll_data as $row): ?>
                    <?php if ($row->IsSubDept == 0): ?>
                        <!-- Department Row -->
                        <tr class="department-row" data-dep-id="<?= $row->Department_ID ?>">
                            <td><strong><?= $row->Department ?></strong></td>
                            <td></td>
                            <td>
                                <input type="number" min="0" max="100" step="0.01" class="form-control percentage-input dept-percentage" value="<?= $row->Percentage ?>" />
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-department">Remove</button>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm add-subdepartment">Add</button>
                            </td>
                        </tr>
                        <!-- Sub-departments rows under this department -->
                        <?php foreach ($advance_payroll_data as $sub): ?>
                            <?php if ($sub->IsSubDept == 1 && $sub->Parent_Department_ID == $row->Department_ID): ?>
                                <tr class="subdepartment-row" data-parent-dep-id="<?= $row->Department_ID ?>">
                                    <td style="padding-left: 30px;">↳ Sub Dept.</td>
                                    <td>
                                        <input type="text" class="form-control subdept-name" placeholder="Search by ID or Name" value="<?= $sub->SubDepartment ?>" />
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="100" step="0.01" class="form-control percentage-input subdept-percentage" value="<?= $sub->Percentage ?>" />
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm remove-subdepartment">Remove</button>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Total Percentage Display -->
    <div class="form-group col-sm-4" style="position: relative;">
        <div id="braceContainer" style="position: absolute; right: -150px; top: 0; height: 100%; pointer-events: none;">
            <svg viewBox="0 0 60 200" width="60" height="200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <style>
                    .brace-line {
                        stroke: rgba(69, 90, 100, 0.87);
                        stroke-width: 3;
                        fill: none;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                    }
                </style>
                <line class="brace-line" x1="10" y1="15" x2="45" y2="15" />
                <line class="brace-line" x1="45" y1="15" x2="45" y2="185" />
                <line class="brace-line" x1="10" y1="185" x2="45" y2="185" />
            </svg>
            <div class="total-box" style="position: absolute; left: 65px; top: 50%; transform: translateY(-50%); font-size: 18px; font-weight: bold; color: #000; pointer-events: none;">
                Department Total: <span id="totalPercentage" style="color: green;">0.00%</span>
            </div>
        </div>
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
                                                                                    Address</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->Address ?>"
                                                                                        id="txt_address"
                                                                                        name="txt_address"
                                                                                        placeholder="Ex: No: 123, Street, City">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">City</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->City ?>"
                                                                                        id="txt_city" name="txt_city"
                                                                                        placeholder="Ex: No: 123, Street, City">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">District</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        id="cmb_district"
                                                                                        name="cmb_district">

                                                                                        <option
                                                                                            value="<?php echo $data_set[0]->District ?>">
                                                                                            <?php echo $data_set[0]->District ?>
                                                                                        </option>
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
                                                                                        <option value="Galle">Galle
                                                                                        </option>
                                                                                        <option value="Gampaha">Gampaha
                                                                                        </option>
                                                                                        <option value="Hambantota">
                                                                                            Hambantota</option>
                                                                                        <option value="Jaffna">Jaffna
                                                                                        </option>
                                                                                        <option value="Kalutara">
                                                                                            Kalutara
                                                                                        </option>
                                                                                        <option value="Kegalle">Kegalle
                                                                                        </option>
                                                                                        <option value="Kilinochchi">
                                                                                            Kilinochchi</option>
                                                                                        <option value="Kurunegala">
                                                                                            Kurunegala</option>
                                                                                        <option value="Kandy">Kandy
                                                                                        </option>
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
                                                                                        <option value="Puttalam">
                                                                                            Puttalam
                                                                                        </option>
                                                                                        <option value="Ratnapura">
                                                                                            Ratnapura
                                                                                        </option>
                                                                                        <option value="Trincomalee">
                                                                                            Trincomalee</option>
                                                                                        <option value="Vavuniya">
                                                                                            Vavuniya
                                                                                        </option>

                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Temp
                                                                                    Full
                                                                                    Address</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_tmp_address"
                                                                                        name="txt_tmp_address"
                                                                                        placeholder="Ex: No: 123, Street, City"
                                                                                        value="<?php echo $data_set[0]->Temp_Address ?>">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Temp
                                                                                    City</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_tmp_city"
                                                                                        name="txt_tmp_city"
                                                                                        placeholder="Ex: No: 123, Street, City"
                                                                                        value="<?php echo $data_set[0]->Temp_City ?>">
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

                                                                                        <option
                                                                                            value="<?php echo $data_set[0]->Temp_District ?>">
                                                                                            <?php echo $data_set[0]->Temp_District ?>
                                                                                        </option>
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
                                                                                        <option value="Galle">Galle
                                                                                        </option>
                                                                                        <option value="Gampaha">Gampaha
                                                                                        </option>
                                                                                        <option value="Hambantota">
                                                                                            Hambantota</option>
                                                                                        <option value="Jaffna">Jaffna
                                                                                        </option>
                                                                                        <option value="Kalutara">
                                                                                            Kalutara
                                                                                        </option>
                                                                                        <option value="Kegalle">Kegalle
                                                                                        </option>
                                                                                        <option value="Kilinochchi">
                                                                                            Kilinochchi</option>
                                                                                        <option value="Kurunegala">
                                                                                            Kurunegala</option>
                                                                                        <option value="Kandy">Kandy
                                                                                        </option>
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
                                                                                        <option value="Puttalam">
                                                                                            Puttalam
                                                                                        </option>
                                                                                        <option value="Ratnapura">
                                                                                            Ratnapura
                                                                                        </option>
                                                                                        <option value="Trincomalee">
                                                                                            Trincomalee</option>
                                                                                        <option value="Vavuniya">
                                                                                            Vavuniya
                                                                                        </option>

                                                                                    </select>
                                                                                </div>

                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Contact
                                                                                    No (Home)</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->Tel_home ?>"
                                                                                        id="txt_cont_home"
                                                                                        name="txt_cont_home"
                                                                                        placeholder="Ex: 0112 234 567">
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Contact
                                                                                    No (Mobile)</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->Tel_mobile ?>"
                                                                                        id="txt_cont_mobile"
                                                                                        name="txt_cont_mobile"
                                                                                        placeholder="Ex: 071 733 8110">
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Email</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->E_mail ?>"
                                                                                        id="txt_email" name="txt_email"
                                                                                        placeholder="Ex: ashan.rathsara@gmail.com">
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Driving
                                                                                    Licence No</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_dLicence"
                                                                                        name="txt_dLicence"
                                                                                        placeholder="B1234567"
                                                                                        value="<?php echo $data_set[0]->Driving_Licence_No ?>">
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group col-md-12">

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">NIC</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" required=""
                                                                                        value="<?php echo $data_set[0]->NIC ?>"
                                                                                        class="form-control"
                                                                                        id="txt_nic" name="txt_nic"
                                                                                        placeholder="Ex: 923244786V">
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Passport
                                                                                    No</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        value="<?php echo $data_set[0]->Passport ?>"
                                                                                        class="form-control"
                                                                                        id="txt_passport"
                                                                                        name="txt_passport"
                                                                                        placeholder="Ex: 923244786">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Date
                                                                                    of
                                                                                    Birth</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->DOB ?>"
                                                                                        id="txt_dob" name="txt_dob">
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Blood
                                                                                    Group</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        id="cmb_blood" name="cmb_blood">

                                                                                        <option
                                                                                            value="<?php echo $data_set[0]->Blood_group ?>">
                                                                                            <?php echo $data_set[0]->Blood_group ?>
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
                                                                                    class="col-sm-4 control-label">Religion</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        id="cmb_religin"
                                                                                        name="cmb_religin">
                                                                                        <option
                                                                                            value="<?php echo $data_set[0]->Religion ?>">
                                                                                            <?php echo $data_set[0]->Religion ?>
                                                                                        </option>
                                                                                        <option value="Buddhist">
                                                                                            Buddhist
                                                                                        </option>
                                                                                        <option value="Hindu">Hindu
                                                                                        </option>
                                                                                        <option value="Islam">Islam
                                                                                        </option>
                                                                                        <option value="Christian">
                                                                                            Christian
                                                                                        </option>
                                                                                        <option value="Catholic">
                                                                                            Catholic
                                                                                        </option>
                                                                                        <option value="Other">Other
                                                                                        </option>

                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Civil
                                                                                    Status</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        id="cmb_civil_status"
                                                                                        name="cmb_civil_status">

                                                                                        <option
                                                                                            value="<?php echo $data_set[0]->Civil_status ?>">
                                                                                            <?php echo $data_set[0]->Civil_status ?>
                                                                                        </option>
                                                                                        <option value="SINGLE">SINGLE
                                                                                        </option>
                                                                                        <option value="MARRIED">MARRIED
                                                                                        </option>
                                                                                        <option value="DIVORCED">
                                                                                            DIVORCED
                                                                                        </option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>



                                                                    <div class="row">

                                                                    </div>

                                                                    <div class="tab-pane" id="bordered-row">

                                                                        <label
                                                                            style="font-weight: bold; color: #000">Family
                                                                            Details</label>
                                                                        <hr>
                                                                        <div class="form-horizontal">

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Relation's
                                                                                    Name</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->Relations_name ?>"
                                                                                        id="txt_rel_name"
                                                                                        name="txt_rel_name"
                                                                                        placeholder="Mr. Ashan Rathsara">
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Relation's
                                                                                    Contact No</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->Relations_Tel ?>"
                                                                                        id="txt_rel_cont"
                                                                                        name="txt_rel_cont"
                                                                                        placeholder="Mr. 071 111 222">
                                                                                </div>

                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">No of
                                                                                    Children</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="<?php echo $data_set[0]->No_Of_Child ?>"
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
                                                                                    Contact Name</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_emergency_name"
                                                                                        name="txt_emergency_name"
                                                                                        placeholder="Mr. Nimal Perera"
                                                                                        value="<?php echo $data_set[0]->Emergency_Contact_Name ?>">
                                                                                </div>

                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Emergency
                                                                                    Contact Telephone</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_emergency_tel"
                                                                                        name="txt_emergency_tel"
                                                                                        placeholder="071 111 222"
                                                                                        value="<?php echo $data_set[0]->Emergency_Contact_Telephone ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Emergency
                                                                                    Contact Address </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_emergency_address"
                                                                                        name="txt_emergency_address"
                                                                                        placeholder="Ex: No: 123, Street, City"
                                                                                        value="<?php echo $data_set[0]->Emergency_Contact_Address ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Emergency
                                                                                    Contact Relationship </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_emergency_relationship"
                                                                                        name="txt_emergency_relationship"
                                                                                        placeholder="Ex: Father"
                                                                                        value="<?php echo $data_set[0]->Emergency_Contact_Relationship ?>">
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane" id="bordered-row">

                                                                        <label
                                                                            style="font-weight: bold; color: #000">Bond
                                                                            Guarantor Details</label>
                                                                        <hr>

                                                                        <div class="form-group col-md-12">

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Guarantor's
                                                                                    name</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_bond_guarantor_name"
                                                                                        name="txt_bond_guarantor_name"
                                                                                        placeholder="Mr. Nimal Perera"
                                                                                        value="<?php echo $bond_data[0]->Name ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Address</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_bond_guarantor_address"
                                                                                        name="txt_bond_guarantor_address"
                                                                                        placeholder="Ex: No: 123, Street, City"
                                                                                        value="<?php echo $bond_data[0]->Address ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">NIC</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_bond_guarantor_nic"
                                                                                        name="txt_bond_guarantor_nic"
                                                                                        placeholder="Ex: 123456789V"
                                                                                        value="<?php echo $bond_data[0]->NIC ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Email</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_bond_guarantor_email"
                                                                                        name="txt_bond_guarantor_email"
                                                                                        placeholder="nimal@gmail.com"
                                                                                        value="<?php echo $bond_data[0]->Email ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Contact
                                                                                    No</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="txt_bond_guarantor_contact"
                                                                                        name="txt_bond_guarantor_contact"
                                                                                        placeholder="Ex: 071 111 222"
                                                                                        value="<?php echo $bond_data[0]->Contact ?>">
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
                                                                                                id="bond_guarantor_entitlement"
                                                                                                <?php if (!empty($bond_data[0]->BondEntitlement)) {
                                                                                                    echo 'checked';
                                                                                                }
                                                                                                ?>></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Bond
                                                                                    End
                                                                                    Date</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="bond_end_date"
                                                                                        placeholder="Select Date"
                                                                                        name="bond_end_date"
                                                                                        value="<?php echo $bond_data[0]->BondEndDate ?>">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane" id="bordered-row">

                                                                        <label
                                                                            style="font-weight: bold; color: #000">Non
                                                                            Related Referee 01</label>
                                                                        <hr>
                                                                        <div class="form-group col-md-12">

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Referee's
                                                                                    Name </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_name"
                                                                                        name="non_related_referee_name"
                                                                                        placeholder="Mr. Nimal Perera"
                                                                                        value="<?php echo $referee_data[0]->Referee_Name ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Designation
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_designation"
                                                                                        name="non_related_referee_designation"
                                                                                        placeholder="Manager"
                                                                                        value="<?php echo $referee_data[0]->Referee_Designation ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">NIC
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_nic"
                                                                                        name="non_related_referee_nic"
                                                                                        placeholder="9456565656v"
                                                                                        value="<?php echo $referee_data[0]->Referee_NIC ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Mobile
                                                                                    Number</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_contact"
                                                                                        name="non_related_referee_contact"
                                                                                        placeholder="071 111 222"
                                                                                        value="<?php echo $referee_data[0]->Referee_Contact ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Email</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_email"
                                                                                        name="non_related_referee_email"
                                                                                        placeholder="nimal@gmail.com"
                                                                                        value="<?php echo $referee_data[0]->Referee_Email ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Address
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_address"
                                                                                        name="non_related_referee_address"
                                                                                        placeholder="Ex: No: 123, Street, City"
                                                                                        value="<?php echo $referee_data[0]->Referee_Address ?>">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane" id="bordered-row">

                                                                        <label
                                                                            style="font-weight: bold; color: #000">Non
                                                                            Related Referee 02</label>
                                                                        <hr>

                                                                        <div class="form-group col-md-12">
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Referee's
                                                                                    Name </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_2_name"
                                                                                        name="non_related_referee_2_name"
                                                                                        placeholder="Mr.Nimal Perera"
                                                                                        value="<?php echo $referee_data[1]->Referee_Name ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Designation
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_2_designation"
                                                                                        name="non_related_referee_2_designation"
                                                                                        placeholder="Manager"
                                                                                        value="<?php echo $referee_data[1]->Referee_Designation ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">NIC
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_2_nic"
                                                                                        name="non_related_referee_2_nic"
                                                                                        placeholder="9456565656v"
                                                                                        value="<?php echo $referee_data[1]->Referee_NIC ?>">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Mobile
                                                                                    Number </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_2_contact"
                                                                                        name="non_related_referee_2_contact"
                                                                                        placeholder="071 111 222"
                                                                                        value="<?php echo $referee_data[1]->Referee_Contact ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Email</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_2_email"
                                                                                        name="non_related_referee_2_email"
                                                                                        placeholder="nimal@gmail.com"
                                                                                        value="<?php echo $referee_data[1]->Referee_Email ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Address
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="non_related_referee_2_address"
                                                                                        name="non_related_referee_2_address"
                                                                                        placeholder="Ex: No: 123, Street, City"
                                                                                        value="<?php echo $referee_data[1]->Referee_Address ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">

                                                                    </div>


                                                                    <div class="tab-pane" id="login">

                                                                        <label
                                                                            style="font-weight: bold; color: #000">Login
                                                                            Details</label>
                                                                        <hr>
                                                                        <div class="form-horizontal">

                                                                            <div class="form-group col-md-12">

                                                                                <div class="form-group col-sm-6">
                                                                                    <label for="focusedinput"
                                                                                        class="col-sm-4 control-label">User
                                                                                        Name</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text"
                                                                                            autocomplete="off"
                                                                                            class="form-control"
                                                                                            value="<?php echo $data_set[0]->username ?>"
                                                                                            id="txt_user_name"
                                                                                            name="txt_user_name"
                                                                                            placeholder="Ashan">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group col-md-6 ">
                                                                                    <label for="focusedinput"
                                                                                        class="col-sm-4 control-label">User
                                                                                        Level </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control"
                                                                                            id="cmb_user_level"
                                                                                            name="cmb_user_level">


                                                                                            <?php
                                                                                            foreach ($data_u_lvl as $t_data) {
                                                                                                if ($t_data->user_level_id == $data_set[0]->user_p_id) {
                                                                                                    echo "<option selected value='" . $t_data->user_level_id . "'>" . $t_data->user_level_name . "</option>";
                                                                                                } else {
                                                                                                    echo "<option value='" . $t_data->user_level_id . "'>" . $t_data->user_level_name . "</option>";
                                                                                                }
                                                                                            }
                                                                                            ?>

                                                                                        </select>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="form-group col-sm-6">
                                                                                    <div class="form-group icheck-flat">
                                                                                        <label
                                                                                            class="col-sm-4 control-label">Is
                                                                                            Allow Login</label>
                                                                                        <div
                                                                                            class="col-sm-8 icheck-flat">

                                                                                            <label
                                                                                                class="checkbox-inline icheck ">
                                                                                                <input type="checkbox"
                                                                                                    id="Is_Allow"
                                                                                                    name="Is_Allow"
                                                                                                    <?php if (!empty($data_set[0]->Is_allow_login)) {
                                                                                                        echo 'checked';
                                                                                                    }
                                                                                                    ?>>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Remarks</label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea type="text"
                                                                                        class="form-control"
                                                                                        id="txt_remarks"
                                                                                        name="txt_remarks"
                                                                                        placeholder="Ex: Remarks"><?php echo $data_set[0]->Remarks ?></textarea>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group col-sm-6">
                                                                                <label for="focusedinput"
                                                                                    class="col-sm-4 control-label">Highlights</label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea type="text"
                                                                                        class="form-control"
                                                                                        id="txt_high" name="txt_high"
                                                                                        placeholder="Ex:"><?php echo $data_set[0]->highlights ?></textarea>
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
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-sm-offset-2">
                                                                            <button
                                                                                style="background-color: #69bf53; padding: 5px 32px; font-size: 18px;"
                                                                                type="submit" id="submit" name="submit"
                                                                                class="btn-success  btn fa fa-check">&nbsp;&nbsp;SAVE</button>
                                                                            <!-- <button
                                                                            style="padding: 5px 32px; font-size: 18px;"
                                                                            type="submit" id="submit" name="submit"
                                                                            class="btn-primary  btn fa fa-check">&nbsp;&nbsp;APPROVE</button> -->
                                                                            <button
                                                                                style="padding: 5px 20px; font-size: 18px;"
                                                                                type="button" id="Cancel" name="Cancel"
                                                                                class="btn btn-danger-alt fa fa-times-circle">&nbsp;&nbsp;CANCEL</button>
                                                                        </div>
                                                                    </div>
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

    <?php $this->load->view('template/js.php'); ?>

    <!-- Initialize scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/plugins/form-jasnyupload/fileinput.min.js"></script>
    <!-- End loading page level scripts-->
    <!-- Initialize scripts for this page-->

    <!-- End loading page level scripts-->
    <!--Ajax-->
    <!--<script src="<?php echo base_url(); ?>system_js/Master/Employee.js"></script>-->

    <script>

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


        $('#bond_end_date').datepicker({
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
            $("#frm_employee_update").validate();
            $("#spnmessage").hide("shake", { times: 4 }, 5000);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Advance Payroll Details - Start -->
    <!-- <script>
        document.getElementById("cmb_percentage").addEventListener("change", function () {
            var departmentDiv = document.getElementById("departmentDiv");
            var departmentDiv1 = document.getElementById("departmentDiv1");
            var departmentDiv2 = document.getElementById("departmentDiv2"); // Make sure this ID matches
            var departmentDiv3 = document.getElementById("verticalform1"); // Make sure this ID matches


            if (this.value === "Common") {
                departmentDiv.style.display = "block";
                departmentDiv1.style.display = "block";
                departmentDiv2.style.display = "block";
                departmentDiv3.style.display = "block";
            } else {
                departmentDiv.style.display = "none";
                departmentDiv1.style.display = "none";
                departmentDiv2.style.display = "none"; // Hide when not "Common"
                departmentDiv3.style.display = "none";
            }
        });

        document.getElementById("btn_add_department").addEventListener("click", function () {
            var departmentSelect = document.getElementById("cmb_dep1");
            // var percentageSelect = document.getElementById("cmb_percentage");

            var departmentId = departmentSelect.value;
            var departmentName = departmentSelect.options[departmentSelect.selectedIndex]?.text || "";
            // var percentage = percentageSelect.value;
            var percentage = '';

            if (departmentId !== "") {
                var table = document.getElementById("departmentTable").getElementsByTagName('tbody')[0];

                // Check if the department already exists in the table
                var existingDepartments = Array.from(table.rows).map(row =>
                    row.cells[0].textContent.trim()
                );

                if (existingDepartments.includes(departmentName)) {
                    alert(`The department '${departmentName}' has already been added.`);
                    return; // Stop here, prevent duplicate
                }

                // Create new row
                var newRow = table.insertRow();

                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                var cell5 = newRow.insertCell(4);

                // cell1.innerHTML = departmentName;
                cell1.innerHTML = `<span class="department-name" data-id="${departmentId}">${departmentName}</span>`;
                cell2.innerHTML = "";
                cell3.innerHTML = `<input type="number" class="form-control" value="${percentage}" oninput="updateSubDeptPercentages(this); calculateTotalDepartmentPercentage(); scaleBraceToMatchTable();" />`;
                cell4.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>';
                cell5.innerHTML = '<button type="button" class="btn btn-primary" onclick="AddRow(this)">Add</button>';

                // Reset selects
                departmentSelect.value = "";
                percentageSelect.value = "";

                calculateTotalDepartmentPercentage();
                scaleBraceToMatchTable();
            } else {
                alert("Please select both department and percentage!");
            }
        });

        function removeRow(button) {
            const row = button.closest('tr');
            const tableBody = row.parentNode;
            const rows = Array.from(tableBody.rows);
            const rowIndex = rows.indexOf(row);

            // Step 1: Remove the main department row
            tableBody.deleteRow(rowIndex);

            // Step 2: Remove all sub-department rows and the status row
            let i = rowIndex;
            while (i < tableBody.rows.length) {
                const currentRow = tableBody.rows[i];
                if (currentRow.classList.contains('sub-department-row') || currentRow.classList.contains('sub-dept-status-row')) {
                    tableBody.deleteRow(i); // don't increment i, rows shift up
                } else {
                    break; // stop once we hit the next main department
                }
            }

            scaleBraceToMatchTable();
        }

        function AddRow(button) {
            const currentRow = button.closest('tr');
            const tableBody = currentRow.parentNode;
            const rows = Array.from(tableBody.rows);
            const rowIndexInTbody = rows.indexOf(currentRow);

            const mainPercentageInput = currentRow.cells[2].querySelector('input');
            const mainPercentage = parseFloat(mainPercentageInput?.value || 0);

            if (mainPercentage === 0 || isNaN(mainPercentage)) {
                alert("Please enter a valid percentage for the main department before adding sub-departments.");
                return;
            }

            let subDeptCount = 0;
            for (let i = rowIndexInTbody + 1; i < rows.length; i++) {
                if (rows[i].classList.contains('sub-department-row')) {
                    subDeptCount++;
                } else {
                    break;
                }
            }

            const newSubDeptCount = subDeptCount + 1;

            // Accurate share distribution
            let baseShare = Math.floor((mainPercentage / newSubDeptCount) * 100) / 100;
            let totalBase = baseShare * newSubDeptCount;
            let remainder = +(mainPercentage - totalBase).toFixed(2);
            let shares = Array(newSubDeptCount).fill(baseShare);
            for (let i = 0; i < newSubDeptCount && remainder > 0; i++) {
                shares[i] = +(shares[i] + 0.01).toFixed(2);
                remainder = +(remainder - 0.01).toFixed(2);
            }

            // Update existing sub-dept percentages
            for (let i = rowIndexInTbody + 1, count = 0; count < subDeptCount; i++, count++) {
                const percentInput = rows[i].cells[2].querySelector('input');
                if (percentInput) percentInput.value = shares[count];
            }

            // Insert new sub-dept row with last share
            const newRow = tableBody.insertRow(rowIndexInTbody + 1 + subDeptCount);
            newRow.classList.add('sub-department-row');

            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);
            const cell4 = newRow.insertCell(3);
            const cell5 = newRow.insertCell(4);

            const subDeptId = 'sub_dept_' + Date.now();
            const hiddenId = 'cmb_Supervisor_' + Date.now();

            cell1.innerHTML = `<span class="sub-arrow">↳</span> <span class="sub-department-label">Sub Dept.</span>`;

            cell2.innerHTML = `
                <div class="col-sm-8 new-search-col">
                    <label for="${subDeptId}" class="new-input-label hidden">Group Supervisor</label>
                    <input type="text" class="form-control new-input-control" name="${subDeptId}" id="${subDeptId}" placeholder="Search by ID or Name">
                    <input type="hidden" name="${hiddenId}" id="${hiddenId}">
                </div>
            `;

            const percentId = 'sub_percent_' + Date.now();
            const share = shares[subDeptCount]; // last one for the new row

            cell3.innerHTML = `
                <input type="number" class="form-control form-control-sm sub-percent"
                    name="${percentId}" id="${percentId}"
                    placeholder="Percentage" value="${share}"
                    oninput="validateSubPercentages(this)">
            `;

            cell4.innerHTML = `
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeRow2(this)">
                    <i class="bi bi-x-lg"></i> Remove
                </button>
            `;

            cell5.innerHTML = '<span class="percent-error" style="color: red; display: none;"></span>';

            mainPercentageInput.setAttribute("oninput", "updateSubDeptPercentages(this); calculateTotalDepartmentPercentage(); scaleBraceToMatchTable();");

            setTimeout(function () {
                $("#" + subDeptId).autocomplete({
                    source: "<?php echo base_url(); ?>Employee_Management/ADD_Employees/get_emp_no_and_name",
                    minLength: 1,
                    select: function (event, ui) {
                        $("#" + hiddenId).val(ui.item.value);
                        $("#" + subDeptId).val(ui.item.value + ' - ' + ui.item.label);
                        return false;
                    }
                }).autocomplete("instance")._renderItem = function (ul, item) {
                    return $("<li>")
                        .append("<div>" + item.value + " - " + item.label + "</div>")
                        .appendTo(ul);
                };
            }, 100);

            scaleBraceToMatchTable();
        }

        function removeRow2(button) {
            const row = button.closest('tr');
            const tableBody = row.parentNode;
            const rows = Array.from(tableBody.rows);
            const rowIndex = rows.indexOf(row);

            // Step 1: Remove this sub-department row
            tableBody.deleteRow(rowIndex);

            // Step 2: Find main department row
            let mainRow = null;
            let mainRowIndex = -1;
            for (let i = rowIndex - 1; i >= 0; i--) {
                if (!rows[i].classList.contains('sub-department-row') && !rows[i].classList.contains('sub-dept-status-row')) {
                    mainRow = rows[i];
                    mainRowIndex = i;
                    break;
                }
            }
            if (!mainRow) return;

            const mainPercentageInput = mainRow.cells[2].querySelector('input');
            const mainPercentage = parseFloat(mainPercentageInput?.value || 0);
            if (isNaN(mainPercentage)) return;

            // Step 3: Collect all sub-department rows under this main department (after deletion)
            const updatedRows = Array.from(tableBody.rows); // refresh after deletion
            let subDeptRows = [];
            for (let i = mainRowIndex + 1; i < updatedRows.length; i++) {
                if (updatedRows[i].classList.contains('sub-department-row')) {
                    subDeptRows.push(updatedRows[i]);
                } else {
                    break;
                }
            }

            const subCount = subDeptRows.length;
            if (subCount === 0) return;

            // Step 4: Recalculate accurate percentage shares
            let baseShare = Math.floor((mainPercentage / subCount) * 100) / 100;
            let totalBase = baseShare * subCount;
            let remainder = +(mainPercentage - totalBase).toFixed(2);
            let shares = Array(subCount).fill(baseShare);
            for (let i = 0; i < subCount && remainder > 0; i++) {
                shares[i] = +(shares[i] + 0.01).toFixed(2);
                remainder = +(remainder - 0.01).toFixed(2);
            }

            // Step 5: Update sub-department inputs with new values
            for (let i = 0; i < subCount; i++) {
                const input = subDeptRows[i].cells[2].querySelector('input');
                if (input) input.value = shares[i];
            }

            // Step 6: Trigger validation
            const firstInput = subDeptRows[0]?.cells[2]?.querySelector('input');
            if (firstInput) validateSubPercentages(firstInput);

            scaleBraceToMatchTable();
        }

        function updateSubDeptPercentages(input) {
            const currentRow = input.closest('tr');
            const tableBody = currentRow.parentNode;
            const rows = Array.from(tableBody.rows);
            const rowIndex = rows.indexOf(currentRow);

            const newMainPercentage = parseFloat(input.value || 0);
            if (isNaN(newMainPercentage) || newMainPercentage <= 0) return;

            let subDeptRows = [];
            for (let i = rowIndex + 1; i < rows.length; i++) {
                if (rows[i].classList.contains('sub-department-row')) {
                    subDeptRows.push(rows[i]);
                } else {
                    break;
                }
            }

            const subCount = subDeptRows.length;
            if (subCount === 0) return;

            // Accurate share distribution
            let baseShare = Math.floor((newMainPercentage / subCount) * 100) / 100;
            let totalBase = baseShare * subCount;
            let remainder = +(newMainPercentage - totalBase).toFixed(2);
            let shares = Array(subCount).fill(baseShare);
            for (let i = 0; i < subCount && remainder > 0; i++) {
                shares[i] = +(shares[i] + 0.01).toFixed(2);
                remainder = +(remainder - 0.01).toFixed(2);
            }

            for (let i = 0; i < subCount; i++) {
                const percentInput = subDeptRows[i].cells[2].querySelector('input');
                if (percentInput) percentInput.value = shares[i];
            }
        }

        function validateSubPercentages(input) {
            const currentRow = input.closest('tr');
            const tableBody = currentRow.parentNode;
            const rows = Array.from(tableBody.rows);
            const rowIndex = rows.indexOf(currentRow);

            // Step 1: Find main department row (above current)
            let mainRow = null;
            let mainRowIndex = -1;
            for (let i = rowIndex - 1; i >= 0; i--) {
                if (!rows[i].classList.contains('sub-department-row') && !rows[i].classList.contains('sub-dept-status-row')) {
                    mainRow = rows[i];
                    mainRowIndex = i;
                    break;
                }
            }
            if (!mainRow) return;

            const mainPercentageInput = mainRow.cells[2].querySelector('input');
            const mainPercentage = parseFloat(mainPercentageInput?.value || 0);
            if (isNaN(mainPercentage)) return;

            // Step 2: Collect all sub-department rows directly after main row
            let totalSubPercent = 0;
            let subDeptRows = [];
            let afterRowIndex = mainRowIndex + 1;
            for (let i = afterRowIndex; i < rows.length; i++) {
                if (rows[i].classList.contains('sub-department-row')) {
                    subDeptRows.push(rows[i]);
                    const subInput = rows[i].cells[2].querySelector('input');
                    totalSubPercent += parseFloat(subInput?.value || 0);
                } else {
                    break;
                }
            }

            const match = Math.abs(+totalSubPercent.toFixed(3) - +mainPercentage.toFixed(3)) <= 0.001;

            // Step 3: Remove any existing status row immediately after sub-departments
            const lastSubIndex = mainRowIndex + subDeptRows.length;
            if (rows[lastSubIndex + 1]?.classList.contains('sub-dept-status-row')) {
                tableBody.deleteRow(lastSubIndex + 1);
            }

            // Step 4: Insert new status row
            const messageRow = tableBody.insertRow(lastSubIndex + 1);
            messageRow.classList.add('sub-dept-status-row');

            const cell = messageRow.insertCell(0);
            cell.colSpan = 5;
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";
            cell.style.color = match ? "green" : "red";
            cell.textContent = match
                ? `✅ Sub-department total matches main department (${mainPercentage.toFixed(2)}%).`
                : `❌ Sub-department total (${totalSubPercent.toFixed(2)}%) does not match main department (${mainPercentage.toFixed(2)}%).`;

            // If matched, auto-hide row and message after 5 seconds
            if (match) {
                const row = cell.closest("tr"); // Adjust if your row element is different
                setTimeout(() => {
                    if (row) {
                        row.style.display = "none"; // hide the entire row
                    }
                }, 5000);
            }

        }

        function calculateTotalDepartmentPercentage() {
            const table = document.getElementById("departmentTable");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.rows);

            let total = 0;
            for (let i = 0; i < rows.length; i++) {
                if (!rows[i].classList.contains('sub-department-row')) {
                    const input = rows[i].cells[2]?.querySelector('input');
                    if (input) {
                        const val = parseFloat(input.value || 0);
                        if (!isNaN(val)) total += val;
                    }
                }
            }

            const display = document.getElementById("totalPercentage");
            display.textContent = total.toFixed(2) + "%";
            display.style.color = Math.abs(total - 100) <= 0.1 ? "green" : "red";
        }

        function scaleBraceToMatchTable() {
            const table = document.getElementById("departmentTable");
            const braceSVG = document.getElementById("braceSVG");

            if (table && braceSVG) {
                const tableHeight = table.offsetHeight;
                braceSVG.setAttribute("height", tableHeight); // adjust SVG height
            }
        }

        window.onload = function () {
            calculateTotalDepartmentPercentage();
            scaleBraceToMatchTable();
        };
    </script> -->
    <!-- Advance Payroll Details - End -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    function updateDepartmentTotal() {
        let total = 0;
        document.querySelectorAll('#departmentTable tbody tr.department-row').forEach(deptRow => {
            // Sum main department percentage
            const deptPercentage = parseFloat(deptRow.querySelector('.dept-percentage').value) || 0;
            total += deptPercentage;

            // Sum all subdepartment percentages for this department
            const depId = deptRow.getAttribute('data-dep-id');
            document.querySelectorAll(`#departmentTable tbody tr.subdepartment-row[data-parent-dep-id="${depId}"] .subdept-percentage`).forEach(subInput => {
                total += parseFloat(subInput.value) || 0;
            });
        });

        document.getElementById('totalPercentage').textContent = total.toFixed(2) + '%';
    }

    // Update total on input change
    document.querySelectorAll('.percentage-input').forEach(input => {
        input.addEventListener('input', updateDepartmentTotal);
    });

    // Initial total calculation
    updateDepartmentTotal();

    // You can add event handlers for Add/Remove buttons as needed
});
</script>
</body>


</html>