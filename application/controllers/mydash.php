<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mydash extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['username'])) {
            $this->load->model('mydash_model');
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
            $this->load->model('mydash_model');
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

    public function viewdoc($id)
    {
        $this->load->helper('download');
        $this->load->model('mydash_model');
        $query = $this->mydash_model->getpath($id);
        $path = $query->path;
        force_download($path, NULL);
    }
    public function upload_doc()
    {
        if (isset($_SESSION['username'])) {

            $this->load->model('mydash_model');
            $this->load->model('request_model');

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
                $dpath = $this->upload->data('full_path');
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
