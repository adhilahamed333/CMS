<?php

class admin_model extends CI_Model
{
    public function insert_users($data)
    {
        $this->db->insert('users', $data);
    }
    public function insert_basics($data)
    {
        $this->db->insert('student_basics', $data);
    }
    public function insert_personals($data)
    {
        $this->db->insert('student_personals', $data);
    }
    public function insert_familys($data)
    {
        $this->db->insert('student_familys', $data);
    }
    public function insert_hostels($data)
    {
        $this->db->insert('student_hostels', $data);
    }
    public function insert_admissions($data)
    {
        $this->db->insert('student_admissions', $data);
    }
    public function insert_academic_entrys($data)
    {
        $this->db->insert('student_academic_entrys', $data);
    }
    public function insert_academic_exits($data)
    {
        $this->db->insert('student_academic_exits', $data);
    }
}
