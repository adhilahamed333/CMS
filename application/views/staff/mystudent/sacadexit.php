<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <h5><a href="<?php echo base_url() . 'staff/mystudent/' . $acadexit['admission_no']; ?>">Profile</a></h5>
    <div class="dashbox">
        <h3>Acadamic Exit Level</h3>
        <div class="item-card">
            <h9>CGPA:</h9>
            <?php
            echo $acadexit['cgpa'];
            ?><br>
            <h9>Year of Graduation:</h9>
            <?php
            echo $acadexit['year_of_graduation'];
            ?><br>
            <h9>Contuct and Charactor:</h9>
            <?php
            echo $acadexit['conduct_and_chara'];
            ?><br>
            <h9>Rank in Class:</h9>
            <?php
            echo $acadexit['rank_in_class'];
            ?><br>
            <h9>Remarks:</h9>
            <?php
            echo $acadexit['remarks'];
            ?><br>
        </div>
        <br>
    </div>
</div>