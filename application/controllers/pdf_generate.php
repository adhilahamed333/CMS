<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pdf_generate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff/request_model');
        $this->load->library('pdf');
    }

    public function print_req($arequest_id)
    {
        $content = $this->request_model->print_request($arequest_id);

        $this->pdf->loadHtml($content);
        $this->pdf->render();
        $this->pdf->stream("" . $arequest_id . ".pdf", array("Attatchment" => 0));
    }
    public function v_req($arequest_id)
    {
        $content['data'] = $this->request_model->print_request($arequest_id);

        $this->load->view('htmltopdf',$content);
    }
}
