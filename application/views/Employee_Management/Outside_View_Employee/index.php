<!DOCTYPE html>


<!--Description of dashboard page

@author Ashan Rathsara-->


<html lang="en">

<title><?php echo $title ?></title>

<head>
    <!-- Styles -->
    <?php $this->load->view('template/css.php'); ?>
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

                            <li class=""><a href="<?php echo base_url(); ?>Dashboard/">HOME</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>Master/Designation/">EMPLOYEE</a></li>

                        </ol>


                        <!--                            <div class="page-tabs">
                                                            <ul class="nav nav-tabs">

                                                                <li class="active"><a data-toggle="tab" href="#tab1">EMPLOYEE</a></li>
                                                                <li><a data-toggle="tab" href="#tab2">VIEW EMPLOYEE</a></li>


                                                            </ul>
                                                        </div>-->
                        <div class="container-fluid">


                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">

                                    <div class="row">
                                        <div class="col-xs-12">


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-primary">
                                                        <div class="col-md-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h2>VIEW EMPLOYEE</h2>
                                                                    <div class="panel-ctrls">
                                                                    </div>
                                                                </div>
                                                                <div class="panel-body panel-no-padding">
                                                                    <table id="example"
                                                                        class="table table-striped table-bordered"
                                                                        cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>CMP ID</th>
                                                                                <th>FULL NAME</th>
                                                                                <th>INITIALS WITH NAME</th>
                                                                                
                                                                                <th>GENDER</th>
                                                                                <th>NIC</th>
                                                                                <th>MOBILE NO</th>
                                                                                <th>STATUS</th>
                                                                                <th>IMAGE</th>
                                                                                <!--<th>VIEW</th>-->
                                                                                <th>VIEW</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            foreach ($data_set as $data) {

                                                                                if ($data->status == '1') {
                                                                                    $IsActive = 'Active';
                                                                                } else {
                                                                                    $IsActive = 'Inactive';
                                                                                }
                                                                                ?>

                                                                                <tr class='odd gradeX'>

                                                                                    <td width='100'>
                                                                                        <?php echo $data->Cmp_ID ?>
                                                                                    </td>
                                                                                    <td width='100'>
                                                                                        <?php echo $data->Emp_Full_Name ?>
                                                                                    </td>
                                                                                    <td width='100'>
                                                                                        <?php echo $data->Emp_Name_Int ?>
                                                                                    </td>

                                                                                    <td width='100'>
                                                                                        <?php echo $data->Gender ?>
                                                                                    </td>
                                                                                    <td width='100'>
                                                                                        <?php echo $data->NIC ?>
                                                                                    </td>
                                                                                    <td width='100'>
                                                                                        <?php echo $data->Tel_mobile ?>
                                                                                    </td>

                                                                                    <td width='100'>
                                                                                        <?php echo $IsActive ?>
                                                                                    </td>

                                                                                    <td width='15'>
                                                                                        <!--////                                                                                    echo "<a class='action_comp' data-toggle='modal' data-target='#myModal' data-id='$data->EmpNo' href='" . base_url() . "index.php/Action_Complain/complain_details" . $data->EmpNo . "'><i class='fa fa-edit'></i></a>";-->
                                                                                        <a class='get_data'
                                                                                            formtarget='_new'
                                                                                            href="<?php echo base_url(); ?>assets/images/Employees/<?php echo $data->Image ?>"
                                                                                            data-rel="popup"> <img
                                                                                                style='width: 60px; height: 60px;'
                                                                                                src="<?php echo base_url(); ?>assets/images/Employees/<?php echo $data->Image ?>">
                                                                                        </a>
                                                                                    </td>
                                                                                    <!--//-->
                                                                                    <td width='15'>
                                                                                        <!--//                                                                                    echo "<a class='action_comp' data-toggle='modal' data-target='#myModal' data-id='$data->EmpNo' href='" . base_url() . "index.php/Action_Complain/complain_details" . $data->EmpNo . "'><i class='fa fa-edit'></i></a>";-->
                                                                                        <a class='get_data btn btn-green'
                                                                                            href='<?php echo base_url(); ?>Employee_Management/Edit_Employees_Outside/edit/<?php echo $data->Cmp_ID ?>'>
                                                                                            <i class='fa fa-eye'></i>
                                                                                        </a>
                                                                                    </td>
                                                                                    <!--//                                                                                        echo "<td width='15'>";
            //                                                                                        echo "<a href='".base_url()."index.php/Designation/view".$data->B_Code."'><i class='icon-eye-open'></i></a>";
            //                                                                                        echo  "</td>";-->
                                                                                </tr>
                                                                            <?php } ?>
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
                                    </div>

                                </div>





                                <!--***************************-->


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
        <!--<script src="<?php echo base_url(); ?>system_js/Master/Designation.js"></script>-->


        <!--JQuary Validation-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#frm_designation").validate();
                $("#spnmessage").hide(5000);
            });
        </script>

        <!--Clear Text Boxes-->
        <script type="text/javascript">

            $("#cancel").click(function () {

                $("#txt_emp").val("");
                $("#txt_emp_name").val("");
                $("#cmb_desig").val("");
                $("#cmb_dep").val("");
                $("#cmb_comp").val("");
                $("#txt_nic").val("");
                $("#cmb_gender").val("");
                $("#cmb_status").val("");


            });
        </script>

        <script>

            $(function () {
                $('#from_date').datepicker(
                    {
                        "setDate": new Date(),
                        "autoclose": true,
                        "todayHighlight": true,
                        format: 'yyyy/mm/dd'
                    });

                $('#to_date').datepicker(
                    {
                        "setDate": new Date(),
                        "autoclose": true,
                        "todayHighlight": true,
                        format: 'yyyy/mm/dd'
                    });

            });
            $("#success_message_my").hide("bounce", 5000, 'fast');


            $("#search").click(function () {
                // $('#search_body').html('<center><p><img style="width: 50;height: 50;" src="<?php echo base_url(); ?>assets/images/icon-loading.gif" /></p><center>');
                $('#search_body').load("<?php echo base_url(); ?>Employee_Management/Outside_View_Employee/search_employee");
            });


        </script>

        <!--Auto complete-->
        <script type="text/javascript">
            $(function () {
                $("#txt_emp_name").autocomplete({
                    source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_auto_emp_name" // path to the get_birds method
                });
            });

            $(function () {
                $("#txt_emp").autocomplete({
                    source: "<?php echo base_url(); ?>Employee_Management/View_Employees/get_auto_emp_no" // path to the get_birds method
                });
            });
        </script>

</body>


</html>