<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Edit_Employees extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!($this->session->userdata('login_user'))) {
            redirect(base_url() . "");
        }
        /*
         * Load Database model
         */
        $this->load->model('Db_model', '', TRUE);
    }

    public function index()
    {

        $this->load->helper('url');
        $data['title'] = "ADD Employees | HRM SYSTEM";
        $data['data_dep'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
        $data['data_desig'] = $this->Db_model->getData('Des_ID,Desig_Name', 'tbl_designations');
        $data['data_grp'] = $this->Db_model->getData('Grp_ID,EmpGroupName', 'tbl_emp_group');
        $data['data_u_lvl'] = $this->Db_model->getData('user_level_id,user_level_name', 'tbl_user_level_master');
        $data['data_Rstr'] = $this->Db_model->getData('RosterCode,RosterName', 'tbl_rosterpatternweeklyhd');
        $data['data_bank'] = $this->Db_model->getData('Bnk_ID,bank_name', 'tbl_banks');

        $this->load->view('Employee_Management/ADD_Employees/index', $data);
    }

    public function edit($id)
    {

        $data['title'] = "EDIT Employees | HRM SYSTEM";
        $data['data_DS'] = $this->Db_model->getData('Des_ID,Desig_Name,Desig_Order', 'tbl_designations');
        $data['data_DP'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
        $data['data_Grp'] = $this->Db_model->getData('Grp_ID,EmpGroupName', 'tbl_emp_group');
        $data['data_Rstr'] = $this->Db_model->getData('RosterCode,RosterName', 'tbl_rosterpatternweeklyhd');
        $data['data_ot'] = $this->Db_model->getData('OTCode,OTName', 'tbl_ot_pattern_hd');
        $data['data_branch'] = $this->Db_model->getData('B_id,B_name', 'tbl_branches');
        $data['data_bank'] = $this->Db_model->getData('Bnk_ID,bank_name', 'tbl_banks');
        $data['data_u_lvl'] = $this->Db_model->getData('user_level_id,user_level_name', 'tbl_user_level_master');
        $data['data_epf'] = $this->Db_model->getData('EPF_CAT,EPF_CAT_Name', 'tbl_epf_cat');
        $data['data_status'] = $this->Db_model->getData('EMP_ST_ID,EMP_ST_Name', 'tbl_emp_status');

        $data['data_set'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_empmaster where Cmp_ID='" . $id . "'");
        $data['bond_data'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_bond_guarantor where CmpNo='" . $id . "'");
        $data['referee_data'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_referee where CmpNo='" . $id . "'");
        $data['data_dep'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');

        // $data['data_set'] = $this->Db_model->getfilteredData("SELECT 
        //                                                             tbl_empmaster.EmpNo,
        //                                                             tbl_empmaster.Enroll_No,
        //                                                             tbl_empmaster.EPFNO,
        //                                                             tbl_empmaster.EPF_CAT,
        //                                                             tbl_empmaster.Is_EPF,
        //                                                             tbl_empmaster.OCP_Code,
        //                                                             tbl_empmaster.EMP_ST_ID,
        //                                                             tbl_empmaster.Emp_Full_Name,
        //                                                             tbl_empmaster.Emp_Name_Int,
        //                                                             tbl_empmaster.Title,
        //                                                             tbl_empmaster.Gender,
        //                                                             tbl_empmaster.DOB,
        //                                                             tbl_empmaster.Status,
        //                                                             tbl_empmaster.Basic_Salary,
        //                                                             tbl_empmaster.Fixed_Allowance,
        //                                                             tbl_empmaster.Incentive,
        //                                                             tbl_empmaster.Bnk_Br_ID,
        //                                                             tbl_empmaster.Image,
        //                                                             tbl_empmaster.ApointDate,
        //                                                             tbl_empmaster.Permanent_Date,
        //                                                             tbl_empmaster.ResignDate,
        //                                                             tbl_empmaster.Account_no,
        //                                                             tbl_empmaster.Is_EPF,
        //                                                             tbl_empmaster.NIC,
        //                                                             tbl_empmaster.Passport,
        //                                                             tbl_empmaster.Address,
        //                                                             tbl_empmaster.City,
        //                                                             tbl_empmaster.BR1,
        //                                                             tbl_empmaster.BR2,
        //                                                             tbl_empmaster.District,
        //                                                             tbl_empmaster.Tel_home,
        //                                                             tbl_empmaster.Tel_mobile,
        //                                                             tbl_empmaster.E_mail,
        //                                                             tbl_empmaster.Religion,
        //                                                             tbl_empmaster.Civil_status,
        //                                                             tbl_empmaster.Blood_group,
        //                                                             tbl_empmaster.Relations_name,
        //                                                             tbl_empmaster.Relations_Tel,
        //                                                             tbl_empmaster.No_Of_Child,
        //                                                             tbl_empmaster.Remarks,
        //                                                             tbl_empmaster.highlights,
        //                                                             tbl_empmaster.Is_allow_login,
        //                                                             tbl_empmaster.username,
        //                                                             tbl_empmaster.password,
        //                                                             tbl_empmaster.View_Only,
        //                                                             tbl_empmaster.user_p_id,
        //                                                             tbl_departments.Dep_ID,
        //                                                             tbl_departments.Dep_Name,
        //                                                             tbl_designations.Des_ID,
        //                                                             tbl_designations.Desig_Name,
        //                                                             tbl_emp_group.Grp_ID,
        //                                                             tbl_emp_group.EmpGroupName,
        //                                                             tbl_rosterpatternweeklyhd.RosterCode,
        //                                                             tbl_rosterpatternweeklyhd.RosterName,
        //                                                             tbl_ot_pattern_hd.OTCode,
        //                                                             tbl_ot_pattern_hd.OTName,
        //                                                             tbl_branches.B_id,
        //                                                             tbl_branches.B_name,
        //                                                             tbl_banks.Bnk_ID,
        //                                                             tbl_banks.bank_name,
        //                                                             tbl_user_level_master.user_level_id,
        //                                                             tbl_user_level_master.user_level_name
        //                                                         FROM
        //                                                             tbl_empmaster
        //                                                                 LEFT JOIN
        //                                                             tbl_departments ON tbl_empmaster.Dep_ID = tbl_departments.Dep_ID
        //                                                                 LEFT JOIN
        //                                                             tbl_designations ON tbl_empmaster.Des_ID = tbl_designations.Des_ID
        //                                                                 LEFT JOIN
        //                                                             tbl_emp_group ON tbl_empmaster.Grp_ID = tbl_emp_group.Grp_ID
        //                                                                 LEFT JOIN
        //                                                             tbl_rosterpatternweeklyhd ON tbl_empmaster.RosterCode = tbl_rosterpatternweeklyhd.RosterCode
        //                                                                 LEFT JOIN
        //                                                             tbl_ot_pattern_hd ON tbl_empmaster.OTCode = tbl_ot_pattern_hd.OTCode
        //                                                                 LEFT JOIN
        //                                                             tbl_branches ON tbl_empmaster.B_id = tbl_branches.B_id
        //                                                                 LEFT JOIN
        //                                                             tbl_banks ON tbl_empmaster.Bnk_ID = tbl_banks.Bnk_ID
        //                                                                 left join
        //                                                             tbl_user_level_master on tbl_empmaster.user_p_id = tbl_user_level_master.user_level_id where EmpNo='" . $id . "'");

        //        echo '<pre>' . var_export($data, true) . '</pre>';die;
        //        var_dump($data);die;


        $this->load->view('Employee_Management/Edit_Employees/index', $data);
    }

   public function getData($id) {
        $result = $this->Db_model->getfilteredData("SELECT ADP_Department_ID, ADP_Department_Percentage, ADP_Sub_Department_ID, ADP_Sub_Department_Percentage,ADP_Sub_Department_Name FROM tbl_advance_payroll WHERE CmpNo = '" . $id . "'");
    // $result = $this->Db_model->getfilteredData("SELECT ADP_Department_ID, ADP_Department_Percentage, ADP_Sub_Department_ID, ADP_Sub_Department_Percentage,Sub_Dep_Name FROM tbl_advance_payroll INNER JOIN tbl_sub_departments ON tbl_advance_payroll.ADP_Sub_Department_ID = tbl_sub_departments.Sub_Dep_ID WHERE CmpNo = '" . $id . "'");
    echo json_encode(['advance_payroll_data' => $result]);
}


    // public function update_emp()
    // {

    //     $Emp_No = $this->input->post('txt_emp_no');

    //     $Image = md5($Emp_No);


    //     $Is_Allow = $this->input->post('Is_Allow');

    //     $satus = $this->input->post('employee_status');
    //     // echo $satus;
    //     $st = '';
    //     if ($satus == 'Active') {
    //         $st = "1";
    //     } else {
    //         $st = "0";
    //     }

    //     //        var_dump($Is_Allow);
    //     //        die;
    //     //        if ($Is_Allow == null) {
    //     //            $Is_Allow = 0;
    //     //        } else {
    //     //            $Is_Allow = 1;
    //     //        }
    //     //
    //     //        var_dump($Is_Allow);
    //     //        die;

    //     $Is_EPF = $this->input->post('cmb_if_epf');
    //     if ($Is_EPF == null) {
    //         $Is_EPF = 0;
    //     }


    //     $config['upload_path'] = 'assets/images/Employees/';
    //     $config['allowed_types'] = 'jpg|png|docx';
    //     $config['max_size'] = 100000;
    //     $config['max_width'] = 4000;
    //     $config['max_height'] = 4000;
    //     //      $config['file_name'] = $Image;
    //     $config['file_name'] = $Image . ".jpg";
    //     $this->load->library('upload', $config);



    //     /*
    //      * 'image'  selected image id,name
    //      */
    //     if (!$this->upload->do_upload('img_employee')) {
    //         $error = array('error' => $this->upload->display_errors());

    //         //            var_dump($error);
    //     } else {
    //         $data = array('upload_data' => $this->upload->data());
    //         //            var_dump($data);
    //     }




    //     $data = array(
    //         'Enroll_No' => $this->input->post('txt_enroll_no'),
    //         'EPFNO' => $this->input->post('txt_epf_no'),
    //         'EPF_CAT' => $this->input->post('cmb_epf_cat'),
    //         'OCP_Code' => $this->input->post('txt_ocp_code'),
    //         'EMP_ST_ID' => $this->input->post('cmb_emp_status'),
    //         'Title' => $this->input->post('cmb_emp_title'),
    //         'Emp_Full_Name' => $this->input->post('txt_emp_name'),
    //         'Emp_Name_Int' => $this->input->post('txt_emp_name_init'),
    //         'Image' => $Image . ".jpg",
    //         'Gender' => $this->input->post('cmb_gender'),
    //         'Status' => $st,
    //         'Dep_ID' => $this->input->post('cmb_dep'),
    //         'Des_ID' => $this->input->post('cmb_desig'),
    //         'Grp_ID' => $this->input->post('cmb_group'),
    //         'RosterCode' => $this->input->post('cmb_roster_pattern'),
    //         'OTCode' => $this->input->post('cmb_ot_pattern'),
    //         'B_id' => $this->input->post('cmb_branch'),
    //         'ApointDate' => $this->input->post('txt_appoint_date'),
    //         'Permanent_Date' => $this->input->post('txt_permanent_date'),
    //         'Basic_Salary' => $this->input->post('txt_basic_sal'),
    //         'Incentive' => $this->input->post('txt_Incentive'),
    //         'Fixed_Allowance' => $this->input->post('txt_BG_Allowance'),
    //         'BR1' => $this->input->post('txt_BG_Allowance1'),
    //         'BR2' => $this->input->post('txt_BG_Allowance2'),
    //         'Bnk_ID' => $this->input->post('cmb_bank'),
    //         'Bnk_Br_ID' => $this->input->post('txt_B_Branch'),
    //         'Account_no' => $this->input->post('txt_account'),
    //         'Is_EPF' => $Is_EPF,
    //         'Address' => $this->input->post('txt_address'),
    //         'District' => $this->input->post('cmb_district'),
    //         'City' => $this->input->post('txt_city'),
    //         'Tel_home' => $this->input->post('txt_cont_home'),
    //         'Tel_mobile' => $this->input->post('txt_cont_mobile'),
    //         'E_mail' => $this->input->post('txt_email'),
    //         'NIC' => $this->input->post('txt_nic'),
    //         'Passport' => $this->input->post('txt_passport'),
    //         'DOB' => $this->input->post('txt_dob'),
    //         'Religion' => $this->input->post('cmb_religin'),
    //         'Civil_status' => $this->input->post('cmb_civil_status'),
    //         'Blood_group' => $this->input->post('cmb_blood'),
    //         'Relations_name' => $this->input->post('txt_rel_name'),
    //         'Relations_Tel' => $this->input->post('txt_rel_cont'),
    //         'No_Of_Child' => $this->input->post('txt_no_child'),
    //         //            'Is_allow_login' => $Is_Allow,
    //         'username' => $this->input->post('txt_user_name'),
    //         'user_p_id' => $this->input->post('cmb_user_level'),
    //         'View_Only' => $this->input->post('cmb_view_only'),

    //         'Cmp_ID' => 1,
    //         'Active_process' => 1,
    //     );

    //     //        $result = $this->Db_model->insertData("tbl_empmaster", $data);

    //     $whereArr = array("EmpNo" => $this->input->post("txt_emp_no"));
    //     $result = $this->Db_model->updateData("tbl_empmaster", $data, $whereArr);


    //     $this->session->set_flashdata('success_message', 'Update Employee has been updated successfully');


    //     redirect('/Employee_Management/View_Employees/');
    // }

    public function update_emp()
    {
        $Comp_No = $this->input->post('txt_cmp_no');
        $Emp_No = $this->input->post('txt_emp_no');

        $OldImage = $this->input->post('img_Data');
        $OldImageData = $this->Db_model->getfilteredData("SELECT `Image` FROM tbl_empmaster WHERE Cmp_ID = '" . $Comp_No . "' ");

        if ($OldImageData[0]->Image == $OldImage) {
             $Cmp_ID = $this->Db_model->getfilteredData("SELECT `Cmp_ID` FROM tbl_empmaster_outside WHERE Cmp_ID = '" . $Comp_No . "' ");

            if (empty($Cmp_ID)) {
                $DataID = $this->Db_model->getfilteredData("SELECT `Image` FROM tbl_empmaster WHERE Cmp_ID = '" . $Comp_No . "' ");
            }else {
                $DataID = $this->Db_model->getfilteredData("SELECT `Image` FROM tbl_empmaster_outside WHERE Cmp_ID = '" . $Comp_No . "' ");
            }

            $Image = $DataID[0]->Image;
        }else{
            // Image Upload Logic
            $Image = md5($Comp_No);
            $config['upload_path'] = 'assets/images/Employees/';
            $config['allowed_types'] = 'jpg|png|docx';
            $config['max_size'] = 100000;
            $config['max_width'] = 4000;
            $config['max_height'] = 4000;
            $config['file_name'] = $Image . ".jpg";

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img_employee')) {
                $upload_data = $this->upload->data();
                $uploaded_file = $upload_data['file_name'];
            } else {
                $uploaded_file = null;
                // Optionally handle error
                $error = $this->upload->display_errors();
                log_message('error', $error);
            }

            $Image =  $Image . ".jpg";
        }

        // echo $Image; // Debugging line to check the image name

        // die;

        

        $Is_Allow = $this->input->post('Is_Allow');

        $satus = $this->input->post('employee_status');
        // echo $satus;
        $st = '';
        if ($satus == 'Active') {
            $st = "1";
        } else {
            $st = "0";
        }

        //        var_dump($Is_Allow);
        //        die;
        //        if ($Is_Allow == null) {
        //            $Is_Allow = 0;
        //        } else {
        //            $Is_Allow = 1;
        //        }
        //
        //        var_dump($Is_Allow);
        //        die;

        $Is_EPF = $this->input->post('cmb_if_epf');
        if ($Is_EPF == null) {
            $Is_EPF = 0;
        }

        $config['upload_path'] = 'assets/images/Employees/';
        $config['allowed_types'] = 'jpg|png|docx';
        $config['max_size'] = 100000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
        //      $config['file_name'] = $Image;
        $config['file_name'] = $Image . ".jpg";
        $this->load->library('upload', $config);

        /*
         * 'image'  selected image id,name
         */
        if (!$this->upload->do_upload('img_employee')) {
            $error = ['error' => $this->upload->display_errors()];

            //            var_dump($error);
        } else {
            $data = ['upload_data' => $this->upload->data()];
            //            var_dump($data);
        }

        $Full_Name = $this->input->post('txt_emp_name');
        $Name_Initials = $this->input->post('txt_emp_name_init');
        $Title = $this->input->post('cmb_emp_title');
        $Gender = $this->input->post('cmb_gender');
        $Appoint_Date = $this->input->post('txt_appoint_date');

        // Academic Qualifications (checkboxes)
        $ol = $this->input->post('ol');
        $al = $this->input->post('al');
        $diploma = $this->input->post('diploma');
        $hnd = $this->input->post('hnd');
        $degree = $this->input->post('degree');
        $master = $this->input->post('master');
        $mphil = $this->input->post('mphil');
        $phd = $this->input->post('phd');
        $other = $this->input->post('other');

        // Payroll
        $Bank_Name = $this->input->post('cmb_bank');
        $Account_No = $this->input->post('txt_account');

        // Personal
        $Address = $this->input->post('txt_address');
        $City = $this->input->post('txt_city');
        $District = $this->input->post('cmb_district');
        $Temp_Address = $this->input->post('txt_tmp_address');
        $Temp_City = $this->input->post('txt_tmp_city');
        $Temp_District = $this->input->post('cmb_tmp_district');
        $Contact_Home = $this->input->post('txt_cont_home');
        $Contact_Mobile = $this->input->post('txt_cont_mobile');
        $Email = $this->input->post('txt_email');
        $Driving_Licence = $this->input->post('txt_dLicence');
        $NIC = $this->input->post('txt_nic');
        $Passport_No = $this->input->post('txt_passport');
        $DOB = $this->input->post('txt_dob');
        $Blood_Group = $this->input->post('cmb_blood');
        $Religion = $this->input->post('cmb_religin');
        $Civil_Status = $this->input->post('cmb_civil_status');

        // Family
        $Rel_Name = $this->input->post('txt_rel_name');
        $Rel_Contact = $this->input->post('txt_rel_cont');
        $No_of_Children = $this->input->post('txt_no_child');

        // Emergency
        $Emergency_Name = $this->input->post('txt_emergency_name');
        $Emergency_Tel = $this->input->post('txt_emergency_tel');
        $Emergency_Address = $this->input->post('txt_emergency_address');
        $Emergency_Relationship = $this->input->post('txt_emergency_relationship');

        // Bond Guarantor
        $Guarantor_Name = $this->input->post('txt_bond_guarantor_name');
        $Guarantor_Address = $this->input->post('txt_bond_guarantor_address');
        $Guarantor_NIC = $this->input->post('txt_bond_guarantor_nic');
        $Guarantor_Email = $this->input->post('txt_bond_guarantor_email');
        $Guarantor_Contact = $this->input->post('txt_bond_guarantor_contact');
        $Guarantor_Entitlement = $this->input->post('bond_guarantor_entitlement');
        $Bond_End_Date = $this->input->post('bond_end_date');

        // Referee 01
        $Ref1_Name = $this->input->post('non_related_referee_name');
        $Ref1_Designation = $this->input->post('non_related_referee_designation');
        $Ref1_NIC = $this->input->post('non_related_referee_nic');
        $Ref1_Contact = $this->input->post('non_related_referee_contact');
        $Ref1_Email = $this->input->post('non_related_referee_email');
        $Ref1_Address = $this->input->post('non_related_referee_address');

        // Referee 02
        $Ref2_Name = $this->input->post('non_related_referee_2_name');
        $Ref2_Designation = $this->input->post('non_related_referee_2_designation');
        $Ref2_NIC = $this->input->post('non_related_referee_2_nic');
        $Ref2_Contact = $this->input->post('non_related_referee_2_contact');
        $Ref2_Email = $this->input->post('non_related_referee_2_email');
        $Ref2_Address = $this->input->post('non_related_referee_2_address');

        // Login
        $User_Name = $this->input->post('txt_user_name');
        $User_Level = $this->input->post('cmb_user_level');
        $Is_Allow = $this->input->post('Is_Allow');

        // $OutSidedata = [
        //     'Is_Approve' => 1,
        // ];
        // $whereArr = ["Cmp_ID" => $Comp_No];
        // $result   = $this->Db_model->updateData("tbl_empmaster_outside", $OutSidedata, $whereArr);



        $data = [
            'Cmp_ID' => $Comp_No,
            'EmpNo' => $this->input->post('txt_emp_no'),
            'Enroll_No' => $this->input->post('txt_enroll_no'),
            'EPFNO' => $this->input->post('txt_epf_no'),
            'EPF_CAT' => $this->input->post('cmb_epf_cat'),
            // 'Is_EPF' =>$this->input->post('cmb_if_epf'),
            'OCP_Code' => $this->input->post('txt_ocp_code'),
            'EMP_ST_ID' => $this->input->post('cmb_emp_status'),
            'Title' => $Title,
            'Emp_Full_Name' => $Full_Name,
            'Emp_Name_Int' => $Name_Initials,
            'Image' => $Image,
            'Gender' => $Gender,
            'Status' => $st,
            'Dep_ID' => $this->input->post('cmb_dep'),
            'Des_ID' => $this->input->post('cmb_desig'),
            'Grp_ID' => $this->input->post('cmb_group'),
            'RosterCode' => 'RS0001',
            'OTCode' => $this->input->post('cmb_ot_pattern'),
            'B_id' => $this->input->post('cmb_branch'),
            'BR1' => $this->input->post('txt_BG_Allowance1'),
            'BR2' => $this->input->post('txt_BG_Allowance2'),
            'ApointDate' => $Appoint_Date,
            'Permanent_Date' => $this->input->post('txt_permanent_date'),
            'Basic_Salary' => $this->input->post('txt_basic_sal'),
            'Incentive' => $this->input->post('txt_Incentive'),
            // 'Bnk_ID' => $this->input->post('cmb_bank'),
            'Bnk_ID' => $Bank_Name,
            'Bnk_Br_ID' => $this->input->post('txt_B_Branch'),
            'Account_no' => $Account_No,
            'Is_EPF' => $Is_EPF,
            'Address' => $Address,
            'District' => $District,
            'City' => $City,
            'Temp_Address' => $Temp_Address,
            'Temp_City' => $Temp_City,
            'Temp_District' => $Temp_District,
            'Tel_home' => $Contact_Home,
            'Tel_mobile' => $Contact_Mobile,
            'E_mail' => $Email,
            'Driving_Licence_No' => $Driving_Licence,
            'NIC' => $NIC,
            'Passport' => $Passport_No,
            'DOB' => $DOB,
            'Blood_group' => $Blood_Group,
            'Religion' => $Religion,
            'Civil_status' => $Civil_Status,
            'Relations_name' => $Rel_Name,
            'Relations_Tel' => $Rel_Contact,
            'No_Of_Child' => $No_of_Children,
            'Emergency_Contact_Name' => $Emergency_Name,
            'Emergency_Contact_Telephone' => $Emergency_Tel,
            'Emergency_Contact_Address' => $Emergency_Address,
            'Emergency_Contact_Relationship' => $Emergency_Relationship,
            'OL_Data' => $ol ? 1 : 0,
            'AL_Data' => $al ? 1 : 0,
            'Diploma_Data' => $diploma ? 1 : 0,
            'HND_Data' => $hnd ? 1 : 0,
            'Degree_Data' => $degree ? 1 : 0,
            'Master_Data' => $master ? 1 : 0,
            'Mphill_Data' => $mphil ? 1 : 0,
            'PHD_Data' => $phd ? 1 : 0,
            'Academic_Other_Data' => $other,
            'username' => $User_Name,
            'password' => hash('sha512', $this->input->post('txt_nic')),
            'Is_allow_login' => $Is_Allow ? 1 : 0,
            'user_p_id' => $User_Level,
            'Active_process' => 1,
            'Is_Approve' => 1,
            'Remarks' => $this->input->post('txt_remarks'),
            'highlights' => $this->input->post('txt_high')
        ];
        // $result = $this->Db_model->insertData("tbl_empmaster", $data);

        // echo '<pre>' . var_export($data, true) . '</pre>';

        $whereArr3 = ["Cmp_ID" => $Comp_No];
        $result = $this->Db_model->updateData("tbl_empmaster", $data, $whereArr3);


        $data_bond_guarantor = [
            'CmpNo' => $Comp_No,
            'Name' => $Guarantor_Name,
            'NIC' => $Guarantor_NIC,
            'Email' => $Guarantor_Email,
            'Contact' => $Guarantor_Contact,
            'Address' => $Guarantor_Address,
            'BondEntitlement' => $Guarantor_Entitlement ? 1 : 0,
            'BondEndDate' => $Bond_End_Date,
        ];
        $whereArr1 = ["CmpNo" => $Comp_No];
        $result = $this->Db_model->updateData("tbl_bond_guarantor", $data_bond_guarantor, $whereArr1);
        // echo '<pre>' . var_export($data_bond_guarantor, true) . '</pre>';

        $this->Db_model->getfilteredDelete("DELETE FROM tbl_referee WHERE CmpNo = '" . $Comp_No . "'");


        $data_referee = [
            'CmpNo' => $Comp_No,
            'Referee_Name' => $Ref1_Name,
            'Referee_Designation' => $Ref1_Designation,
            'Referee_NIC' => $Ref1_NIC,
            'Referee_Contact' => $Ref1_Contact,
            'Referee_Email' => $Ref1_Email,
            'Referee_Address' => $Ref1_Address,

        ];
        $result = $this->Db_model->insertData("tbl_referee", $data_referee);


        $data_referee2 = [
            'CmpNo' => $Comp_No,
            'Referee_Name' => $Ref2_Name,
            'Referee_Designation' => $Ref2_Designation,
            'Referee_NIC' => $Ref2_NIC,
            'Referee_Contact' => $Ref2_Contact,
            'Referee_Email' => $Ref2_Email,
            'Referee_Address' => $Ref2_Address,
        ];
        $result = $this->Db_model->insertData("tbl_referee", $data_referee2);
        // echo '<pre>' . var_export($data_referee2, true) . '</pre>';

        // $data = [
        //     'Enroll_No'       => $this->input->post('txt_enroll_no'),
        //     'EPFNO'           => $this->input->post('txt_epf_no'),
        //     'EPF_CAT'         => $this->input->post('cmb_epf_cat'),
        //     'OCP_Code'        => $this->input->post('txt_ocp_code'),
        //     'EMP_ST_ID'       => $this->input->post('cmb_emp_status'),
        //     'Title'           => $this->input->post('cmb_emp_title'),
        //     'Emp_Full_Name'   => $this->input->post('txt_emp_name'),
        //     'Emp_Name_Int'    => $this->input->post('txt_emp_name_init'),
        //     'Image'           => $Image . ".jpg",
        //     'Gender'          => $this->input->post('cmb_gender'),
        //     'Status'          => $st,
        //     'Dep_ID'          => $this->input->post('cmb_dep'),
        //     'Des_ID'          => $this->input->post('cmb_desig'),
        //     'Grp_ID'          => $this->input->post('cmb_group'),
        //     'RosterCode'      => $this->input->post('cmb_roster_pattern'),
        //     'OTCode'          => $this->input->post('cmb_ot_pattern'),
        //     'B_id'            => $this->input->post('cmb_branch'),
        //     'ApointDate'      => $this->input->post('txt_appoint_date'),
        //     'Permanent_Date'  => $this->input->post('txt_permanent_date'),
        //     'Basic_Salary'    => $this->input->post('txt_basic_sal'),
        //     'Incentive'       => $this->input->post('txt_Incentive'),
        //     'Fixed_Allowance' => $this->input->post('txt_BG_Allowance'),
        //     'BR1'             => $this->input->post('txt_BG_Allowance1'),
        //     'BR2'             => $this->input->post('txt_BG_Allowance2'),
        //     'Bnk_ID'          => $this->input->post('cmb_bank'),
        //     'Bnk_Br_ID'       => $this->input->post('txt_B_Branch'),
        //     'Account_no'      => $this->input->post('txt_account'),
        //     'Is_EPF'          => $Is_EPF,
        //     'Address'         => $this->input->post('txt_address'),
        //     'District'        => $this->input->post('cmb_district'),
        //     'City'            => $this->input->post('txt_city'),
        //     'Tel_home'        => $this->input->post('txt_cont_home'),
        //     'Tel_mobile'      => $this->input->post('txt_cont_mobile'),
        //     'E_mail'          => $this->input->post('txt_email'),
        //     'NIC'             => $this->input->post('txt_nic'),
        //     'Passport'        => $this->input->post('txt_passport'),
        //     'DOB'             => $this->input->post('txt_dob'),
        //     'Religion'        => $this->input->post('cmb_religin'),
        //     'Civil_status'    => $this->input->post('cmb_civil_status'),
        //     'Blood_group'     => $this->input->post('cmb_blood'),
        //     'Relations_name'  => $this->input->post('txt_rel_name'),
        //     'Relations_Tel'   => $this->input->post('txt_rel_cont'),
        //     'No_Of_Child'     => $this->input->post('txt_no_child'),
        //     //            'Is_allow_login' => $Is_Allow,
        //     'username'        => $this->input->post('txt_user_name'),
        //     'user_p_id'       => $this->input->post('cmb_user_level'),
        //     'View_Only'       => $this->input->post('cmb_view_only'),

        //     'Cmp_ID'          => 1,
        //     'Active_process'  => 1,
        // ];

        // //        $result = $this->Db_model->insertData("tbl_empmaster", $data);

        // $whereArr = ["EmpNo" => $this->input->post("txt_emp_no")];
        // $result   = $this->Db_model->updateData("tbl_empmaster", $data, $whereArr);

        $this->session->set_flashdata('success_message', 'Update Employee has been updated successfully');
        redirect('/Employee_Management/View_Employees/');

    }

}
