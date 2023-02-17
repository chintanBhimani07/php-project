<?php
session_start();
ini_set('display_errors', 1);

class Controller
{
    private $db;

    public function __construct()
    {
        ob_start();
        include '../config/db.config.php';
        $this->db = $con;
    }

    public function __destruct()
    {
        $this->db->close();
        ob_end_flush();
    }

    private function guidV4($data = null)
    {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }


    public function login_application_user()
    {
        extract($_POST);
        $query = $this->db->query("SELECT * FROM users where email = '" . $email . "' and password = '" . md5($password) . "'  ");
        if ($query->num_rows > 0) {
            foreach ($query->fetch_array() as $key => $val) {
                if ($key != 'password' && !is_numeric($key)) {
                    $_SESSION['login_' . $key] = $val;
                }
            }
            return 1;
        } else {
            return 2;
        }
    }

    public function employee_add()
    {
        extract($_POST);
        $id = $this->guidV4();
        $data = "emp_id='$id'";
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('emp_id', 'password')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $data .= ", $k='$v' ";
                }
            }
        }
        $checkRowExists = $this->db->query("SELECT * FROM employees where emp_email ='$emp_email' ")->num_rows;
        if ($checkRowExists > 0) {
            return 2;
        } else {
            if (isset($_FILES['emp_profile_pic']) && $_FILES['emp_profile_pic']['tmp_name'] != '') {
                $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['emp_profile_pic']['name'];
                $data .= ", emp_profile_pic='$fname'";
                $move = move_uploaded_file($_FILES['emp_profile_pic']['tmp_name'], '../assets/uploads/' . $fname);
            } else {
                $fname = 'default_user.jpg';
            }
            // $save = $this->db->query("INSERT INTO employees SET emp_id='$id', emp_first_name='$emp_first_name', emp_last_name='$emp_last_name', emp_description='$emp_description', emp_gender='$emp_gender', emp_dob='$emp_dob', emp_mob=$emp_mob, emp_email='$emp_email', emp_address='$emp_address', emp_department='$emp_department', emp_designation='$emp_designation', emp_hod_name='$emp_hod_name', emp_joining_date='$emp_joining_date', emp_confirmation_date='$emp_confirmation_date', emp_leaving_date='$emp_leaving_date', emp_working_hours='$emp_working_hours', emp_profile_pic='$fname'");
            $query = $this->db->query("INSERT INTO employees SET $data");
        }
        if ($query) {
            return $query;
        }
    }

    public function employee_delete()
    {
        extract($_POST);
        $query = $this->db->query("DELETE FROM employees where emp_id ='$emp_id'");
        if ($query) {
            return 1;
        }
    }

    public function employee_edit()
    {
        extract($_POST);
        $data = "";
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('emp_id', 'password','oldFile')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $data .= ", $k='$v' ";
                }
            }
        }
        if (isset($_FILES['emp_profile_pic']) && $_FILES['emp_profile_pic']['tmp_name'] != '') {
            $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['emp_profile_pic']['name'];
            $data .= ", emp_profile_pic='$fname'";
            $move = move_uploaded_file($_FILES['emp_profile_pic']['tmp_name'], '../assets/uploads/' . $fname);
            if(file_exists('../assets/uploads/'.$oldFile)){
                unlink('../assets/uploads/'.$oldFile);
            }
        } else {
            $fname = 'default_user.jpg';
        }
        $query = $this->db->query("UPDATE employees SET emp_first_name='$emp_first_name', emp_last_name='$emp_last_name', emp_description='$emp_description', emp_gender='$emp_gender', emp_dob='$emp_dob', emp_mob=$emp_mob, emp_email='$emp_email', emp_address='$emp_address', emp_department='$emp_department', emp_designation='$emp_designation', emp_hod_name='$emp_hod_name', emp_joining_date='$emp_joining_date', emp_confirmation_date='$emp_confirmation_date', emp_leaving_date='$emp_leaving_date', emp_working_hours='$emp_working_hours', emp_profile_pic='$fname' WHERE emp_id='$emp_id'");
        // $query = $this->db->query("UPDATE employees SET emp_first_name='$emp_first_name' WHERE emp_id='$emp_id'");
        if ($query) {
            return $query;
        }
    }

    public function department_add(){
        extract($_POST);
        $id = $this->guidV4();
        $data = "department_id='$id'";
        foreach ($_POST as $k => $v) {
            if (!in_array($k, array('department_id', 'password')) && !is_numeric($k)) {
                if ($v != '0000-00-00' || !empty($v)) {
                    $data .= ", $k='$v' ";
                }
            }
        }
        $checkRowExists = $this->db->query("SELECT * FROM departments where department_name ='$department_name' ")->num_rows;
        if ($checkRowExists > 0) {
            return 2;
        } else {
            // $save = $this->db->query("INSERT INTO employees SET emp_id='$id', emp_first_name='$emp_first_name', emp_last_name='$emp_last_name', emp_description='$emp_description', emp_gender='$emp_gender', emp_dob='$emp_dob', emp_mob=$emp_mob, emp_email='$emp_email', emp_address='$emp_address', emp_department='$emp_department', emp_designation='$emp_designation', emp_hod_name='$emp_hod_name', emp_joining_date='$emp_joining_date', emp_confirmation_date='$emp_confirmation_date', emp_leaving_date='$emp_leaving_date', emp_working_hours='$emp_working_hours', emp_profile_pic='$fname'");
            $query = $this->db->query("INSERT INTO departments SET $data");
        }
        if ($query) {
            return $query;
        }
    }
}
