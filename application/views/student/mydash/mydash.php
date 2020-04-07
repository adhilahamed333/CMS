<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h4>Requests</h4>

        <?php if ($myrequests) {
            foreach ($myrequests as $myrequest) { ?>

                <div class="item-card">
                    <div class="container" style="width:auto">
                        <div>
                            <div>Request ID: <?= $myrequest->request_id; ?></div>
                        </div>
                        <div>
                            <div>Certification/Service Requested: <?= $myrequest->type; ?></div>
                        </div>
                        <div>
                            <div>Reason: <?= $myrequest->reason; ?></div>
                        </div>
                        <div>
                            <?php if ($myrequest->issued == 1 && $myrequest->receipt == 0) {
                                echo "<div><a href='" . base_url() . "index.php/student/verify_receipt/" . $myrequest->request_id . "'>Verify Receive</a></div>";
                            }
                            if (($myrequest->submit == 1 && $myrequest->advisor != 1 && $myrequest->advisor != -1)) {
                                echo form_open_multipart('student/withdraw_remark');
                                echo '<div><input type="hidden" name="arequest_id" value=' . $myrequest->request_id . '><input type="text" name="remark"><input type="submit" value="Withdraw"></form></div>';
                            } ?>

                        </div>


                        <div>
                            <ul class='progressbar'>
                                <?php if ($myrequest->submit == 1) { ?><li class="active"><?php } elseif ($myrequest->submit == -1) { ?>
                                    <li class="deactive"><?php } else { ?>
                                    <li><?php } ?>Submit<br><?= $myrequest->remarks; ?><br><?= $myrequest->submit_date; ?></li>
                                    <?php if ($myrequest->advisor == 1) { ?><li class="active"><?php } elseif ($myrequest->advisor == -1) { ?>
                                        <li class="deactive"><?php } else { ?>
                                        <li><?php } ?>Advisor<br><?= $myrequest->a_remarks; ?><br><?= $myrequest->advisor_id; ?><br><?= $myrequest->a_date; ?></li>
                                        <?php if ($myrequest->hod == 1) { ?><li class="active"><?php } elseif ($myrequest->hod == -1) { ?>
                                            <li class="deactive"><?php } else { ?>
                                            <li><?php } ?>HOD<br><?= $myrequest->h_remarks; ?><br><?= $myrequest->hod_id; ?><br><?= $myrequest->h_date; ?></li>
                                            <?php if ($myrequest->principal == 1) { ?><li class="active"><?php } elseif ($myrequest->principal == -1) { ?>
                                                <li class="deactive"><?php } else { ?>
                                                <li><?php } ?>Principal<br><?= $myrequest->p_remarks; ?><br><?= $myrequest->principal_id; ?><br><?= $myrequest->p_date; ?></li>
                                                <?php if ($myrequest->office == 1) { ?><li class="active"><?php } elseif ($myrequest->office == -1) { ?>
                                                    <li class="deactive"><?php } else { ?>
                                                    <li><?php } ?>Office<br><?= $myrequest->o_remarks; ?><br><?= $myrequest->office_id; ?><br><?= $myrequest->o_date; ?></li>
                                                    <?php if ($myrequest->issued == 1) { ?><li class="active"><?php } elseif ($myrequest->issued == -1) { ?>
                                                        <li class="deactive"><?php } else { ?>
                                                        <li><?php } ?>Issued<br><?= $myrequest->issue_date; ?></li>
                                                        <?php if ($myrequest->receipt == 1) { ?><li class="active"><?php } elseif ($myrequest->receipt == -1) { ?>
                                                            <li class="deactive"><?php } else { ?>
                                                            <li><?php } ?>Receipt<br><?= $myrequest->receipt_date; ?></li>
                                                            <?php if ($myrequest->completed == 1) { ?><li class="active"><?php } else { ?>
                                                                <li><?php } ?>Completed<br><?= $myrequest->c_date; ?></li>
                            </ul>
                        </div>

                    </div>

                </div>
        <?php }
        } else {
            echo "<h4>No Requests</h4>";
        } ?><br>

    </div><br>

</div>