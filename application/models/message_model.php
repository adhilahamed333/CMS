<?php

class message_model extends CI_Model
{
    public function fetch_messages($username)
    {
        $this->db->where('touser', $username);
        $this->db->from('messages');
        $this->db->order_by('time', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_sent($username)
    {
        $this->db->where('fromuser', $username);
        $this->db->from('messages');
        $this->db->order_by('time', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_students($username)
    {
        $this->db->where_not_in('users.username', $username);
        $this->db->from('users');
        $this->db->join('student_basics', 'users.username=student_basics.username');
        $this->db->join('student_personals', 'student_basics.admission_no=student_personals.admission_no');

        $this->db->order_by('users.username', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_advisors($username)
    {
        $this->db->where_not_in('users.username', $username);
        $this->db->from('users');
        $this->db->join('advisor_details', 'users.username=advisor_details.username');

        $this->db->order_by('users.username', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_hods($username)
    {
        $this->db->where_not_in('users.username', $username);
        $this->db->from('users');
        $this->db->join('hod_details', 'users.username=hod_details.username');

        $this->db->order_by('users.username', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_office($username)
    {
        $this->db->where_not_in('users.username', $username);
        $this->db->from('users');
        $this->db->join('office_details', 'users.username=office_details.username');

        $this->db->order_by('users.username', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_principals($username)
    {
        $this->db->where_not_in('users.username', $username);
        $this->db->from('users');
        $this->db->join('principal_details', 'users.username=principal_details.username');

        $this->db->order_by('users.username', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function create_message($data)
    {
        $this->fromuser = $data['fromuser'];
        $this->touser = $data['touser'];
        $this->subject = $data['subject'];
        $this->message = $data['message'];
        $this->db->insert('messages', $this);

        $request_id = $this->db->insert_id();

        return $request_id;
    }

    public function view_message($mid)
    {
        $this->db->where('mid', $mid);
        $this->db->from('messages');
        $this->db->order_by('time', 'ASC');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function message_read($mid)
    {
        $this->db->set('readtime', 'NOW()', FALSE);
        $this->db->where('mid', $mid);
        $this->db->update('messages');
    }
}
