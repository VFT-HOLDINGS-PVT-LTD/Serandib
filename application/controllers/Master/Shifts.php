<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shifts extends CI_Controller {

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
     * Index page
     */

    public function index() {

        $data['title'] = "Shifts | HRM System";
        $data['data_set'] = $this->Db_model->getData('ShiftCode,ShiftName,FromTime,ToTime,NextDay,DayType,FHDSessionEndTime,SHDSessionStartTime,ShiftGap', 'tbl_shifts');
        $this->load->view('Master/Shifts/index', $data);
    }

    /*
     * Insert Data
     */

    public function insert_data() {

//        $FSt = $this->input->post('chk_1st');
//        if ($FSt == null) {
//            $FSt = 0;
//        } elseif ($FSt == 'on') {
//            $FSt = 1;
//        }
//
//        $Snd = $this->input->post('chk_2nd');
//        if ($Snd == null) {
//            $Snd = 0;
//        } elseif ($Snd == 'on') {
//            $Snd = 1;
//        }
        $day = $this->input->post('day');
            if ($day == null) {
                $day = 0;
            } elseif ($day == 1) {
                $day = 1;
            }

        $data = array(
            'ShiftName' => $this->input->post('txt_shift_name'),
            'FromTime' => $this->input->post('txt_from_time'),
            'ToTime' => $this->input->post('txt_to_time'),
            'FHDSessionEndTime' => $this->input->post('txt_cutoff'),
             'NextDay' => $day,
            'DayType' => $this->input->post('day_type'),
            'ShiftGap' => $this->input->post('shift_Gap')
        );

        $result = $this->Db_model->insertData("tbl_shifts", $data);


        $this->session->set_flashdata('success_message', 'New Shift has been added successfully');


        redirect('/Master/Shifts/');
    }

    /*
     * Get data
     */

    public function get_details() {
        $ShiftCode = $this->input->post('ShiftCode');

        $whereArray = array('ShiftCode' => $ShiftCode);

        $this->Db_model->setWhere($whereArray);
        $dataObject = $this->Db_model->getData('ShiftCode,ShiftName,FromTime,ToTime,NextDay,DayType,FHDSessionEndTime,SHDSessionStartTime,ShiftGap', 'tbl_shifts');

        $array = (array) $dataObject;
        echo json_encode($array);
    }

//     public function get_details() {
//     $ShiftCode = $this->input->post('ShiftCode');

//     $query = $this->db->query("
//         SELECT ShiftCode, ShiftName, FromTime, ToTime, NextDay, DayType, 
//                FHDSessionEndTime, SHDSessionStartTime, ShiftGap
//         FROM tbl_shifts 
//         WHERE ShiftCode = ?", [$ShiftCode]);

//     $row = $query->row_array(); // return single row as array

//     echo json_encode($row);
// }

    /*
     * Edit Data
     */

    public function edit() {
        $ShiftCode = $this->input->post("ShiftCode", TRUE);
        $ShiftName = $this->input->post("ShiftName", TRUE);
        $FromTime = $this->input->post("FromTime", TRUE);
        $ToTime = $this->input->post("ToTime", TRUE);
        $ShiftGap = $this->input->post("ShiftGap", TRUE);
        $NextDay = $this->input->post("nextDay", TRUE);
        $DayType = $this->input->post("dayType", TRUE);
        $cutoff = $this->input->post("CutOffTime", TRUE);
        
        
        
        $data = array("ShiftName" => $ShiftName,"FromTime"=>$FromTime,"ToTime"=>$ToTime,"ShiftGap"=>$ShiftGap, "NextDay"=>$NextDay, "DayType"=>$DayType, "FHDSessionEndTime"=>$cutoff);
        $whereArr = array("ShiftCode" => $ShiftCode);
        $result = $this->Db_model->updateData("tbl_shifts", $data, $whereArr);
        redirect(base_url() . "Master/Shifts");
    }

    /*
     * Delete Data
     */

    public function ajax_delete($id) {
        $table = "tbl_shifts";
        $where = 'ShiftCode';
        $this->Db_model->delete_by_id($id, $where, $table);
        echo json_encode(array("status" => TRUE));
    }

}
