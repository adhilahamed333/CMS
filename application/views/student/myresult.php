<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center">
    <div class="dashbox">
        <h3>My Results</h3>

        <div style="width:inherit;overflow-y:auto;height:469px;">
            <h4>CGPA:<?= $cgpa ?></h4>
            <?php for ($i = 1; $i <= 8; $i++) {
                if ($sem['sgpa'][$i] != null) { ?>
                    <div class="item-card">
                        <h3>S<?= $i ?></h3>
                        <table align="center" class="table display table-striped table-bordered" border="1" style="width: 600px">
                            <tr>
                                <th>Slot</th>
                                <th>Course Name</th>
                                <th>Code</th>
                                <th>Grade</th>
                                <th>Credit</th>
                            </tr>
                            <?php foreach ($myresults as $row) {
                                if ($row->semester == $i) {
                                    if ($row->grade != NULL) { ?>
                                        <tr>
                                            <td><?= $row->slot ?></td>
                                            <td> <?= $row->course_name ?></td>
                                            <td><?= $row->course_code ?></td>
                                            <td><?= $row->grade ?></td>
                                            <td><?= $row->credits ?></td>
                                        </tr>
                            <?php }
                                }
                            } ?>
                            <tr>
                                <td colspan="2">Total Credits Earned</td>
                                <td colspan="3"><?= $sem['t_credits'][$i] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">SGPA</td>
                                <td colspan="3"><?= $sem['sgpa'][$i] ?></td>
                            </tr>
                        </table><br>
                    </div>
            <?php }
            } ?>
        </div>
        <br>
    </div>
</div>