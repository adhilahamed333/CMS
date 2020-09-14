<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="col-sm-10 text-left">
    <h5><a href="<?php echo base_url() . 'staff/mystudent/' . $basics['admission_no']; ?>">Profile</a></h5>
    <div class="dashbox">
        <h3>Basics</h3>
        <div class="item-card">
            <h9>Username:</h9>
            <?php
            echo $basics['username'];
            ?><br>
            <h9>Admission Number:</h9>
            <?php
            echo $basics['admission_no'];
            ?><br>
            <h9>Course/Programme:</h9>
            <?php
            echo $basics['course'];
            ?><br>
            <h9>Branch:</h9>
            <?php
            echo $basics['branch'];
            ?><br>
            <h9>Semester:</h9>
            <?php
            echo 'S' . $basics['semester'];
            ?><br>
            <h9>Date of Joining:</h9>
            <?php
            echo $basics['date_of_joining'];
            ?><br>
            <h9>Date of Leaving:</h9>
            <?php
            echo $basics['date_of_leaving'];
            ?><br>
            <h9>University Registration Number:</h9>
            <?php
            echo $basics['university_reg_no'];
            ?>
        </div>
        <br>
    </div>
</div>
</div>