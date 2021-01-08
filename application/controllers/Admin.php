<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model');
    }

    public function add_user()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $content["error_msg"] = "";
            $this->load->view('admin/add_user', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home');
        }
    }

    public function role()
    {
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');

        $content["error_msg"] = "";
        $role = $this->input->post('role');
        if ($role == "student") {
            $this->load->view('admin/student.php', $content);
        } elseif ($role == "advisor") {
            $this->load->view('admin/advisor.php', $content);
        } elseif ($role == "hod") {
            $this->load->view('admin/hod.php', $content);
        } elseif ($role == "principal") {
            $this->load->view('admin/principal.php', $content);
        } elseif ($role == "office") {
            $this->load->view('admin/office.php', $content);
        } elseif ($role == 0) {
            $content["error_msg"] = "Select a Role";
            $this->load->view('admin/add_user', $content);
        }
        $this->load->view('templates/footer.php');
    }

    public function student()
    {
        $password = md5($this->input->post('password'));
        $cpassword = md5($this->input->post('cpassword'));
        $users = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 'student',
        );
        $admissionno = $this->input->post('admissionno');

        $basics = array(
            'admission_no' => $admissionno,
            'username' => $this->input->post('username'),
            'course' => $this->input->post('course'),
            'branch' => $this->input->post('branch'),
            'semester' => $this->input->post('semester'),
            'batch' => $this->input->post('batch'),
            'date_of_joining' => $this->input->post('date_of_joining'),
            'university_reg_no' => $this->input->post('univesity_reg_no'),
        );
        $personals = array(
            'admission_no' => $admissionno,
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'phone' => $this->input->post('phone'),
            'mobile' => $this->input->post('mobile'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'category' => $this->input->post('category'),
        );
        $family = array(
            'admission_no' => $admissionno,
            'name_of_fm' => $this->input->post('name_of_fm'),
            'occupation_of_fm' => $this->input->post('occupation_of_fm'),
            'address_of_fm' => $this->input->post('address_of_fm'),
            'phone_of_fm' => $this->input->post('phone_of_fm'),
            'email_of_fm' => $this->input->post('email_of_fm'),
            'name_of_lg' => $this->input->post('name_of_lg'),
            'relation_with_lg' => $this->input->post('relation_with_lg'),
            'occupation_of_lg' => $this->input->post('occupation_of_lg'),
            'address_of_lg' => $this->input->post('address_of_lg'),
            'phone_of_lg' => $this->input->post('phone_of_lg'),
            'email_of_lg' => $this->input->post('email_of_lg'),
        );
        $admission = array(
            'admission_no' => $admissionno,
            'date_of_admission' => $this->input->post('date_of_admission'),
            'adcard_memo_no' => $this->input->post('adcard_memo_no'),
            'rank' => $this->input->post('rank'),
            'category_admission' => $this->input->post('catagory_admission'),
        );
        $hostel = array(
            'admission_no' => $admissionno,
            'hostel_name' => $this->input->post('hostel_name'),
            'date_of_admission' => $this->input->post('date_of_hadmission'),
        );
        $academic_entry = array(
            'admission_no' => $admissionno,
            'qualifying_exam' => $this->input->post('qualifying_exam'),
            'period_of_study' => $this->input->post('period_of_study'),
            'name_of_institution' => $this->input->post('name_of_institution'),
            'university_or_board' => $this->input->post('univercity_or_board'),
            'total_marks_secured' => $this->input->post('total_marks_secured'),
            'max_mark' => $this->input->post('max_mark'),
            'tc_or_cc_no' => $this->input->post('tc_or_cc_no'),
            'date_of_tc_or_cc' => $this->input->post('date_of_tc_or_cc'),
        );
        $academic_exits = array(
            'admission_no' => $admissionno,
        );

        if ($password == $cpassword) {
            $this->admin_model->insert_users($users);
            $this->admin_model->insert_sbasics($basics);
            $this->admin_model->insert_personals($personals);
            $this->admin_model->insert_familys($family);
            $this->admin_model->insert_admissions($admission);
            $this->admin_model->insert_hostels($hostel);
            $this->admin_model->insert_academic_entrys($academic_entry);
            $this->admin_model->insert_academic_exits($academic_exits);
            redirect('admin/record_inserted');
        } else {
            $content['error_msg'] = "Passwords Do Not Match";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/student.php', $content);
            $this->load->view('templates/footer.php');
        }
    }

    public function record_inserted()
    {
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/record_inserted.php');
        $this->load->view('templates/footer.php');
    }

    public function advisor()
    {
        $password = md5($this->input->post('password'));
        $cpassword = md5($this->input->post('cpassword'));
        $users = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 'advisor',
        );


        $basics = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'staff_id' => $this->input->post('staff_id'),
            'branch_in_charge' => $this->input->post('branch_in_charge'),
            'batch_in_charge' => $this->input->post('batch_in_charge'),
        );
        if ($password == $cpassword) {
            $this->admin_model->insert_users($users);
            $this->admin_model->insert_abasics($basics);

            redirect('admin/record_inserted');
        } else {
            $content['error_msg'] = "Passwords Do Not Match";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/advisor.php', $content);
            $this->load->view('templates/footer.php');
        }
    }

    public function hod()
    {
        $password = md5($this->input->post('password'));
        $cpassword = md5($this->input->post('cpassword'));
        $users = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 'hod',
        );


        $basics = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'staff_id' => $this->input->post('staff_id'),
            'branch_in_charge' => $this->input->post('branch_in_charge'),
        );
        if ($password == $cpassword) {
            $this->admin_model->insert_users($users);
            $this->admin_model->insert_hbasics($basics);

            redirect('admin/record_inserted');
        } else {
            $content['error_msg'] = "Passwords Do Not Match";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/advisor.php', $content);
            $this->load->view('templates/footer.php');
        }
    }

    public function principal()
    {
        $password = md5($this->input->post('password'));
        $cpassword = md5($this->input->post('cpassword'));
        $users = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 'principal',
        );


        $basics = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'staff_id' => $this->input->post('staff_id'),
        );
        if ($password == $cpassword) {
            $this->admin_model->insert_users($users);
            $this->admin_model->insert_pbasics($basics);

            redirect('admin/record_inserted');
        } else {
            $content['error_msg'] = "Passwords Do Not Match";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/advisor.php', $content);
            $this->load->view('templates/footer.php');
        }
    }

    public function office()
    {
        $password = md5($this->input->post('password'));
        $cpassword = md5($this->input->post('cpassword'));
        $users = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => 'office',
        );


        $basics = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'staff_id' => $this->input->post('staff_id'),
            'section_in_charge' => $this->input->post('section_in_charge'),
        );
        if ($password == $cpassword) {
            $this->admin_model->insert_users($users);
            $this->admin_model->insert_obasics($basics);

            redirect('admin/record_inserted');
        } else {
            $content['error_msg'] = "Passwords Do Not Match";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/advisor.php', $content);
            $this->load->view('templates/footer.php');
        }
    }

    public function add_sub()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $content["error_msg"] = "";
            $this->load->view('admin/add_sub', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home');
        }
    }

    public function sub()
    {

        $subs = array(
            'course_code' => $this->input->post('course_code'),
            'course_name' => $this->input->post('course_name'),
            'semester' => $this->input->post('sem'),
            'credits' => $this->input->post('credit'),
            'slot' => $this->input->post('slot')
        );
        $this->admin_model->insert_subs($subs);
        redirect('admin/record_inserted');
    }

    public function add_req()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $content["error_msg"] = "";
            $this->load->view('admin/add_req', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home');
        }
    }

    public function req()
    {

        $req = array(
            'type' => $this->input->post('type'),
            'section' => $this->input->post('section')
        );
        $this->admin_model->insert_req($req);
        redirect('admin/record_inserted');
    }

    public function reset_pass()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $content["error_msg"] = "";
            $this->load->model('message_model');
            $content['students'] = $this->message_model->fetch_students($_SESSION['username']);
            $content['advisors'] = $this->message_model->fetch_advisors($_SESSION['username']);
            $content['hods'] = $this->message_model->fetch_hods($_SESSION['username']);
            $content['principals'] = $this->message_model->fetch_principals($_SESSION['username']);
            $content['office'] = $this->message_model->fetch_office($_SESSION['username']);
            $this->load->view('admin/reset_pass', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home');
        }
    }

    public function reset()
    {
        $apassword = md5($this->input->post('apassword'));
        $this->load->model('users_model');
        $is_valid = $this->users_model->validate($_SESSION['username'], $apassword);
        if ($is_valid) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            if ($password == $cpassword && $password != '' && $cpassword != '') {
                $password = md5($password);
                $this->users_model->update_password($username, $password);
                echo "****";
            } else {
                $content['error_msg'] = "Passwords Do Not Match";
                $this->load->model('message_model');
                $content['students'] = $this->message_model->fetch_students($_SESSION['username']);
                $content['advisors'] = $this->message_model->fetch_advisors($_SESSION['username']);
                $content['hods'] = $this->message_model->fetch_hods($_SESSION['username']);
                $content['principals'] = $this->message_model->fetch_principals($_SESSION['username']);
                $content['office'] = $this->message_model->fetch_office($_SESSION['username']);
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('admin/reset_pass.php', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            $content['error_msg'] = "Admin Password Incorrect";
            $this->load->model('message_model');
            $content['students'] = $this->message_model->fetch_students($_SESSION['username']);
            $content['advisors'] = $this->message_model->fetch_advisors($_SESSION['username']);
            $content['hods'] = $this->message_model->fetch_hods($_SESSION['username']);
            $content['principals'] = $this->message_model->fetch_principals($_SESSION['username']);
            $content['office'] = $this->message_model->fetch_office($_SESSION['username']);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/reset_pass.php', $content);
            $this->load->view('templates/footer.php');
        }
    }
}
