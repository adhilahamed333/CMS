<?php

class request_model extends CI_Model
{
    public function create_request($data, $admission_no)
    {
        $this->type = $data['request'];
        $this->owner = $admission_no;
        $this->reason = $data['reason'];
        $this->remarks = $data['remarks'];
        $this->db->insert('requests', $this);

        $request_id = $this->db->insert_id();

        return $request_id;
    }

    public function request_flow($request_id)
    {
        $data = array(
            'request_id' => $request_id,
            'submit' => 1
        );
        $this->db->insert('flows', $data);
    }

    public function doc_upload($admission_no, $dtype, $dpath)
    {
        $data = array(
            'dtype' => $dtype,
            'owner' => $admission_no,
            'path'  => $dpath
        );
        $this->db->insert('doc_path', $data);
        $doc_id = $this->db->insert_id();

        return $doc_id;
    }

    public function fetch_docs($admission_no, $dtype)
    {
        $this->db->select('COUNT(*) as c ');
        $this->db->where('dtype', $dtype);
        $this->db->where('owner=' . $admission_no);
        $this->db->from('doc_path');
        $query = $this->db->get();
        $row = $query->row();
        return $row->c;
    }

    function fetch_admno($arequest_id)
    {

        $this->db->where('request_id', $arequest_id);
        $this->db->from('requests');
        $query = $this->db->get();
        $row = $query->row();
        return $row->owner;
    }

    function fetch_status($arequest_id)
    {
        $this->db->select("office");
        $this->db->where('flows.request_id', $arequest_id);
        $this->db->from('flows');


        $query = $this->db->get();
        $row = $query->row();
        return $row->office;
    }

    public function withdraw($request_id, $remarks)
    {
        $this->db->set('submit', -1, FALSE);
        $this->db->where('request_id', $request_id);
        $this->db->update('flows');

        $this->db->set('remarks', $remarks);
        $this->db->set('submit_date', 'NOW()', FALSE);
        $this->db->where('request_id', $request_id);
        $this->db->update('requests');
    }

    function fetch_return($arequest_id)
    {

        $this->db->where('request_id', $arequest_id);
        $this->db->from('requests');
        $query = $this->db->get();
        $row = $query->row();
        return $row->return_applicable;
    }


    public function verify_receipt($request_id, $username)
    {

        $this->db->set('receipt',1);
        $this->db->set('receipt_date', 'NOW()', FALSE);
        $this->db->where('request_id', $request_id);
        $this->db->update('flows');
    }

    function complete($request_id)
    {
        $this->db->set('completed', 1, FALSE);
        $this->db->set('c_date', 'NOW()', FALSE);
        $this->db->where('request_id', $request_id);
        $this->db->update('flows');
    }
}
