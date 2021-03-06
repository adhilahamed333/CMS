<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mydash extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mydash_model');
        $this->load->model('student/request_model');
    }

    function index()
    {
        if (isset($_SESSION['username'])) {

            $query = $this->mydash_model->getMyRequests();
            $data['myrequests'] = null;
            if ($query) {
                $data['myrequests'] = $query;
            }
            $query = $this->mydash_model->getMyDocs();
            $data['mydocs'] = null;
            if ($query) {
                $data['mydocs'] = $query;
            }
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            if ($_SESSION['role'] == 'student') {
                $this->load->view('student/mydash/mydash.php', $data);
            } else {
                $this->load->view('staff/mydash.php', $data);
            }
            $this->load->view('templates/footer.php');
        } else {
            $data['message_error'] = '';
            redirect('home/login', $data);
        }
    }

    public function mydoc()
    {
        if (isset($_SESSION['username'])) {

            $query = $this->mydash_model->getDocs();
            $data['mydocs'] = null;
            if ($query) {
                $data['mydocs'] = $query;
            }
            $data['error_msg'] = "";
            $data['doc_id'] = "";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/mydash/mydoc', $data);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function downloaddoc($id)
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }
        $this->load->helper('download');

        $query = $this->mydash_model->getpath($id);
        $path = $query->path;
        force_download($path, NULL);
    }

    public function viewdoc($id)
    {
        if (!isset($_SESSION['username'])) {
            redirect('home/dash');
        }
        $query = $this->mydash_model->getpath($id);
        $content['path'] = $query->path;
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('pdf.php',$content);
        $this->load->view('templates/footer.php');
    }

    public function upload_doc()
    {
        if (isset($_SESSION['username'])) {



            $data['error_msg'] = "";
            $data['doc_id'] = "";
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');

            $dtype = $this->input->post('dtype');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf';

            $this->load->library('upload', $config);
            if ($dtype) {
                $c = $this->request_model->fetch_docs($_SESSION['admission_no'], $dtype);
                if ($c == 0) {
                    $uploaded = $this->upload->do_upload('userfile');
                } else {
                    $uploaded = 0;
                    $data['error_msg'] = $data['error_msg'] . "<br>Document already exists";
                }
            } else {
                $uploaded = 0;
                $data['error_msg'] = $data['error_msg'] . "<br>Enter document type";
            }
            if ($uploaded) {
                $data['data'] = $this->upload->data();
                $dpath = $this->upload->data('file_name');
                $data['doc_id'] = "Document uploaded and subjected for verificatin with ID:" . $this->request_model->doc_upload($_SESSION['admission_no'], $dtype, $dpath);
                $query = $this->mydash_model->getDocs();
                $data['mydocs'] = null;
                if ($query) {
                    $data['mydocs'] = $query;
                }
                $this->load->view('student/mydash/mydoc', $data);
            } else {
                if (!$uploaded) {
                    $data['error_msg'] = $data['error_msg'] . $this->upload->display_errors();
                }
                $query = $this->mydash_model->getDocs();
                $data['mydocs'] = null;
                if ($query) {
                    $data['mydocs'] = $query;
                }
                $this->load->view('student/mydash/mydoc', $data);
            }
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }
}
