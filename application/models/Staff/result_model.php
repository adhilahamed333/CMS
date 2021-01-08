<?php
class result_model extends CI_Model
{
    public function insert_record($fields, $data, $n)
    {

        if ($data[0][0] == 'L') {
            $university_reg_no = substr($data[0], 0, 11);
        } else {
            $university_reg_no = substr($data[0], 0, 10);
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
                if ($grade != 'AB') {
                    $this->db->set('grade', $grade);

                    $this->db->where('university_reg_no', $university_reg_no);
                    $this->db->where('course_code', $fields[$i]);
                    $this->db->update('results');
                }
            }
        }
    }

    public function fetch_regs($semester)
    {
        $this->db->select('DISTINCT(results.university_reg_no)');
        $this->db->select('student_basics.admission_no');
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->where('subjects.semester', $semester);
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $this->db->join('subjects', 'results.course_code=subjects.course_code');
        $this->db->order_by('student_basics.university_reg_no', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_result($semester)
    {
        $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        $this->db->where('subjects.semester', $semester);
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $this->db->join('student_personals', 'student_personals.admission_no=student_basics.admission_no');
        $this->db->join('subjects', 'results.course_code=subjects.course_code');
        $this->db->order_by('student_basics.university_reg_no', 'ASC');
        $this->db->order_by('subjects.slot', 'ASC');
        $this->db->order_by('subjects.course_code', 'DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_subjects($semester)
    {

        $this->db->select('DISTINCT(course_code)');
        $this->db->where('semester', $semester);
        $this->db->from('subjects');
        $this->db->order_by('slot', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_myresults($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $this->db->join('subjects', 'results.course_code=subjects.course_code');
        $this->db->order_by('subjects.semester', 'ASC');
        $this->db->order_by('subjects.slot', 'ASC');
        $this->db->order_by('subjects.course_code', 'DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function fetch_myfails($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->where('grade', "F");
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $this->db->join('subjects', 'results.course_code=subjects.course_code');
        $this->db->order_by('subjects.semester', 'ASC');
        $this->db->order_by('subjects.slot', 'ASC');
        $this->db->order_by('subjects.course_code', 'DESC');
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
                'S' => 10,
                'A+' => 9,
                'A' => 8.5,
                'B+' => 8,
                'B' => 7.5,
                'C+' => 7,
                'C' => 6.5,
                'D' => 6,
                'P' => 5.5,
                'F' => 0,
                'FE' => 0,
                'I' => 0,
                'Absent' => 0,
                'AB' => 0
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
            $temp = round($temp / $s, 2);
            if ($s != 0) {
                $this->db->set('cgpa', $temp);
                $this->db->where('admission_no', $row->admission_no);
                $this->db->update('student_academic_exits');
            }
        }
    }

    public function fetch_cgpa($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_academic_exits');
        $query = $this->db->get();
        $row = $query->row();
        return $row->cgpa;
    }

    public function subject_total($course_code)
    {
        $this->db->select('COUNT(*) as total');
        $this->db->select('course_code');
        $this->db->where('course_code', $course_code);
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_o($course_code)
    {
        $this->db->select('COUNT(*) as o');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "O");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_ap($course_code)
    {
        $this->db->select('COUNT(*) as ap');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "A+");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_a($course_code)
    {
        $this->db->select('COUNT(*) as a');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "A");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_bp($course_code)
    {
        $this->db->select('COUNT(*) as bp');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "B+");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_b($course_code)
    {
        $this->db->select('COUNT(*) as b');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "B");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_c($course_code)
    {
        $this->db->select('COUNT(*) as c');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "C");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_p($course_code)
    {
        $this->db->select('COUNT(*) as p');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "P");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_f($course_code)
    {
        $this->db->select('COUNT(*) as f');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "F");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_fe($course_code)
    {
        $this->db->select('COUNT(*) as fe');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "FE");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_i($course_code)
    {
        $this->db->select('COUNT(*) as i');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "I");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function subject_ab($course_code)
    {
        $this->db->select('COUNT(*) as ab');
        $this->db->where('course_code', $course_code);
        $this->db->where('grade', "Absent");
        if (isset($_SESSION['batch_in_charge'])) {
            $this->db->where('student_basics.batch', $_SESSION['batch_in_charge']);
        }
        if (isset($_SESSION['branch_in_charge'])) {
            $this->db->where('student_basics.branch', $_SESSION['branch_in_charge']);
        }
        $this->db->from('results');
        $this->db->join('student_basics', 'results.university_reg_no=student_basics.university_reg_no');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}
