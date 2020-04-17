<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

require __DIR__ . '/../Header.php';

use PgpOffice\PhpSpreadsheet\Spreadsheet;
use PgpOffice\PhpSpreadsheet\Writer\xlsx;

class Excel extends PHPExcel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){}
}
