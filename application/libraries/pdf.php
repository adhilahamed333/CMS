<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
class pdf extends Dompdf
{
     public function __construct()
     {
         parent::__construct();
     }
     public function ci()
     {
         return get_instance();
     }
     public function load_view($view,$data=array()){
         $html=$this->ci()->load->view($view,$data,TRUE);
         $this->load_html($html);
     }
}
