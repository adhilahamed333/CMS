<?php

class mydash_model extends CI_Model
{
    function getMyRequests()
    {

        $this->db->select("*");
        if ($_SESSION['role'] == 'student') {
            $this->db->where('student_basics.admission_no="' . $_SESSION['admission_no'] . '"');
        }
        if ($_SESSION['role'] == 'advisor') {
            $this->db->where('student_basics.branch="' . $_SESSION['branch_in_charge'] . '"');
            $this->db->where('student_basics.batch="' . $_SESSION['batch_in_charge'] . '"');
            $this->db->where('flows.submit!=-1');
        }
        if ($_SESSION['role'] == 'hod') {
            $this->db->where('student_basics.branch="' . $_SESSION['branch_in_charge'] . '"');
            $this->db->where('flows.advisor=1');
        }
        if ($_SESSION['role'] == 'principal') {
            $this->db->where('flows.hod=1');
        }
        if ($_SESSION['role'] == 'office') {
            $this->db->where('flows.principal=1');
            $this->db->where('section="' . $_SESSION['section_in_charge'] . '"');
            $this->db->join('request_types', 'request_types.type=requests.type');
        }
        $this->db->order_by('submit_date','DESC');
        $this->db->from('requests');
        $this->db->join('flows', 'requests.request_id=flows.request_id');
        $this->db->join('student_basics', 'requests.owner=student_basics.admission_no');
        $this->db->join('student_personals', 'requests.owner=student_personals.admission_no');
        $query = $this->db->get();
        return $query->result();
    }

    function getMyDocs()
    {

        $this->db->select("*");
        if (!$_SESSION['role'] == 'student') {
            $this->db->where('student_basics.branch="' . $_SESSION['branch_in_charge'] . '"');
            $this->db->where('student_basics.semester=' . $_SESSION['batch_in_charge']);
        }
        $this->db->where('verified=0');
        $this->db->from('doc_path');
        $this->db->join('student_basics', 'doc_path.owner=student_basics.admission_no');
        $this->db->join('student_personals', 'doc_path.owner=student_personals.admission_no');
        $query = $this->db->get();
        return $query->result();
    }


    function getDocs()
    {
        $this->db->where('owner=' . $_SESSION['admission_no']);
        $this->db->where('verified=1');
        $this->db->from('doc_path');
        $query = $this->db->get();
        return $query->result();
    }

    function getpath($id)
    {
        $this->db->where('doc_id=' . $id);
        $this->db->from('doc_path');
        $query = $this->db->get();
        return $query->row();
    }
}
