<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<div class="login col-sm-10 text-left">
    <div class="dashbox">
        <h3>Subject-wise Result Analysis(S<?= $semester ?>)</h3>
        <div class="item-card" style="width:inherit;overflow-y:auto;height:438px;">
            <table class="table display table-striped table-bordered" style="width:100%">
            <colgroup>
                    <col style="width:16%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">
                    <col style="width:6%">                    
                </colgroup>
                <?php
                if ($subjectwise) { ?>
                    <tr>
                        <td>Course Code</td>
                        <td>Pass%</td>
                        <td>Pass</td>
                        <td>Fail</td>
                        <td>O</td>
                        <td>A+</td>
                        <td>A</td>
                        <td>B+</td>
                        <td>B</td>
                        <td>C</td>
                        <td>P</td>
                        <td>F</td>
                        <td>FE</td>
                        <td>I</td>
                        <td>Absent</td>
                    </tr>
                    <?php foreach ($subjectwise as $subwise) { ?>
                        <tr>
                            <td><?= $subwise["total"]->course_code ?></td>
                            <td><?= round(($subwise["total"]->total-$subwise["f"]->f+$subwise["fe"]->fe+$subwise["i"]->i+$subwise["ab"]->ab)*100/$subwise["total"]->total-0,2)?></td>
                            <td><?= $subwise["total"]->total-$subwise["f"]->f+$subwise["fe"]->fe+$subwise["i"]->i+$subwise["ab"]->ab ?></td>
                            <td><?=$subwise["f"]->f+$subwise["fe"]->fe+$subwise["i"]->i+$subwise["ab"]->ab?></td>
                            <td><?= $subwise["o"]->o ?></td>
                            <td><?= $subwise["ap"]->ap ?></td>
                            <td><?= $subwise["a"]->a ?></td>
                            <td><?= $subwise["bp"]->bp ?></td>
                            <td><?= $subwise["b"]->b ?></td>
                            <td><?= $subwise["c"]->c ?></td>
                            <td><?= $subwise["p"]->p ?></td>
                            <td><?= $subwise["f"]->f ?></td>
                            <td><?= $subwise["fe"]->fe ?></td>
                            <td><?= $subwise["i"]->i ?></td>
                            <td><?= $subwise["ab"]->ab ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>

            </table>
        </div>
    </div>

</div>