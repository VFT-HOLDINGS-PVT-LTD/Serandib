<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ADD_Employees_Outside extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if (!($this->session->userdata('login_user'))) {
        //     // redirect(base_url() . "");
        // }
        /*
         * Load Database model
         */
        $this->load->model('Db_model', '', TRUE);
        $this->load->library('form_validation');
    }

    public function index()
    {


        $data['title'] = "VFT CLOUD SYSTEM";
        $data['data_dep'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
        $data['data_desig'] = $this->Db_model->getData('Des_ID,Desig_Name', 'tbl_designations');
        $data['data_grp'] = $this->Db_model->getData('Grp_ID,EmpGroupName', 'tbl_emp_group');
        $data['data_u_lvl'] = $this->Db_model->getData('user_level_id,user_level_name', 'tbl_user_level_master');
        $data['data_Rstr'] = $this->Db_model->getData('RosterCode,RosterName', 'tbl_rosterpatternweeklyhd');
        $data['data_ot'] = $this->Db_model->getData('OTCode,OTName', 'tbl_ot_pattern_hd');
        $data['data_branch'] = $this->Db_model->getData('B_id,B_name', 'tbl_branches');
        $data['data_bank'] = $this->Db_model->getData('Bnk_ID,bank_name', 'tbl_banks');
        $data['data_epf'] = $this->Db_model->getData('EPF_CAT,EPF_CAT_Name', 'tbl_epf_cat');
        $data['data_status'] = $this->Db_model->getData('EMP_ST_ID,EMP_ST_Name', 'tbl_emp_status');
        $this->load->view('Employee_Management/ADD_Employees_Outside/index', $data);
    }

    public function check_emp()
    {
        //get the username  
        $EmpNo = $this->input->post('txt_emp_no');

        $result = $this->Db_model->getfilteredData("select count(EmpNo) as EmpNo from tbl_empmaster where EmpNo = '$EmpNo' ");


        //if number of rows fields is bigger them 0 that means it's NOT available '  
        if ($result[0]->EmpNo == 0) {

            echo 0;
        } else {
            //else if it's not bigger then 0, then it's available '  
            //and we send 1 to the ajax request  
            echo 1;
        }
    }

    //***** INsert Employee
    public function insert_Data()
    {

        $Emp_No = $this->input->post('txt_emp_no');

        $Image = md5($Emp_No);



        $config['upload_path'] = 'assets/images/Employees/';
        $config['allowed_types'] = 'jpg|png|docx';
        $config['max_size'] = 100000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
        //      $config['file_name'] = $Image;
        $config['file_name'] = $Image . ".jpg";
        $this->load->library('upload', $config);

        echo $this->input->post('cmb_if_epf');

        /*
         * 'image'  selected image id,name
         */
        if (!$this->upload->do_upload('img_employee')) {
            $error = array('error' => $this->upload->display_errors());

            //            var_dump($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            //            var_dump($data);
        }

        $Password = $this->input->post('txt_nic');


        $Is_Allow = $this->input->post('Is_Allow');
        if ($Is_Allow == null) {
            $Is_Allow = 1;
        } else {
            $Is_Allow = 1;
        }

        $Is_EPF = $this->input->post('cmb_if_epf');
        if ($Is_EPF == null) {
            $Is_EPF = 0;
        }
        // $this->form_validation->set_rules('txt_emp_no', 'Employee Number', 'required|alpha_numeric');
        // $this->form_validation->set_rules('txt_enroll_no', 'Enrollment Number', 'required|alpha_numeric');
        // $this->form_validation->set_rules('txt_epf_no', 'EPF Number', 'required|alpha_numeric');
        // $this->form_validation->set_rules('cmb_epf_cat', 'EPF Category', 'required');
        // $this->form_validation->set_rules('txt_ocp_code', 'Occupation Code', 'required|alpha_numeric');
        // $this->form_validation->set_rules('cmb_emp_status', 'Employee Status', 'required');
        // $this->form_validation->set_rules('cmb_emp_title', 'Title', 'required');
        // $this->form_validation->set_rules('txt_emp_name', 'Full Name', 'required');
        // $this->form_validation->set_rules('txt_emp_name_init', 'Name with Initials', 'required');
        // $this->form_validation->set_rules('txt_basic_sal', 'Basic Salary', 'required|numeric');
        // $this->form_validation->set_rules('cmb_bank', 'Bank', 'required');
        // $this->form_validation->set_rules('txt_B_Branch', 'Bank Branch', 'required');
        // $this->form_validation->set_rules('txt_account', 'Account Number', 'required|numeric');
        // $this->form_validation->set_rules('txt_address', 'Address', 'required');
        // $this->form_validation->set_rules('cmb_district', 'District', 'required');
        // $this->form_validation->set_rules('txt_city', 'City', 'required');
        // $this->form_validation->set_rules('txt_cont_home', 'Home Contact Number', 'required|numeric');
        // $this->form_validation->set_rules('txt_cont_mobile', 'Mobile Contact Number', 'required|numeric');
        // $this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('txt_nic', 'NIC', 'required|alpha_numeric');
        // $this->form_validation->set_rules('txt_passport', 'Passport', 'required|alpha_numeric');
        // $this->form_validation->set_rules('txt_dob', 'Date of Birth', 'required|valid_date');
        // $this->form_validation->set_rules('cmb_religin', 'Religion', 'required');
        // $this->form_validation->set_rules('cmb_civil_status', 'Civil Status', 'required');
        // $this->form_validation->set_rules('cmb_blood', 'Blood Group', 'required');
        // $this->form_validation->set_rules('txt_rel_name', 'Relative Name', 'required');
        // $this->form_validation->set_rules('txt_rel_cont', 'Relative Contact Number', 'required|numeric');
        // $this->form_validation->set_rules('txt_no_child', 'Number of Children', 'required|numeric');
        // $this->form_validation->set_rules('txt_user_name', 'Username', 'required|alpha_numeric');
        // $this->form_validation->set_rules('Password', 'Password', 'required');
        // $this->form_validation->set_rules('cmb_user_level', 'User Level', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     // Validation failed
        //     $errors = validation_errors();
        //     $this->session->set_flashdata('error_message', $errors);
        //     // Handle errors (e.g., display errors to the user)
        // } else {
        $data = array(
            'EmpNo' => $this->input->post('txt_emp_no'),
            'Enroll_No' => $this->input->post('txt_enroll_no'),
            'EPFNO' => $this->input->post('txt_epf_no'),
            'EPF_CAT' => $this->input->post('cmb_epf_cat'),
            // 'Is_EPF' =>$this->input->post('cmb_if_epf'),
            'OCP_Code' => $this->input->post('txt_ocp_code'),
            'EMP_ST_ID' => $this->input->post('cmb_emp_status'),
            'Title' => $this->input->post('cmb_emp_title'),
            'Emp_Full_Name' => $this->input->post('txt_emp_name'),
            'Emp_Name_Int' => $this->input->post('txt_emp_name_init'),
            'Image' => $Image . ".jpg",
            'Gender' => $this->input->post('cmb_gender'),
            'Status' => 1,
            'Dep_ID' => $this->input->post('cmb_dep'),
            'Des_ID' => $this->input->post('cmb_desig'),
            'Grp_ID' => $this->input->post('cmb_group'),
            'RosterCode' => 'RS0001',
            'OTCode' => $this->input->post('cmb_ot_pattern'),
            'B_id' => $this->input->post('cmb_branch'),
            'BR1' => $this->input->post('txt_BG_Allowance1'),
            'BR2' => $this->input->post('txt_BG_Allowance2'),
            'ApointDate' => $this->input->post('txt_appoint_date'),
            'Permanent_Date' => $this->input->post('txt_permanent_date'),
            'Basic_Salary' => $this->input->post('txt_basic_sal'),
            'Incentive' => $this->input->post('txt_Incentive'),
            'Bnk_ID' => $this->input->post('cmb_bank'),
            'Bnk_Br_ID' => $this->input->post('txt_B_Branch'),
            'Account_no' => $this->input->post('txt_account'),
            'Is_EPF' => $Is_EPF,
            'Address' => $this->input->post('txt_address'),
            'District' => $this->input->post('cmb_district'),
            'City' => $this->input->post('txt_city'),
            'Tel_home' => $this->input->post('txt_cont_home'),
            'Tel_mobile' => $this->input->post('txt_cont_mobile'),
            'E_mail' => $this->input->post('txt_email'),
            'NIC' => $this->input->post('txt_nic'),
            'Passport' => $this->input->post('txt_passport'),
            'DOB' => $this->input->post('txt_dob'),
            'Religion' => $this->input->post('cmb_religin'),
            'Civil_status' => $this->input->post('cmb_civil_status'),
            'Blood_group' => $this->input->post('cmb_blood'),
            'Relations_name' => $this->input->post('txt_rel_name'),
            'Relations_Tel' => $this->input->post('txt_rel_cont'),
            'No_Of_Child' => $this->input->post('txt_no_child'),
            'Is_allow_login' => 1,
            'username' => $this->input->post('txt_user_name'),
            'Password' => hash('sha512', $Password),
            'View_Only' => $this->input->post('cmb_view_only'),
            //            'user_p_id' => 2,
            'user_p_id' => $this->input->post('cmb_user_level'),
            'Cmp_ID' => 1,
            'Active_process' => 1,
        );
        $result = $this->Db_model->insertData("tbl_empmaster", $data);
        $this->session->set_flashdata('success_message', 'Employee Added');
        // }
        redirect('/Employee_Management/ADD_Employees/');
    }

    public function Outside_insert_Data()
    {
        $Comp_No = $this->input->post('txt_cmp_no');
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
        $Bank_Name = $this->input->post('bankName');
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

        // Echoing all variables
        echo $Comp_No . "<br>";
        echo $Full_Name . "<br>";
        echo $Name_Initials . "<br>";
        echo $Title . "<br>";
        echo $Gender . "<br>";
        echo $Appoint_Date . "<br>";

        echo $ol . "<br>";
        echo $al . "<br>";
        echo $diploma . "<br>";
        echo $hnd . "<br>";
        echo $degree . "<br>";
        echo $master . "<br>";
        echo $mphil . "<br>";
        echo $phd . "<br>";
        echo $other . "<br>";

        echo $Bank_Name . "<br>";
        echo $Account_No . "<br>";

        echo $Address . "<br>";
        echo $City . "<br>";
        echo $District . "<br>";
        echo $Temp_Address . "<br>";
        echo $Temp_City . "<br>";
        echo $Temp_District . "<br>";
        echo $Contact_Home . "<br>";
        echo $Contact_Mobile . "<br>";
        echo $Email . "<br>";
        echo $Driving_Licence . "<br>";
        echo $NIC . "<br>";
        echo $Passport_No . "<br>";
        echo $DOB . "<br>";
        echo $Blood_Group . "<br>";
        echo $Religion . "<br>";
        echo $Civil_Status . "<br>";

        echo $Rel_Name . "<br>";
        echo $Rel_Contact . "<br>";
        echo $No_of_Children . "<br>";

        echo $Emergency_Name . "<br>";
        echo $Emergency_Tel . "<br>";
        echo $Emergency_Address . "<br>";
        echo $Emergency_Relationship . "<br>";

        echo $Guarantor_Name . "<br>";
        echo $Guarantor_Address . "<br>";
        echo $Guarantor_NIC . "<br>";
        echo $Guarantor_Email . "<br>";
        echo $Guarantor_Contact . "<br>";
        echo $Guarantor_Entitlement . "<br>";
        echo $Bond_End_Date . "<br>";

        echo $Ref1_Name . "<br>";
        echo $Ref1_Designation . "<br>";
        echo $Ref1_NIC . "<br>";
        echo $Ref1_Contact . "<br>";
        echo $Ref1_Email . "<br>";
        echo $Ref1_Address . "<br>";

        echo $Ref2_Name . "<br>";
        echo $Ref2_Designation . "<br>";
        echo $Ref2_NIC . "<br>";
        echo $Ref2_Contact . "<br>";
        echo $Ref2_Email . "<br>";
        echo $Ref2_Address . "<br>";

        echo $User_Name . "<br>";
        echo $User_Level . "<br>";

        // Continue with saving to database, validation, etc.
    }

}
