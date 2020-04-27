<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <h5><a href="<?php echo base_url() . 'staff/mystudent/' . $acadentry['admission_no']; ?>">Profile</a></h5>
    <div class="dashbox">
        <h3>Acadamic Entry Level</h3>
        <div class="item-card">
            <h9>Qualifying Exam:</h9>
            <?php
            echo $acadentry['qualifying_exam'];
            ?><br>
            <h9>Period of Study:</h9>
            <?php
            echo $acadentry['period_of_study'];
            ?><br>
            <h9>Name of Institution:</h9>
            <?php
            echo $acadentry['name_of_institution'];
            ?><br>
            <h9>University or Board:</h9>
            <?php
            echo $acadentry['university_or_board'];
            ?><br>
            <h9>Total Marks Secured:</h9>
            <?php
            echo $acadentry['total_marks_secured'];
            ?><br>
            <h9>Maximun Mark:</h9>
            <?php
            echo $acadentry['max_mark'];
            ?><br>
            <h9>TC or CC number:</h9>
            <?php
            echo $acadentry['tc_or_cc_no'];
            ?><br>
            <h9>Date of TC or CC:</h9>
            <?php
            echo $acadentry['date_of_tc_or_cc'];
            ?><br>
        </div>
        <br>
    </div>
</div>