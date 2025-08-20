<!DOCTYPE html>


<!--Description of dashboard page

@author Ashan Rathsara-->


<html lang="en">



<head>
    <!-- Styles -->
    <title><?php echo $title ?></title>
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

                            <li class=""><a href="index.html">HOME</a></li>
                            <li class="active"><a href="index.html">ALLOWANCES</a></li>

                        </ol>


                        <div class="page-tabs">
                            <ul class="nav nav-tabs">

                                <li class="active"><a data-toggle="tab" href="#tab1">ALLOWANCES</a></li>
                                <li><a data-toggle="tab" href="#tab2">VIEW ALLOWANCES</a></li>

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
                                                            <h2>ADD ALLOWANCES</h2>
                                                        </div>
                                                        <div class="panel-body">
                                                            <form class="form-horizontal" id="frm_allowance_types"
                                                                name="frm_allowance_types"
                                                                action="<?php echo base_url(); ?>Master/Allowance_Types/insert_data"
                                                                method="POST">

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

                                                                <div class="form-group col-sm-12">
                                                                    <div class="col-sm-8">
                                                                        <img class="imagecss"
                                                                            src="<?php echo base_url(); ?>assets/images/allowance_types.png">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label for="focusedinput"
                                                                        class="col-sm-4 control-label">Allowance Type
                                                                        Name</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="txt_allowance" name="txt_allowance"
                                                                            placeholder="Ex: Fual Allowance">
                                                                    </div>

                                                                </div>


                                                                <!-- <div class="form-group col-sm-6 icheck-flat">
                                                                        <label class="col-sm-2 control-label"></label>
                                                                        <div class="col-sm-8 icheck-flat">
                                                                            <label class="checkbox green icheck col-sm-5">
                                                                                <input type="checkbox" id="isFixed" name="isFixed" value="1"> IS FIXED
                                                                            </label> -->
                                                                <!--                                                                            <label class="checkbox-inline icheck col-sm-5">
                                                                                                                                                            <input type="checkbox" id="isActive" name="isActive" value="1"> IS ACTIVE
                                                                                                                                                        </label>-->
                                                                <!-- </div>
                                                                    </div> -->



                                                                <div class="row">
                                                                    <div class="col-sm-8 col-sm-offset-2">
                                                                        <button type="submit" id="submit"
                                                                            class="btn-primary btn fa fa-check">&nbsp;&nbsp;Submit</button>
                                                                        <button type="button" id="Cancel" name="Cancel"
                                                                            class="btn btn-danger-alt fa fa-times-circle">&nbsp;&nbsp;Cancel</button>
                                                                    </div>
                                                                </div>

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
                                                            <h2>ALLOWANCE DETAILS</h2>
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
                                                                        <th>ALLOWANCE NAME</th>
                                                                        <!-- <th>IS FIXED</th> -->

                                                                        <th>EDIT</th>
                                                                        <th>DELETE</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($data_set as $data) {


                                                                        echo "<tr class='odd gradeX'>";


                                                                        echo "<td width='100'>" . $data->Alw_ID . "</td>";
                                                                        echo "<td width='100'>" . $data->Allowance_name . "</td>";
                                                                        // echo "<td width='100'>" . $data->isFixed . "</td>";
                                                                    

                                                                        echo "<td width='15'>";
                                                                        echo "<button class='get_data btn btn-green' data-toggle='modal' data-target='#myModal' 
                                                                                data-id='$data->Alw_ID'><i class='fa fa-edit'></i></button>";
                                                                        echo "</td>";

                                                                        echo "<td width='15'>";


                                                                        echo "<button class='btn btn-danger delete_data' data-id='$data->Alw_ID' 
        data-toggle='modal' data-target='#deleteModal' title='DELETE'>
        <i class='fa fa-times-circle'></i>
      </button>";


                                                                        echo "</td>";

                                                                        echo "</tr>";
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

                                <!-- End Grid View-->

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">ALLOWANCE</h2>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal"
                                                    action="<?php echo base_url(); ?>Master/Allowance_Types/edit"
                                                    method="post">
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-sm-4 control-label">ID</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" readonly name="id"
                                                                id="id">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label class="col-sm-4 control-label">ALLOWANCE NAME</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="Allowance_Name" id="Allowance_Name"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div> <!-- .container-fluid -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirm Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this Allowance?</p>
                                        <input type="hidden" id="delete_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="confirm_delete">Delete</button>
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


        </div> <!-- #layout-static -->

    </div>

    <!-- Load site level scripts -->

    <?php $this->load->view('template/js.php'); ?> <!-- Initialize scripts for this page-->

    <!-- End loading page level scripts-->

    <!--Ajax-->
    <script src="<?php echo base_url(); ?>system_js/Administration/Allowance_types.js"></script>

    <script>
        $(document).on('click', '.get_data', function () {
            var id = $(this).data('id');

            $.ajax({
                url: "<?php echo base_url(); ?>Master/Allowance_Types/get_details",
                type: "POST",
                data: { id: id },
                dataType: "json",
                success: function (res) {
                    $("#id").val(res.Alw_ID);
                    $("#Allowance_Name").val(res.Allowance_name);
                    // if you have checkboxes etc, set them here
                }
            });
        });

        // Pass ID into hidden field when clicking delete
        $(document).on('click', '.delete_data', function () {
            var id = $(this).data('id');
            $("#delete_id").val(id);
        });

        // Confirm delete
        $("#confirm_delete").click(function () {
            var id = $("#delete_id").val();

            $.ajax({
                url: "<?php echo base_url(); ?>Master/Allowance_Types/ajax_delete",
                type: "POST",
                data: { id: id },
                success: function (res) {

                    // console.log(res); // For debugging
                    // Close modal
                    $("#deleteModal").modal('hide');

                    // Refresh or remove row from table
                    location.reload();
                }
            });
        });

    </script>
</body>


</html>