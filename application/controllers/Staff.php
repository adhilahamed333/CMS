<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff/profile_model');
        $this->load->model('staff/request_model');
        $this->load->model('staff/myclass_model');
    }

    public function profile()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor') {

                $content['sdetails'] = $this->profile_model->fetch_adetails($_SESSION['staff_id']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/profile', $content);
                $this->load->view('templates/footer.php');
            } elseif ($_SESSION['role'] == 'hod') {

                $content['sdetails'] = $this->profile_model->fetch_hdetails($_SESSION['staff_id']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/profile', $content);
                $this->load->view('templates/footer.php');
            } elseif ($_SESSION['role'] == 'principal') {

                $content['sdetails'] = $this->profile_model->fetch_pdetails($_SESSION['staff_id']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/profile', $content);
                $this->load->view('templates/footer.php');
            } elseif ($_SESSION['role'] == 'office') {

                $content['sdetails'] = $this->profile_model->fetch_odetails($_SESSION['staff_id']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/profile', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function action($arequest_id)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor' || $_SESSION['role'] == 'hod' || $_SESSION['role'] == 'principal' || $_SESSION['role'] == 'office') {
                $content['arequest_id'] = $arequest_id;
                $content['admission_no'] = $this->request_model->fetch_admno($arequest_id);
                $content['status'] = $this->request_model->fetch_status($arequest_id);
                $content['requests'] = $this->request_model->fetch_return($arequest_id);
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/remark', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function verifydoc($doc_id)
    {
        $remarks = 'By ' . $_SESSION['username'];
        $this->request_model->verifydoc($doc_id, $remarks);
        redirect('mydash');
    }



    public function a_remark()
    {
        $remarks = $this->input->post('remark');
        $arequest_id = $this->input->post('arequest_id');
        $this->request_model->approve($arequest_id, $remarks, $_SESSION['username']);
        if ($_SESSION['role'] == 'office') {
            redirect('staff/action/' . $arequest_id);
        } else {
            redirect('mydash');
        }
    }

    public function r_remark()
    {
        $remarks = $this->input->post('remark');
        $arequest_id = $this->input->post('arequest_id');
        $this->request_model->reject($arequest_id, $remarks, $_SESSION['username']);
        redirect('mydash');
    }


    public function view_request($arequest_id)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor' || $_SESSION['role'] == 'hod' || $_SESSION['role'] == 'principal' || $_SESSION['role'] == 'office') {
                $content['request'] = $this->request_model->fetch_request($arequest_id);
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/view_request', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function issue_request($arequest_id)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'office') {
                $return = $this->input->post('return');
                $this->request_model->issue($arequest_id, $return);
                redirect('mydash');
            }
        } else {
            redirect('home/login');
        }
    }

    public function verify_return($arequest_id)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'office') {
                $this->request_model->verify_return($arequest_id);
                $this->request_model->complete($arequest_id);
            }
            redirect('mydash');
        } else {
            redirect('home/login');
        }
    }

    public function myclass()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor') {
                $content['myclass'] = $this->myclass_model->fetch_a_class($_SESSION['branch_in_charge'], $_SESSION['batch_in_charge']);
            } else if ($_SESSION['role'] == 'hod') {
                $content['myclass'] = $this->myclass_model->fetch_h_class($_SESSION['branch_in_charge']);
            } else if ($_SESSION['role'] == 'principal' || $_SESSION['role'] == 'office') {
                $content['myclass'] = $this->myclass_model->fetch_po_class();
            }
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/myclass', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function results()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor') {
                $content['myclass'] = $this->myclass_model->fetch_a_class($_SESSION['branch_in_charge'], $_SESSION['batch_in_charge']);
            } else if ($_SESSION['role'] == 'hod') {
                $content['myclass'] = $this->myclass_model->fetch_h_class($_SESSION['branch_in_charge']);
            } else if ($_SESSION['role'] == 'principal' || $_SESSION['role'] == 'office') {
                $content['myclass'] = $this->myclass_model->fetch_po_class();
            }
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/results.php', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function mystudent($admission_no)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor' || $_SESSION['role'] == 'hod' || $_SESSION['role'] == 'principal' || $_SESSION['role'] == 'office') {

                $content['myclass'] = $this->myclass_model->fetch_spersonal($admission_no);
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/mystudent', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function sbasics($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['basics'] = $this->myclass_model->fetch_sbasics($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sbasics', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function spersonal($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['personal'] = $this->myclass_model->fetch_spersonal($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/spersonal', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sfamily($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['family'] = $this->myclass_model->fetch_sfamily($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sfamily', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sadmission($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['admission'] = $this->myclass_model->fetch_sadmission($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sadmission', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function shostel($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['hostel'] = $this->myclass_model->fetch_shostel($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/shostel', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sacadentry($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['acadentry'] = $this->myclass_model->fetch_sacadentry($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sacadentry', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sacadexit($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['acadexit'] = $this->myclass_model->fetch_sacadexit($admission_no);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sacadexit', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function profile_edit($admission_no)
    {
        if (isset($_SESSION['username']) && ($_SESSION['role'] == "advisor" || $_SESSION['role'] == "hod" || $_SESSION['role'] == "principal" || $_SESSION['role'] == "office")) {
            $this->load->model('student/profile_model');
            $content['acadentry'] = $this->myclass_model->fetch_sacadentry($admission_no);
            $content['acadexit'] = $this->myclass_model->fetch_sacadexit($admission_no);
            $content['hostel'] = $this->myclass_model->fetch_shostel($admission_no);
            $content['admission'] = $this->myclass_model->fetch_sadmission($admission_no);
            $content['family'] = $this->myclass_model->fetch_sfamily($admission_no);
            $content['personal'] = $this->myclass_model->fetch_spersonal($admission_no);
            $content['basics'] = $this->myclass_model->fetch_sbasics($admission_no);
            $content["error_msg"] = "";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/edit.php', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function edit()
    {
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
            'year_of_graduation' => $this->input->post('year_of_graduation'),
            'conduct_and_chara' => $this->input->post('conduct_and_chara'),
            'rank_in_class' => $this->input->post('rank_in_class'),
            'remarks' => $this->input->post('remarks'),
        );

        $this->myclass_model->update_sbasics($basics);
        $this->myclass_model->update_spersonals($personals);
        $this->myclass_model->update_familys($family);
        $this->myclass_model->update_admissions($admission);
        $this->myclass_model->update_hostels($hostel);
        $this->myclass_model->update_academic_entrys($academic_entry);
        $this->myclass_model->update_academic_exits($academic_exits);
        redirect('home');
    }


    public function getDocs($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['mydocs'] = $this->myclass_model->fetch_docs($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sdocs', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }
}
