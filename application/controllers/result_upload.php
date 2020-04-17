<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class result_upload extends CI_Controller
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
