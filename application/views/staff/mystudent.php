<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="height: 83vh;float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h1 style="margin-top: 10px;"><?php echo $myclass['name']; ?></h1>
        <div class="item-card">
            <a class="btn btn-primary pull-right" href="<?php echo base_url() . "staff/profile_edit/" . $myclass['admission_no']; ?>">Edit</a>
            <h3><a href="<?php echo base_url() . 'staff/sbasics/' . $myclass['admission_no']; ?>">Basics</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/spersonal/' . $myclass['admission_no']; ?>">Personal</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/sfamily/' . $myclass['admission_no']; ?>">Family</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/sadmission/' . $myclass['admission_no']; ?>">Admission</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/shostel/' . $myclass['admission_no']; ?>">Hostel</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/sacadentry/' . $myclass['admission_no']; ?>">Acadamic Entry Level</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/sacadexit/' . $myclass['admission_no']; ?>">Acadamic Exit Level</a></h3>
            <h3><a href="<?php echo base_url() . 'staff/getDocs/' . $myclass['admission_no']; ?>">Documents</a></h3>
            <h3><a href="<?php echo base_url() . 'myresult/staff_access/' . $myclass['admission_no']; ?>">Results</a></h3>
        </div>
    </div>
</div>