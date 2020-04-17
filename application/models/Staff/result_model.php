<?php
class result_model extends CI_Model
{
    public function insert_record($fields, $data, $n)
    {

        if ($data[0][10] == '-') {
            $university_reg_no = substr($data[0], 0, 10);
        } else {
            $university_reg_no = substr($data[0], 0, 11);
        }

        for ($i = 1; $i <= $n; $i++) {
            $grade = $data[$i];
            $this->db->select('COUNT(*) as c');
            $this->db->from('results');
            $this->db->where('university_reg_no', $university_reg_no);
            $this->db->where('course_code', $fields[$i]);
            $query = $this->db->get();
            $row = $query->row();
            $u = $row->c;
            if ($u == 0) {
                $content = array(
                    'university_reg_no' =>  $university_reg_no,
                    'course_code' => $fields[$i],
                    'grade' => $grade,
                );
                if ($data[0] != 'nil') {
                    $this->db->insert('results', $content);
                }
            } else {
                $this->db->set('grade', $grade);
                $this->db->where('university_reg_no', $univerity_reg_no);
                $this->db->where('course_code', $fields[$i]);
                $this->db->update('results');
            }
        }
    }

    public function fetch_myresults($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $this->db->join('subjects', 'results.course_code=subjects.course_code');
        $this->db->order_by('subjects.semester', 'ASC');
        $this->db->order_by('subjects.slot', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_sgpa($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $this->db->join('subjects', 'results.course_code=subjects.course_code');
        $query = $this->db->get();

        if ($query) {
            $grade_points = array(
                'O' => 10,
                'A+' => 9,
                'A' => 8.5,
                'B+' => 8,
                'B' => 7,
                'C' => 6,
                'P' => 5,
                'F' => 0,
                'FE' => 0,
                'I' => 0
            );
            $sgpa = array();
            $c = array();
            for ($i = 1; $i <= 8; $i++) {
                $gpa = 0;
                $c[$i] = 0;

                foreach ($query->result() as $row) {
                    if ($row->semester == $i && $row->grade != NULL) {
                        $gpa += $row->credits * $grade_points[$row->grade];
                        $c[$i] += $row->credits;
                        if ($row->semester == 7) {
                            echo "***";
                        }
                    }
                }
                if ($c[$i] != 0) {
                    $sgpa[$i] = round($gpa / $c[$i], 2);
                } else {
                    $sgpa[$i] = null;
                }
                $sem = array('t_credits' => $c, 'sgpa' => null);
            }
            $sem['sgpa'] = $sgpa;
            return $sem;
        }
    }
    public function update_cgpa()
    {
        $this->db->select('admission_no');
        $this->db->from('student_basics');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $sem = $this->result_model->fetch_sgpa($row->admission_no);

            $temp = 0;
            $s = 0;
            for ($i = 1; $i <= 8; $i++) {
                $temp += $sem['sgpa'][$i];
                if ($sem['t_credits'][$i] != 0) {
                    $s++;
                }
            }
            if ($s != 0) {
                $this->db->set('cgpa', $temp / $s);
                $this->db->where('admission_no', $row->admission_no);
                $this->db->update('student_academic_exits');
            }
        }
    }
}
