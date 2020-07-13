<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <div class="dashbox">
        <a href="result/subwise/<?php echo $semester; ?>" class="btn btn-primary">View Subject-wise Analysis</a>
        <h3>Student-wise Result Analysis(S<?= $semester ?>)</h3>
        <div class="item-card" style="width:inherit;overflow-y:auto;height:405px;">
            <table class="table display table-striped table-bordered" style="width:100%">

                <?php
                if ($results) { ?>
                    <tr>
                        <td>University Reg No</td>
                        <?php foreach ($subjects as $subject) { ?>
                            <td><?= $subject->course_code ?></td>
                        <?php } ?>
                        <td>SGPA</td>
                        <td>Arrear Subjects</td>
                    </tr>

                    <?php
                    foreach ($regs as $reg) { ?>
                        <tr>
                            <td><?= $reg->university_reg_no ?></td>
                            <?php foreach ($results[$reg->university_reg_no] as $result) {
                                if ($result->semester == $semester) { ?>
                                    <td><?= $result->grade ?></td>

                                <?php } ?>

                            <?php  } ?>
                            <td><?= $sem[$reg->university_reg_no]['sgpa'][$semester] ?></td>
                            <td> <?php foreach ($fails[$reg->university_reg_no] as $fail) {
                                        if ($fail->semester == $semester) { ?><?= $fail->course_code ?> <?php }
                                                                                                    } ?></td>
                        </tr>
                    <?php } ?>

                <?php } ?>

            </table>
        </div>
    </div>

</div>