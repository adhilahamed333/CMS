<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center">
    <h4>Requests</h4>
    <?php if ($myrequests) { ?>
        <table border="1">

            <?php
            foreach ($myrequests as $myrequest) { ?>

                <tr>
                    <td >Request ID: <?= $myrequest->request_id; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Certification/Service Requested: <?= $myrequest->type; ?></td>
                </tr>
                <tr>
                    <td>Reason: <?= $myrequest->reason; ?></td>
                    <?php if ($myrequest->issued == 1 && $myrequest->receipt == 0) {
                        echo "<td><a href='" . base_url() . "index.php/student/verify_receipt/" . $myrequest->request_id . "'>Verify Receive</a></td>";
                    }
                    if (($myrequest->submit == 1 && $myrequest->advisor != 1 && $myrequest->advisor != -1)) {
                        echo form_open_multipart('student/withdraw_remark');
                        echo '<td><input type="hidden" name="arequest_id" value=' . $myrequest->request_id . '><input type="text" name="remark"><input type="submit" value="Withdraw"></form></td>';
                    } ?>

                </tr>
                <tr>
                    <td colspan="15">
                        <div class="container">
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
                    </td>
                </tr>
        <?php }
        } else {
            echo "<h4>No Requests</h4>";
        } ?>
        </table>

</div>