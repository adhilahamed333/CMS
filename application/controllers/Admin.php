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
            $this->admin_model->insert_basics($basics);
            $this->admin_model->insert_personals($personals);
            $this->admin_model->insert_familys($family);
            $this->admin_model->insert_admissions($admission);
            $this->admin_model->insert_hostels($hostel);
            $this->admin_model->insert_academic_entrys($academic_entry);
            $this->admin_model->insert_academic_exits($academic_exits);
            redirect('admin/student_inserted');
        } else {
            $content['error_msg'] = "Passwords Do Not Match";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('admin/student.php', $content);
            $this->load->view('templates/footer.php');
        }
    }

    public function student_inserted()
    {
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/student_inserted.php');
        $this->load->view('templates/footer.php');
    }
}
