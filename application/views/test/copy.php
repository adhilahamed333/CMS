<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-8 text-center">
    <h4>Requests</h4>
    <?php if ($myrequests) { ?>
        <table border="1">
            <tr>
                <th>Request ID</th>
                <th>Request Type</th>
                <th>Reason</th>
                <th>Remarks</th>
                <th>Date Submitted/Withdrawn</th>
                <th>submit</th>
                <th>advisor</th>
                <th>a_remarks</th>
                <th>hod</th>
                <th>h_remarks</th>
                <th>principal</th>
                <th>p_remarks</th>
                <th>office</th>
                <th>o_remarks</th>
                <th>Receipt</th>
                <th>completed</th>

            </tr>
            <?php
            foreach ($myrequests as $myrequest) { ?>

                <tr>
                    <td><?= $myrequest->request_id; ?></td>
                    <td><?= $myrequest->type; ?></td>
                    <td><?= $myrequest->reason; ?></td>
                    <td><?= $myrequest->remarks; ?></td>
                    <td><?= $myrequest->submit_date; ?></td>
                    <td><?= $myrequest->submit; ?></td>
                    <td><?= $myrequest->advisor; ?></td>
                    <td><?= $myrequest->a_remarks; ?></td>
                    <td><?= $myrequest->hod; ?></td>
                    <td><?= $myrequest->h_remarks; ?></td>
                    <td><?= $myrequest->principal; ?></td>
                    <td><?= $myrequest->p_remarks; ?></td>
                    <td><?= $myrequest->office; ?></td>
                    <td><?= $myrequest->o_remarks; ?></td>
                    <td><?= $myrequest->receipt; ?></td>
                    <td><?= $myrequest->completed; ?></td>
                    <?php if ($myrequest->issued == 1 && $myrequest->receipt == 0) {
                        echo "<td><a href='" . base_url() . "index.php/student/verify_receipt/" . $myrequest->request_id . "'>Verify Receive</a></td>";
                    }
                    if ($myrequest->submit != -1 && $myrequest->advisor != 1) {
                        echo form_open_multipart('student/withdraw_remark');
                        echo '<td><input type="hidden" name="arequest_id" value=' . $myrequest->request_id . '><input type="text" name="remark"><input type="submit" value="Withdraw"></form></td>';
                    } ?>

                </tr>
                <tr>
                    <td colspan="16">
                        <div class="container">
                            <ul class='progressbar'>
                                <?php if ($myrequest->submit == 1) { ?><li class="active"><?php } else { ?>
                                    <li><?php } ?>Submit</li>
                                    <?php if ($myrequest->advisor == 1) { ?><li class="active"><?php } else { ?>
                                        <li><?php } ?>Advisor</li>
                                        <?php if ($myrequest->hod == 1) { ?><li class="active"><?php } else { ?>
                                            <li><?php } ?>HOD</li>
                                            <?php if ($myrequest->principal == 1) { ?><li class="active"><?php } else { ?>
                                                <li><?php } ?>Principal</li>
                                                <?php if ($myrequest->office == 1) { ?><li class="active"><?php } else { ?>
                                                    <li><?php } ?>Office</li>
                                                    <?php if ($myrequest->issued == 1) { ?><li class="active"><?php } else { ?>
                                                        <li><?php } ?>Issued</li>
                                                        <?php if ($myrequest->receipt == 1) { ?><li class="active"><?php } else { ?>
                                                            <li><?php } ?>Receipt</li>
                                                            <?php if ($myrequest->completed == 1) { ?><li class="active"><?php } else { ?>
                                                                <li><?php } ?>Completed</li>
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