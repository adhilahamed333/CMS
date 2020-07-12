<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff/result_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $content['semester'] = $this->input->post('semester');
            $content['regs'] = $this->result_model->fetch_regs($content['semester']);
            $content['results'] = null;
            foreach ($content['regs'] as $reg) {
                $content['results'][$reg->university_reg_no] = $this->result_model->fetch_myresults($reg->admission_no, $content['semester']);
                $content['sem'][$reg->university_reg_no] = $this->result_model->fetch_sgpa($reg->admission_no);
                $content['fails'][$reg->university_reg_no] = $this->result_model->fetch_myfails($reg->admission_no, $content['semester']);
            }
            $content['subjects'] = $this->result_model->fetch_subjects($content['semester']);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            if ($content['results']) {
                $this->load->view('staff/result_analysis.php', $content);
            }
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function subwise($semester)
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }
        $content['semester'] =$semester;
        $content['subjects'] = $this->result_model->fetch_subjects($semester);
        $content['subjectwise']=null;
        foreach ($content['subjects'] as $subject) {
            $content['subjectwise'][$subject->course_code]["total"] = $this->result_model->subject_total($subject->course_code);
            $content['subjectwise'][$subject->course_code]["o"] = $this->result_model->subject_o($subject->course_code);
            $content['subjectwise'][$subject->course_code]['ap'] = $this->result_model->subject_ap($subject->course_code);
            $content['subjectwise'][$subject->course_code]['a'] = $this->result_model->subject_a($subject->course_code);
            $content['subjectwise'][$subject->course_code]['bp'] = $this->result_model->subject_bp($subject->course_code);
            $content['subjectwise'][$subject->course_code]['b'] = $this->result_model->subject_b($subject->course_code);
            $content['subjectwise'][$subject->course_code]['c'] = $this->result_model->subject_c($subject->course_code);
            $content['subjectwise'][$subject->course_code]['p'] = $this->result_model->subject_p($subject->course_code);
            $content['subjectwise'][$subject->course_code]['f'] = $this->result_model->subject_f($subject->course_code);
            $content['subjectwise'][$subject->course_code]['fe'] = $this->result_model->subject_fe($subject->course_code);
            $content['subjectwise'][$subject->course_code]['i'] = $this->result_model->subject_i($subject->course_code);
            $content['subjectwise'][$subject->course_code]['ab'] = $this->result_model->subject_ab($subject->course_code);
        }
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('staff/subjectwise.php', $content);
        $this->load->view('templates/footer.php');
    }

    public function result_upload()
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }

        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('staff/result_upload.php');
        $this->load->view('templates/footer.php');
    }

    public function readfile()
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }
        $subs = $this->input->post('subs');
        if (isset($_FILES['file']['name'])) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extention = end($arr_file);
            if ('xlsx' == $extention) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            $fields = $sheetData[1];

            for ($row = 2; $sheetData[$row][0] != NULL; $row++) {
                $this->result_model->insert_record($fields, $sheetData[$row], $subs);
            }
        }

        $this->load->model('staff/result_model');
        $this->result_model->update_cgpa();

        redirect("staff/myclass");
    }
}
