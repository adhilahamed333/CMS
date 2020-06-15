<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <h1>My Class
        <?php if ($_SESSION['role'] == 'advisor') {
            echo '(' . $_SESSION['branch_in_charge'] . ', Batch of ' . $_SESSION['batch_in_charge'] . ')';
        } else if ($_SESSION['role'] == 'hod') {
            echo '(' . $_SESSION['branch_in_charge'] . ')';
        }
        ?>
    </h1>


    <div class="dashbox">
        <div style="width:inherit;overflow-y:auto;height:440px;">
            <?php if ($myclass) {

                foreach ($myclass as $myclasses) { ?>

                    <div class="item-card">
                        <div>Admission no: <?= $myclasses->admission_no; ?></div>
                        <div>Name: <?= $myclasses->name; ?></div>
                        <div>Course: <?= $myclasses->course; ?></div>
                        <div>Branch: <?= $myclasses->branch; ?></div>
                        <div>Semester: S<?= $myclasses->semester; ?></div>
                        <div>Univercity Reg No: <?= $myclasses->university_reg_no; ?></div>
                        <div><a href="<?php echo base_url() . "staff/mystudent/" . $myclasses->admission_no; ?>">More...</a></div>
                    </div>
            <?php }
            } ?><br>
        </div>
    </div>



</div>