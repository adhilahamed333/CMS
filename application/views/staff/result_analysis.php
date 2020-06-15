<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <table border="1">

        <?php if ($results) { ?>
            <tr>
                <td>University Reg No</td>
                <?php foreach ($subjects as $subject) { ?>
                    <td><?= $subject->course_code ?></td>
                <?php } ?>
                <td>SGPA</td>
            </tr>

            <?php $i = 0;
            foreach ($regs as $reg) {
                if ($i % $c == 0) { ?>
                    <tr>
                        <td><?= $results[$reg]->university_reg_no ?>-<?= $result->name ?></td>
                    <?php } ?>
                    <td><?= $result->grade ?></td>
                        <?php if ($i % $c == $c - 1) { ?>
                    </tr><?php }
                        $i++;
                    } ?>
        <?php } ?>

    </table>

</div>