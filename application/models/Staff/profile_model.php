<?php

class profile_model extends CI_Model
{
    function fetch_adetails($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->from('advisor_details');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'username' => $row->username,
            'staff_id' => $staff_id,
            'branch_in_charge' => $row->branch_in_charge,
            'name' => $row->name,
            'batch_in_charge' => $row->batch_in_charge
        );
        return $data;
    }

    function fetch_hdetails($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->from('hod_details');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'username' => $row->username,
            'staff_id' => $staff_id,
            'branch_in_charge' => $row->branch_in_charge,
            'name' => $row->name,
        );
        return $data;
    }
    function fetch_pdetails($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->from('principal_details');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'username' => $row->username,
            'staff_id' => $staff_id,
            'name' => $row->name,
        );
        return $data;
    }
    function fetch_odetails($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->from('office_details');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'username' => $row->username,
            'staff_id' => $staff_id,
            'section_in_charge' => $row->section_in_charge,
            'name' => $row->name,

        );
        return $data;
    }
}
