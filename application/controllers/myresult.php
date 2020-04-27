<?php
defined('BASEPATH') or exit('No direct script access allowed');
class myresult extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff/result_model');
    }
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $content['myresults'] = $this->result_model->fetch_myresults($_SESSION['admission_no']);
        $content['sem'] = $this->result_model->fetch_sgpa($_SESSION['admission_no']);
        $content['cgpa'] = $this->result_model->fetch_cgpa($_SESSION['admission_no']);
        $this->load->view('student/myresult.php', $content);
        $this->load->view('templates/footer.php');
    }
    public function staff_access($admission_no)
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $content['myresults'] = $this->result_model->fetch_myresults($admission_no);
        $content['sem'] = $this->result_model->fetch_sgpa($admission_no);
        $content['cgpa'] = $this->result_model->fetch_cgpa($admission_no);
        $this->load->view('student/myresult.php', $content);
        $this->load->view('templates/footer.php');
    }
}
