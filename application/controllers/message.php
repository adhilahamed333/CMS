<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('message_model');
    }
    public function test()
    {
        if (isset($_SESSION['username'])) {
            $content['messages'] = $this->message_model->fetch_messages($_SESSION['username']);
            $content['sent'] = $this->message_model->fetch_sent($_SESSION['username']);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('pdf.php');
            $this->load->view('templates/footer.php');
        } else {
            redirect("home");
        }
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $content['messages'] = $this->message_model->fetch_messages($_SESSION['username']);
            $content['sent'] = $this->message_model->fetch_sent($_SESSION['username']);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('message/message', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect("home");
        }
    }

    public function compose()
    {
        if (isset($_SESSION['username'])) {
            $content['students'] = $this->message_model->fetch_students($_SESSION['username']);
            $content['advisors'] = $this->message_model->fetch_advisors($_SESSION['username']);
            $content['hods'] = $this->message_model->fetch_hods($_SESSION['username']);
            $content['principals'] = $this->message_model->fetch_principals($_SESSION['username']);
            $content['office'] = $this->message_model->fetch_office($_SESSION['username']);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('message/compose.php', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect("home");
        }
    }

    public function send()
    {
        if (isset($_SESSION['username'])) {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $data = array(
                'fromuser' => $from,
                'touser' => $to,
                'subject' => $subject,
                'message' => $message
            );
            $id = $this->message_model->create_message($data);
            if ($id) {
                redirect("message");
            }
        } else {
            redirect("home");
        }
    }

    public function view($mid)
    {
        if (isset($_SESSION['username'])) {
            $content['message'] = $this->message_model->view_message($mid);
            if ((!$content['message']->readtime) && $content['message']->touser == $_SESSION['username']) {
                $this->message_model->message_read($mid);
            }
            $content['message'] = $this->message_model->view_message($mid);
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('message/view_message', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect("home");
        }
    }
}
