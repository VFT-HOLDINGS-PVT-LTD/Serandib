<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_Department extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!($this->session->userdata('login_user'))) {
            redirect(base_url() . "");
        }
        /*
         * Load Database model
         */
        $this->load->model('Db_model', '', TRUE);
    }

    /*
     * Index page in Departmrnt
     */

    public function index() {

        $data['title'] = "Departmrnt | HRM System";
        $data['main_data_set'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
        $data['data_set'] = $this->Db_model->getData('Sub_Dep_ID,Sub_Dep_Name,Main_Dep_ID', 'tbl_sub_departments');
        $data['data_full_dep'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_sub_departments INNER JOIN tbl_departments ON tbl_sub_departments.Main_Dep_ID = tbl_departments.Dep_ID");
        $this->load->view('Master/Sub_Department/index', $data);
    }

    /*
     * Insert Departmrnt
     */

    public function insertSubDepartment() {

        $data = array(
            'Sub_Dep_Name' => $this->input->post('txt_dep_name'),
            'Main_Dep_ID' => $this->input->post('txt_main_dep_name')
        );

        $result = $this->Db_model->insertData("tbl_sub_departments", $data);


        $this->session->set_flashdata('success_message', 'New Department has been added successfully');

        
        redirect(base_url() . 'Master/Sub_Department/');
    }

    /*
     * Get Department data
     */

    public function get_details() {
    $id = $this->input->post('id');
    $data['data'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_sub_departments 
        INNER JOIN tbl_departments 
        ON tbl_sub_departments.Main_Dep_ID = tbl_departments.Dep_ID  
        WHERE tbl_sub_departments.Sub_Dep_ID = '".$id."' "); 
    $data['data_dep'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
    echo json_encode($data);
}

    /*
     * Edit Data
     */

    public function edit() {
        $ID = $this->input->post("id", TRUE);
        $D_Name = $this->input->post("Sub_Dep_Name", TRUE);
        $Dep_Name = $this->input->post("department_select", TRUE);

        // echo json_encode(array("Sub_Dep_ID" => $ID, "Sub_Dep_Name" => $D_Name));

        $data = array("Sub_Dep_Name" => $D_Name,
            "Main_Dep_ID" => $Dep_Name
        );
        $whereArr = array("Sub_Dep_ID" => $ID);
        $result = $this->Db_model->updateData("tbl_sub_departments", $data, $whereArr);
        redirect(base_url() . "Master/Sub_Department");
    }

    /*
     * Delete Data
     */

    public function ajax_delete($id) {
        // echo $id;

        $tblAct = $this->Db_model->getfilteredData("SELECT * FROM tbl_sub_departments WHERE Sub_Dep_ID = '".$id."'");
        $DepID = $tblAct[0]->Main_Dep_ID;
        $Sub_Dep_Name = $tblAct[0]->Sub_Dep_ID;

        // echo $DepID;
        // echo $Sub_Dep_Name;

        $tblGrp = $this->Db_model->getfilteredData("SELECT * FROM tbl_emp_group WHERE Sup_ID = '".$DepID."' AND EmpGroupName = '".$Sub_Dep_Name."'");

        if (!empty($tblGrp)) {
            echo json_encode(array("status" => FALSE, "message" => "This Sub Department is used in Approve Type. You cannot delete it."));
            return;
            // echo '1';
        }else{
            $table = "tbl_sub_departments";
            $where = 'Sub_Dep_ID';
            $this->Db_model->delete_by_id($id, $where, $table);
            echo json_encode(array("status" => TRUE));
        }

    }

}
