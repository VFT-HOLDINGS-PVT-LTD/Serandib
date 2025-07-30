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
        $whereArray = array('Sub_Dep_ID' => $id);

        $this->Db_model->setWhere($whereArray);
        $dataObject = $this->Db_model->getData('Sub_Dep_ID,Sub_Dep_Name', 'tbl_sub_departments');

        $array = (array) $dataObject;
        echo json_encode($array);
    }

    /*
     * Edit Data
     */

    public function edit() {
        $ID = $this->input->post("id", TRUE);
        $D_Name = $this->input->post("Sub_Dep_Name", TRUE);


        $data = array("Sub_Dep_Name" => $D_Name);
        $whereArr = array("Sub_Dep_ID" => $ID);
        $result = $this->Db_model->updateData("tbl_sub_departments", $data, $whereArr);
        redirect(base_url() . "Master/Sub_Department");
    }

    /*
     * Delete Data
     */

    public function ajax_delete($id) {
        $table = "tbl_sub_departments";
        $where = 'Sub_Dep_ID';
        $this->Db_model->delete_by_id($id, $where, $table);
        echo json_encode(array("status" => TRUE));
    }

}
