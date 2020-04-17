public function create_table($data, $sem)
{
$this->load->dbforge();
$fields = array(
'id' => array(
'type' => 'INT',
'constraint' => 5,
'unsigned' => TRUE,
'unique' => TRUE,
'auto_increment' => TRUE
),
'university_reg_no' => array(
'type' => 'VARCHAR',
'constraint' => 255,
'unique' => TRUE,
),
$data[1] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[2] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[3] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[4] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[5] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[6] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[7] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[8] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[9] => array(
'type' => 'VARCHAR',
'constraint' => '100',
),
$data[12] => array(
'type' => 'FLOAT',
'constraint' => '10',
),

);
$this->dbforge->add_field($fields);
$this->dbforge->create_table($sem, TRUE);
}