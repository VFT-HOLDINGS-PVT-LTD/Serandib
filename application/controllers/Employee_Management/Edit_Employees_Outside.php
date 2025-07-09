<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Edit_Employees_Outside extends CI_Controller
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
        $this->load->view('Employee_Management/Edit_Employees_Outside/index', $data);
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


        $data['data_set'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_empmaster_outside where Cmp_ID='" . $id . "'");

        //        echo '<pre>' . var_export($data, true) . '</pre>';die;
        //        var_dump($data);die;


        $this->load->view('Employee_Management/Edit_Employees_Outside/index', $data);
    }

    public function update_emp()
    {

        $Emp_No = $this->input->post('txt_emp_no');

        $Image = md5($Emp_No);


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
            $error = array('error' => $this->upload->display_errors());

            //            var_dump($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            //            var_dump($data);
        }




        $data = array(
            'Enroll_No' => $this->input->post('txt_enroll_no'),
            'EPFNO' => $this->input->post('txt_epf_no'),
            'EPF_CAT' => $this->input->post('cmb_epf_cat'),
            'OCP_Code' => $this->input->post('txt_ocp_code'),
            'EMP_ST_ID' => $this->input->post('cmb_emp_status'),
            'Title' => $this->input->post('cmb_emp_title'),
            'Emp_Full_Name' => $this->input->post('txt_emp_name'),
            'Emp_Name_Int' => $this->input->post('txt_emp_name_init'),
            'Image' => $Image . ".jpg",
            'Gender' => $this->input->post('cmb_gender'),
            'Status' => $st,
            'Dep_ID' => $this->input->post('cmb_dep'),
            'Des_ID' => $this->input->post('cmb_desig'),
            'Grp_ID' => $this->input->post('cmb_group'),
            'RosterCode' => $this->input->post('cmb_roster_pattern'),
            'OTCode' => $this->input->post('cmb_ot_pattern'),
            'B_id' => $this->input->post('cmb_branch'),
            'ApointDate' => $this->input->post('txt_appoint_date'),
            'Permanent_Date' => $this->input->post('txt_permanent_date'),
            'Basic_Salary' => $this->input->post('txt_basic_sal'),
            'Incentive' => $this->input->post('txt_Incentive'),
            'Fixed_Allowance' => $this->input->post('txt_BG_Allowance'),
            'BR1' => $this->input->post('txt_BG_Allowance1'),
            'BR2' => $this->input->post('txt_BG_Allowance2'),
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
            //            'Is_allow_login' => $Is_Allow,
            'username' => $this->input->post('txt_user_name'),
            'user_p_id' => $this->input->post('cmb_user_level'),
            'View_Only' => $this->input->post('cmb_view_only'),

            'Cmp_ID' => 1,
            'Active_process' => 1,
        );

        //        $result = $this->Db_model->insertData("tbl_empmaster", $data);

        $whereArr = array("EmpNo" => $this->input->post("txt_emp_no"));
        $result = $this->Db_model->updateData("tbl_empmaster", $data, $whereArr);


        $this->session->set_flashdata('success_message', 'Update Employee has been updated successfully');


        redirect('/Employee_Management/View_Employees/');
    }
}
