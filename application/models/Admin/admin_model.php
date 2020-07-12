<?php

class admin_model extends CI_Model
{
    public function insert_users($data)
    {
        $this->db->insert('users', $data);
    }
    public function insert_sbasics($data)
    {
        $this->db->insert('student_basics', $data);
    }
    public function insert_abasics($data)
    {
        $this->db->insert('advisor_details', $data);
    }
    public function insert_hbasics($data)
    {
        $this->db->insert('hod_details', $data);
    }
    public function insert_pbasics($data)
    {
        $this->db->insert('principal_details', $data);
    }
    public function insert_obasics($data)
    {
        $this->db->insert('office_details', $data);
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
    public function insert_subs($data)
    {
        $this->db->insert('subjects', $data);
    }
    public function insert_req($data)
    {
        $this->db->insert('request_types', $data);
    }
}
