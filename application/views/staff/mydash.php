<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-left" style="float:left;overflow-y:auto;height:100%;">
    <div>
        <h4>Requests</h4>
        <?php if ($myrequests) { ?>
            <div style="float:left;overflow-y:auto;height:100%;">
                <table border="1">
                    <tr>
                        <th>Request ID</th>
                        <th>Request Type</th>
                        <th>Reason</th>
                        <th>Submit Remarks</th>
                        <th>Date Submitted</th>
                        <th>Name</th>
                        <th>Admission number</th>
                        <th>Advisor Remarks</th>
                        <th>HOD Remarks</th>
                        <th>Principal Remarks</th>
                        <th>Office Remarks</th>
                        <th>Status/Action</th>


                    </tr>
                    <?php if ($myrequests) {

                        foreach ($myrequests as $myrequest) {

                    ?>
                            <tr>
                                <td><?= $myrequest->request_id; ?></td>
                                <td><?= $myrequest->type; ?></td>
                                <td><?= $myrequest->reason; ?></td>
                                <td><?= $myrequest->remarks; ?></td>
                                <td><?= $myrequest->submit_date; ?></td>
                                <td><?= $myrequest->name; ?></td>
                                <td><?= $myrequest->admission_no; ?></td>
                                <td><?php if ($myrequest->advisor == 0) {
                                        if ($_SESSION['role'] == 'advisor') { ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <a href="<?php echo base_url() . "index.php/staff/action/" . $myrequest->request_id; ?>">View</a></td>
                            <?php } else { ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Verification pending by Advisor</td>
                            <?php

                                        }
                                    } elseif ($myrequest->advisor == 1 && $myrequest->hod == 0) {
                                        echo $myrequest->a_remarks . ' By ' . $myrequest->advisor_id; ?></td>
                            <?php if ($_SESSION['role'] == 'hod') { ?>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <a href="<?php echo base_url() . "index.php/staff/action/" . $myrequest->request_id; ?>">View</a></td>
                            <?php } else { ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Verification pending by HOD</td>
                            <?php
                                        }
                                    } elseif ($myrequest->advisor == 1 && $myrequest->hod == 1 && $myrequest->principal == 0) {
                                        echo $myrequest->a_remarks . ' By ' . $myrequest->advisor_id; ?></td>
                            <td><?php echo $myrequest->h_remarks . ' By ' . $myrequest->hod_id; ?></td>
                            <?php if ($_SESSION['role'] == 'principal') { ?>
                                <td></td>
                                <td></td>
                                <td> <a href="<?php echo base_url() . "index.php/staff/action/" . $myrequest->request_id; ?>">View</a></td>
                            <?php } else { ?>
                                </td>
                                <td></td>
                                <td></td>

                                <td>Verification pending by Principal</td>
                            <?php }
                                    } elseif ($myrequest->advisor == 1 && $myrequest->hod == 1 && $myrequest->principal == 1 && $myrequest->office == 0) {
                                        echo $myrequest->a_remarks . ' By ' . $myrequest->advisor_id; ?></td>
                            <td><?php echo $myrequest->h_remarks . ' By ' . $myrequest->hod_id; ?></td>
                            <td><?php echo $myrequest->p_remarks . ' By ' . $myrequest->principal_id; ?></td>
                            <?php if ($_SESSION['role'] == 'office') { ?>

                                <td></td>
                                <td> <a href="<?php echo base_url() . "index.php/staff/action/" . $myrequest->request_id; ?>">View</a></td>
                            <?php } else { ?>
                                </td>
                                <td></td>


                                <td>Verification pending by Office</td>
                            <?php }
                                    } else if ($_SESSION['role'] == 'office' && $myrequest->completed == 0) {
                                        echo $myrequest->a_remarks . ' By ' . $myrequest->advisor_id . '</td><td>' . $myrequest->h_remarks . ' By ' . $myrequest->hod_id . '</td><td>' . $myrequest->p_remarks . ' By ' . $myrequest->principal_id . '</td><td>' . $myrequest->o_remarks . ' By ' . $myrequest->office_id; ?></td>
                            <td><a href="<?php echo base_url() . "index.php/staff/action/" . $myrequest->request_id; ?>">View</a>
                            <?php } else {
                                        echo $myrequest->a_remarks . ' By ' . $myrequest->advisor_id . '</td><td>' . $myrequest->h_remarks . ' By ' . $myrequest->hod_id . '</td><td>' . $myrequest->p_remarks . ' By ' . $myrequest->principal_id . '</td><td>' . $myrequest->o_remarks . ' By ' . $myrequest->office_id  . '</td><td><a href="' . base_url() . "index.php/staff/view_request/" . $myrequest->request_id . '">View request</a><br><a href="' . base_url() . 'index.php/pdf_generate/print_req/' . $myrequest->request_id . '">Print request</a>';
                                    } ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        <?php    } else {
            echo "<h4>No Requests</h4>";
        } ?>


        <div style="float:left;overflow-y:auto;height:100%;">
            <h4>Documents</h4>
            <table border="1">
                <tr>
                    <th>Document ID</th>
                    <th>Document Type</th>
                    <th>Owner Admission Number</th>
                    <th>Owner Name</th>
                    <th>Remarks</th>
                    <th>Status</th>

                </tr>
                <?php if ($mydocs) {

                    foreach ($mydocs as $mydoc) {

                ?>
                        <tr>
                            <td><?= $mydoc->doc_id; ?></td>
                            <td><?= $mydoc->dtype; ?></td>
                            <td><?= $mydoc->owner; ?></td>
                            <td><?= $mydoc->name; ?></td>

                            <td><?php if ($mydoc->verified == 0) {
                                ?> </td>
                            <td><a href="<?php echo base_url() . "index.php/staff/verifydoc/" . $mydoc->doc_id; ?>">Verify</a></td>
                        <?php } else {
                                    echo $mydoc->remarks . '</td><td>Verified';
                                } ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>