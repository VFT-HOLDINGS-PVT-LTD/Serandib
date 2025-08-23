<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Emp_Attendance extends CI_Controller
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


    /*
     * Index page in Departmrnt
     */
    public function index()
    {
        $data['title'] = "Employee Groups | HRM System";
        // $data['data_set'] = $this->Db_model->getData('Grp_ID,EmpGroupName,GracePeriod,NosLeaveForMonth,MaxSLS,Allow1stSession,Allow2ndSession,OTPattern,Sup_ID', 'tbl_emp_group');
        $data['data_set'] = $this->Db_model->getfilteredData('SELECT tbl_empmaster.Emp_Full_Name,tbl_emp_group.Grp_ID,tbl_emp_group.EmpGroupName,
        tbl_emp_group.Sup_ID,tbl_setting.Ot_m,tbl_setting.Ot_e,tbl_setting.Ot_d_Late,tbl_setting.Late,tbl_setting.late_Grs_prd,tbl_setting.Ed,
        tbl_setting.Min_time_t_ot_m,tbl_setting.Min_time_t_ot_e,tbl_setting.`Round`,tbl_setting.Hd_d_from,tbl_setting.Dot_f_holyday,tbl_setting.Dot_f_offday
        FROM tbl_setting INNER JOIN tbl_emp_group ON tbl_setting.Group_id = tbl_emp_group.Grp_ID
        INNER JOIN tbl_empmaster ON tbl_emp_group.Sup_ID = tbl_empmaster.EmpNo');
        // $data['data_ot'] = $this->Db_model->getData('OTCode,OTName', 'tbl_ot_pattern_hd');
        $data['emp_sup'] = $this->Db_model->getfilteredData("select EmpNo,Emp_Full_Name,Enroll_No from tbl_empmaster where Status=1");
        // $data['data_level'] = $this->Db_model->getData('user_level_id,user_level_name', 'tbl_user_level_master');
        $data['data_level'] = $this->Db_model->getfilteredData("select user_level_id,user_level_name from tbl_user_level_master order by priority_id asc");
        $data['data_dep'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
        $data['data_sub_dep'] = $this->Db_model->getData('Sub_Dep_ID,Sub_Dep_Name', 'tbl_sub_departments');
        $data['data_full_dep'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_emp_group INNER JOIN tbl_sub_departments ON tbl_emp_group.EmpGroupName = tbl_sub_departments.Sub_Dep_ID INNER JOIN tbl_departments ON tbl_departments.Dep_ID = tbl_emp_group.Sup_ID ");
        $data['data_grp'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_emp_group INNER JOIN tbl_sub_departments ON tbl_emp_group.EmpGroupName = tbl_sub_departments.Sub_Dep_ID");

        $this->load->view('Master/Emp_Attendance/index', $data);
    }

    public function getBranchesByBank()
    {
        $dep_id = $this->input->post('dep_id');
        $branches = $this->Db_model->getfilteredData("SELECT * FROM tbl_sub_departments WHERE tbl_sub_departments.Main_Dep_ID = '$dep_id' "); // Replace with your model method to fetch branches

        echo json_encode($branches);
    }
    /*
     * Insert Departmrnt
     */
    public function insert_data2()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        if (!empty($data['departments'])) {
            foreach ($data['departments'] as $dept) {
                $id = $dept['id'];
                $name = $dept['name'];
                $selected = isset($dept['selected']) ? $dept['selected'] : null;
                $Authority = isset($dept['Authority']) ? $dept['Authority'] : null;

                $parts = explode(' - ', $name);
                $numberOnly = $parts[0];
                $data = array(
                    'TypeID' => 1,
                    'EmpNo' => $numberOnly,
                    'UserLevelID' => $selected,
                    'AuthorityID' => $Authority
                );

                // $result = $this->Db_model->insertData("tbl_active", $data);

                // Example: log or insert into database
                // log_message('info', "ID: $id, Name: $name, Selected: $selected");

                // You can also insert into DB like:
                // $this->db->insert('department_table', ['id' => $id, 'name' => $name, 'selected_option' => $selected]);
            }

            echo json_encode($data['departments']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No departments received']);
        }

    }

    public function insert_data()
    {
        // Read raw JSON input
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // print_r($data);
        // die;

        if (!$data) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Invalid JSON input']));
        }

        // Extract values
        $group_name = $data['group_name'] ?? '';
        $department_id = $data['department_id'] ?? '';
        $settings = $data['settings'] ?? [];
        $departments = $data['departments'] ?? [];

        $query1 = $this->Db_model->getfilteredData("SELECT Grp_ID FROM tbl_emp_group WHERE EmpGroupName = '$group_name' AND Sup_ID = '$department_id'");

        if (empty($query1)) {




            // You can validate required fields here
            // if (empty($group_name) || empty($department_id) || empty($departments)) {
            //     return $this->output
            //         ->set_status_header(400)
            //         ->set_content_type('application/json')
            //         ->set_output(json_encode(['error' => 'Missing required fields']));
            // }

            $data = array(
                'EmpGroupName' => $group_name,
                'GracePeriod' => 0,
                'Sup_ID' => $department_id,
                'NosLeaveForMonth' => 0,
                'MaxSLS' => 0,
                'Allow1stSession' => 0,
                'Allow2ndSession' => 0,
                'OTPattern' => 'OT0001'
            );
            $result = $this->Db_model->insertData("tbl_emp_group", $data);
            $query = $this->Db_model->getfilteredData("SELECT MAX(Grp_ID) as last_id FROM tbl_emp_group");
            $group_id = $query[0]->last_id;
            // $last_in_id = $this->Db_model->getfilteredData("select * from tbl_emp_group where EmpGroupName='$group_name'");
            // $group_id = $last_in_id[0]->Grp_ID;

            // Save settings
            $settings_data = [
                'Group_id' => $group_id,
                'Ot_m' => $settings['ot_morning'] ?? 0,
                'Ot_e' => $settings['ot_evening'] ?? 0,
                'Late' => $settings['late_deduction'] ?? 0,
                'Ed' => $settings['early_departure'] ?? 0,
                'Ot_d_Late' => $settings['late_deduct_ot'] ?? 0,
                'Dot_f_holyday' => $settings['dot_holiday'] ?? 0,
                'Dot_f_offday' => $settings['dot_offday'] ?? 0,
                'Hd_d_from' => $settings['sh_leave'] ?? 0,
                'Round' => $settings['round'] ?? '',
                'late_Grs_prd' => $settings['late_gp'] ?? '',
                'Min_time_t_ot_m' => $settings['min_t_ot'] ?? '',
                'Min_time_t_ot_e' => $settings['min_t_e_ot'] ?? ''
            ];

            // print_r($settings_data);
            // die;

            $result = $this->Db_model->insertData("tbl_setting", $settings_data);

            date_default_timezone_set('Asia/Colombo'); // Set default timezone

            // Get current date and time
            $currentDateTime = date("Y-m-d H:i:s");
            // Save departments
            foreach ($departments as $dept) {
                $parts = explode(' - ', $dept['name']);
                $numberOnly = $parts[0];

                $TypeName = $dept['button_name'];
                $Types = $this->Db_model->getfilteredData("select * from tbl_types where Type='$TypeName'");
                $Typee_id = $Types[0]->ID;

                $dept_data = [
                    'GrpID' => $group_id,
                    'TypeID' => $Typee_id,
                    'EmpNo' => $numberOnly,
                    'UserLevelID' => $dept['selected'],
                    'AuthorityID' => $dept['Authority'],
                    'CurrentData' => $currentDateTime
                ];

                $result = $this->Db_model->insertData("tbl_active", $dept_data);
            }

            return $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode(['success' => true, 'message' => 'Data inserted successfully']));
        } else {
            return $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode(['success2' => true, 'message' => 'Group name already exists for this department']));
        }
    }
    public function get_group_data()
    {
        $group_id = $this->input->post('group_id');

        $all_data = $this->Db_model->getfilteredData("SELECT * FROM tbl_active WHERE GrpID = '$group_id'");

        $grouped_data = [];

        foreach ($all_data as $row) {
            $type_id = $row->TypeID; // 1 to 6 (table index)

            if (!isset($grouped_data[$type_id])) {
                $grouped_data[$type_id] = [];
            }

            $Emp_data = $this->Db_model->getfilteredData("SELECT `Emp_Full_Name`,`EmpNo` FROM tbl_empmaster WHERE Enroll_No = '$row->EmpNo'");
            $Emp_Name = $Emp_data[0]->Emp_Full_Name;
            $Emp_Num = $Emp_data[0]->EmpNo;

            $EmpNameNum = $Emp_Num . ' - ' . $Emp_Name;

            $grouped_data[$type_id][] = [
                'id' => $row->ID,
                'emp_no' => $EmpNameNum,
                'level' => $row->UserLevelID,
                'authority' => $row->AuthorityID
            ];
        }

        if (!empty($grouped_data)) {
            echo json_encode([
                'success' => true,
                'tables' => $grouped_data
            ]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    /*
     * Get Department data
     */
    public function get_details()
    {
        $id = $this->input->post('id');
        // echo $id;
        $whereArray = array('Grp_ID' => $id);
        $this->Db_model->setWhere($whereArray);
        $dataObject = $this->Db_model->getData('Grp_ID,EmpGroupName,GracePeriod,NosLeaveForMonth,MaxSLS,Allow1stSession,Allow2ndSession,Sup_ID', 'tbl_emp_group');
        // $dataObject = $this->Db_model->getfilteredData('SELECT tbl_emp_group.Grp_ID,tbl_emp_group.EmpGroupName,tbl_emp_group.GracePeriod,tbl_emp_group.NosLeaveForMonth,tbl_emp_group.MaxSLS,tbl_emp_group.Allow1stSession,tbl_emp_group.Allow2ndSession,tbl_emp_group.OTPattern,tbl_emp_group.Sup_ID FROM tbl_emp_group INNER JOIN tbl_empmaster ON tbl_emp_group.Sup_ID = tbl_empmaster.Enroll_No ');
        $array = (array) $dataObject;
        echo json_encode($array);
    }
    public function updateAttView()
    {
        $id = $this->input->get('id');
        //    echo "OkM " . $id;
        $whereArray = array('ID' => $id);
        $this->Db_model->setWhere($whereArray);
        $data['data_set'] = $this->Db_model->getfilteredData("SELECT tbl_empmaster.Emp_Full_Name,tbl_empmaster.EmpNo,tbl_emp_group.Grp_ID,tbl_emp_group.EmpGroupName,
        tbl_emp_group.Sup_ID,tbl_setting.Ot_m,tbl_setting.Ot_e,tbl_setting.Ot_d_Late,tbl_setting.Late,tbl_setting.late_Grs_prd,tbl_setting.Ed,
        tbl_setting.Min_time_t_ot_m,tbl_setting.Min_time_t_ot_e,tbl_setting.`Round`,tbl_setting.Hd_d_from,tbl_setting.Dot_f_holyday,tbl_setting.Dot_f_offday
        FROM tbl_setting INNER JOIN tbl_emp_group ON tbl_setting.Group_id = tbl_emp_group.Grp_ID
        INNER JOIN tbl_empmaster ON tbl_emp_group.Sup_ID = tbl_empmaster.EmpNo
         WHERE tbl_emp_group.Grp_ID = '$id';");
        $data['emp_sup'] = $this->Db_model->getfilteredData("select EmpNo,Emp_Full_Name,Enroll_No from tbl_empmaster where Status=1");
        $data['title'] = "Employee Group | HRM System";
        $this->load->view('Master/Employee_Groups/update', $data);
    }
    /*
     * Edit Data
     */
    public function edit()
    {
        $group_id = $this->input->post("txt_group_id");
        $ot_m = $this->input->post('ot_m');
        $ot_e = $this->input->post('ot_e');
        $min_time_to_ot = $this->input->post('min_t_e_ot');
        $min_time_to_mor_ot = $this->input->post('min_t_ot');
        $round = $this->input->post('round');
        $late = $this->input->post('late');
        $ed = $this->input->post('ed');
        $late_deduct_for_full_leave_in_halfd = $this->input->post('sh_lv');
        $late_ded_from_ot = $this->input->post('late_ot');
        $dot_for_holyday = $this->input->post('dot_holyday');
        $dot_for_off = $this->input->post('dot_offday');
        $late_grace = $this->input->post('late_gp');
        $ot_mo = 0;
        $ot_ev = 0;
        $late_status = 0;
        $ed_status = 0;
        $late_deduct_leave_in_halfday = 0;
        $late_deduct_from_ot = 0;
        $dot_holyday = 0;
        $dot_offday = 0;
        if ($ot_m == 'on') {
            $ot_mo = 1;
        }
        if ($ot_e == 'on') {
            $ot_ev = 1;
        }
        if ($late == 'on') {
            $late_status = 1;
        }
        if ($ed == 'on') {
            $ed_status = 1;
        }
        if ($dot_for_holyday == 'on') {
            $dot_holyday = 1;
        }
        if ($dot_for_off == 'on') {
            $dot_offday = 1;
        }
        if ($late_deduct_for_full_leave_in_halfd == 'on') {
            $late_deduct_leave_in_halfday = 1;
        }
        if ($late_ded_from_ot == 'on') {
            $late_deduct_from_ot = 1;
        }
        $FSt = $this->input->post('chk_1st');
        if ($FSt == null) {
            $FSt = 0;
        } elseif ($FSt == 'on') {
            $FSt = 1;
        }
        $Snd = $this->input->post('chk_2nd');
        if ($Snd == null) {
            $Snd = 0;
        } elseif ($Snd == 'on') {
            $Snd = 1;
        }
        $sup = $this->input->post('cmb_Supervisor');
        if ($sup == null) {
            $sup = 9000;
        }
        $group_name = $this->input->post('txt_group_name');
        $data = array("EmpGroupName" => $group_name, "Sup_ID" => $sup);
        $whereArr = array("Grp_ID" => $group_id);
        $result1 = $this->Db_model->updateData("tbl_emp_group", $data, $whereArr);
        $data1 = array(
            'Ot_m' => $ot_mo,
            'Ot_e' => $ot_ev,
            'Ot_d_Late' => $late_deduct_from_ot,
            'Late' => $late_status,
            'Ed' => $ed_status,
            'Min_time_t_ot_e' => $min_time_to_ot,
            'Min_time_t_ot_m' => $min_time_to_mor_ot,
            'Dot_f_holyday' => $dot_holyday,
            'Dot_f_offday' => $dot_offday,
            'Hd_d_from' => $late_deduct_leave_in_halfday,
            'Round' => $round,
            'late_Grs_prd' => $late_grace,
        );
        $whereArr1 = array(
            "Group_id" => $group_id
        );
        $result = $this->Db_model->updateData("tbl_setting", $data1, $whereArr1);
        redirect(base_url() . "Master/Employee_Groups");
    }

    public function update_data_all()
    {
        // Read raw JSON input
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!$data) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Invalid JSON input']));
        }

        // Extract values
        $group_id = $data['groupId'] ?? '';  // ✅ Keep groupId for update
        $group_name = $data['group_name'] ?? '';
        $department_id = $data['department_id'] ?? '';
        $settings = $data['settings'] ?? [];
        $departments = $data['departments'] ?? [];

        // 🔹 Update emp group
        $updateGroup = [
            'EmpGroupName' => $group_name,
            'Sup_ID' => $department_id,
            'GracePeriod' => 0,
            'NosLeaveForMonth' => 0,
            'MaxSLS' => 0,
            'Allow1stSession' => 0,
            'Allow2ndSession' => 0,
            'OTPattern' => 'OT0001'
        ];
        $this->Db_model->updateData("tbl_emp_group", $updateGroup, ['Grp_ID' => $group_id]);

        // 🔹 Update settings
        $settings_data = [
            'Ot_m' => $settings['ot_morning'] ?? 0,
            'Ot_e' => $settings['ot_evening'] ?? 0,
            'Late' => $settings['late_deduction'] ?? 0,
            'Ed' => $settings['early_departure'] ?? 0,
            'Ot_d_Late' => $settings['late_deduct_ot'] ?? 0,
            'Dot_f_holyday' => $settings['dot_holiday'] ?? 0,
            'Dot_f_offday' => $settings['dot_offday'] ?? 0,
            'Hd_d_from' => $settings['sh_leave'] ?? 0,
            'Round' => $settings['round'] ?? '',
            'late_Grs_prd' => $settings['late_gp'] ?? '',
            'Min_time_t_ot_m' => $settings['min_t_ot'] ?? '',
            'Min_time_t_ot_e' => $settings['min_t_e_ot'] ?? ''
        ];
        $this->Db_model->updateData("tbl_setting", $settings_data, ['Group_id' => $group_id]);

        // 🔹 Update departments
        date_default_timezone_set('Asia/Colombo');
        $currentDateTime = date("Y-m-d H:i:s");

        // ✅ Clear existing rows for this group before re-inserting
        $this->db->where('GrpID', $group_id)->delete('tbl_active');

        // ✅ Insert updated departments
        foreach ($departments as $dept) {
            // Extract EmpNo from "1234 - Name"
            $parts = explode(' - ', $dept['name']);
            $numberOnly = trim($parts[0]);

            $TypeName = $dept['button_name'];
            $Types = $this->Db_model->getfilteredData("SELECT * FROM tbl_types WHERE Type='$TypeName'");

            if (empty($Types)) {
                continue; // skip if no matching type
            }

            $Typee_id = $Types[0]->ID;

            $dept_data = [
                'GrpID' => $group_id,
                'TypeID' => $Typee_id,
                'EmpNo' => $numberOnly,
                'UserLevelID' => $dept['selected'],
                'AuthorityID' => $dept['Authority'],
                'CurrentData' => $currentDateTime
            ];

            $this->Db_model->insertData("tbl_active", $dept_data);
        }

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => true, 'message' => 'Data updated successfully']));
    }
    public function mainEdit($id)
    {
        $data['grp_data_set'] = $this->Db_model->getfilteredData("SELECT * FROM tbl_emp_group INNER JOIN tbl_sub_departments ON tbl_emp_group.EmpGroupName = tbl_sub_departments.Sub_Dep_ID INNER JOIN tbl_departments ON tbl_departments.Dep_ID = tbl_emp_group.Sup_ID INNER JOIN tbl_setting ON tbl_setting.Group_id = tbl_emp_group.Grp_ID WHERE tbl_emp_group.Grp_ID = '$id'");
        $data['data_dep'] = $this->Db_model->getData('Dep_ID,Dep_Name', 'tbl_departments');
        $data['data_sub_dep'] = $this->Db_model->getData('Sub_Dep_ID,Sub_Dep_Name', 'tbl_sub_departments');
        $data['data_id'] = $id;
        $data['data_level'] = $this->Db_model->getfilteredData("select user_level_id,user_level_name from tbl_user_level_master order by priority_id asc");
        $this->load->view('Master/Emp_Attendance/edit', $data);

        // print_r($data);

    }
    /*
     * Delete Data
     */
    public function ajax_delete($id)
    {

        // echo $id;
        $table = "tbl_emp_group";
        $where = 'Grp_ID';
        $this->Db_model->delete_by_id($id, $where, $table);
        echo json_encode(array("status" => TRUE));
    }
}

?>