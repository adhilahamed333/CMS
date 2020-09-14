<?php

class myclass_model extends CI_Model
{
    function fetch_a_class($branch_in_charge, $batch_in__charge)
    {
        $this->db->where('branch', $branch_in_charge);
        $this->db->where('batch', $batch_in__charge);
        $this->db->from('student_basics');
        $this->db->join('student_personals', 'student_basics.admission_no=student_personals.admission_no');
        $this->db->order_by('student_basics.university_reg_no', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_h_class($branch_in_charge)
    {
        $this->db->where('branch', $branch_in_charge);
        $this->db->from('student_basics');
        $this->db->join('student_personals', 'student_basics.admission_no=student_personals.admission_no');
        $this->db->order_by('student_basics.university_reg_no', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_po_class()
    {
        $this->db->from('student_basics');
        $this->db->join('student_personals', 'student_basics.admission_no=student_personals.admission_no');
        $this->db->order_by('student_basics.university_reg_no', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_sbasics($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_basics');
        $query = $this->db->get();
        $row = $query->row();

        $data = array(
            'admission_no' => $row->admission_no,
            'course' => $row->course,
            'branch' => $row->branch,
            'semester' => $row->semester,
            'username' => $row->username,
            'date_of_joining' => $row->date_of_joining,
            'date_of_leaving' => $row->date_of_leaving,
            'university_reg_no' => $row->university_reg_no
        );
        return $data;
    }

    function fetch_spersonal($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_personals');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'name' => $row->name,
            'gender' => $row->gender,
            'dob' => $row->dob,
            'phone' => $row->phone,
            'mobile' => $row->mobile,
            'address' => $row->address,
            'email' => $row->email,
            'category' => $row->category
        );
        return $data;
    }

    function fetch_sfamily($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_familys');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'name_of_fm' => $row->name_of_fm,
            'occupation_of_fm' => $row->occupation_of_fm,
            'address_of_fm' => $row->address_of_fm,
            'phone_of_fm' => $row->phone_of_fm,
            'email_of_fm' => $row->email_of_fm,
            'name_of_lg' => $row->name_of_lg,
            'relation_with_lg' => $row->relation_with_lg,
            'occupation_of_lg' => $row->occupation_of_lg,
            'address_of_lg' => $row->address_of_lg,
            'phone_of_lg' => $row->phone_of_lg,
            'email_of_lg' => $row->email_of_lg
        );
        return $data;
    }

    function fetch_sadmission($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_admissions');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'date_of_admission' => $row->date_of_admission,
            'adcard_memo_no' => $row->adcard_memo_no,
            'rank' => $row->rank,
            'category_admission' => $row->category_admission
        );
        return $data;
    }

    function fetch_shostel($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_hostels');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'hostel_name' => $row->hostel_name,
            'date_of_admission' => $row->date_of_admission
        );
        return $data;
    }


    function fetch_sacadentry($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_academic_entrys');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'qualifying_exam' => $row->qualifying_exam,
            'period_of_study' => $row->period_of_study,
            'name_of_institution' => $row->name_of_institution,
            'university_or_board' => $row->university_or_board,
            'total_marks_secured' => $row->total_marks_secured,
            'max_mark' => $row->max_mark,
            'tc_or_cc_no' => $row->tc_or_cc_no,
            'date_of_tc_or_cc' => $row->date_of_tc_or_cc,
        );
        return $data;
    }

    function fetch_sacadexit($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_academic_exits');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'cgpa' => $row->cgpa,
            'year_of_graduation' => $row->year_of_graduation,
            'conduct_and_chara' => $row->conduct_and_chara,
            'rank_in_class' => $row->rank_in_class,
            'remarks' => $row->remarks
        );
        return $data;
    }

    function fetch_docs($admission_no)
    {
        $this->db->select('*');
        $this->db->where('owner=' . $admission_no);
        $this->db->from('doc_path');
        $query = $this->db->get();
        return $query->result();
    }

    function update_sbasics($data)
    {
        $this->db->set('branch', $data['branch']);
        $this->db->set('semester', $data['semester']);
        $this->db->set('date_of_joining', $data['date_of_joining']);
        $this->db->set('university_reg_no', $data['university_reg_no']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_basics');
    }

    function update_spersonals($data)
    {
        $this->db->set('name', $data['name']);
        $this->db->set('gender', $data['gender']);
        $this->db->set('phone', $data['phone']);
        $this->db->set('mobile', $data['mobile']);
        $this->db->set('address', $data['address']);
        $this->db->set('email', $data['email']);
        $this->db->set('category', $data['category']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_personals');
    }

    function update_sfamilys($data)
    {
        $this->db->set('name_of_fm', $data['name_of_fm']);
        $this->db->set('occupation_of_fm', $data['occupation_of_fm']);
        $this->db->set('phone_of_fm', $data['phone_of_fm']);
        $this->db->set('address_of_fm', $data['address_of_fm']);
        $this->db->set('email_of_fm', $data['email_of_fm']);
        $this->db->set('name_of_lg', $data['name_of_lg']);
        $this->db->set('occupation_of_lg', $data['occupation_of_lg']);
        $this->db->set('phone_of_lg', $data['phone_of_lg']);
        $this->db->set('address_of_lg', $data['address_of_lg']);
        $this->db->set('email_of_lg', $data['email_of_lg']);
        $this->db->set('relation_withlg', $data['relation_with_lg']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_familys');
    }

    function update_admissions($data)
    {
        $this->db->set('date_of_admission', $data['date_of_admission']);
        $this->db->set('adcard_memo_no', $data['adcard_memo_no']);
        $this->db->set('rank', $data['rank']);
        $this->db->set('category_admission', $data['category_admission']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_admissions');
    }

    function update_hostels($data)
    {
        $this->db->set('hostel_name', $data['hostel_name']);
        $this->db->set('date_of_admission', $data['date_of_admission']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_admissions');
    }

    function update_acadamic_entrys($data)
    {
        $this->db->set('qualifying_exam', $data['qualifying_exam']);
        $this->db->set('period_of_study', $data['period_of_study']);
        $this->db->set('name_of_institution', $data['name_of_institution']);
        $this->db->set('university_or_board', $data['university_or_board']);
        $this->db->set('total_marks_secured', $data['total_marks_secured']);
        $this->db->set('max_mark', $data['max_mark']);
        $this->db->set('tc_or_cc_no', $data['tc_or_cc_no']);
        $this->db->set('date_of_tc_or_cc', $data['date_of_tc_or_cc']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_admissions');
    }

    function update_acadamic_exits($data)
    {
        $this->db->set('year_of_graduation', $data['year_of_graduation']);
        $this->db->set('conduct_and_chara', $data['conduct_and_chara']);
        $this->db->set('rank_in_class', $data['rank_in_class']);
        $this->db->set('remarks', $data['remarks']);
        $this->db->where('admission_no', $data['admission_no']);
        $this->db->update('student_admissions');
    }
}
