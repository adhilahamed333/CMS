<?php

class users_model extends CI_Model
{
    function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->from('users');
        $query = $this->db->get();
        $row = $query->row();

        if (isset($row)) {
            if ($row->password == $password) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function fetch_role($username)
    {
        $this->db->where('username', $username);
        $this->db->from('users');
        $query = $this->db->get();
        $row = $query->row();
        return $row->role;
    }

    function fetch_admno($username)
    {
        $this->db->where('username', $username);
        $this->db->from('student_basics');
        $query = $this->db->get();
        $row = $query->row();
        return $row->admission_no;
    }

    function fetch_username($username)
    {
        $this->db->where('username', $username);
        $this->db->from('student_basics');
        $query = $this->db->get();
        $row = $query->row();
        return $row->username;
    }

    function fetch_sem($username)
    {
        $this->db->where('username', $username);
        $this->db->from('student_basics');
        $query = $this->db->get();
        $row = $query->row();
        return $row->semester;
    }

    function fetch_staff_details($username, $role)
    {
        $this->db->where('username', $username);
        if ($role == 'advisor') {
            $this->db->from('advisor_details');
        } elseif ($role == 'hod') {
            $this->db->from('hod_details');
        } elseif ($role == 'principal') {
            $this->db->from('principal_details');
        } elseif ($role == 'office') {
            $this->db->from('office_details');
        }
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }

    function update_password($username, $np)
    {
        $this->db->set('password', $np);
        $this->db->where('username', $username);
        $this->db->update('users');
    }
}
