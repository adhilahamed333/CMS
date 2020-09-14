<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center" class="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox" style="padding-bottom: 10px">
        <h4>Requests</h4>
        <div style="width:inherit;overflow-y:auto;height:37vh;">
            <?php if ($myrequests) {
                foreach ($myrequests as $myrequest) { ?>

                    <div class="item-card">
                        <div class="container" style="width:auto">
                            <div>
                                <div><b>Request ID: </b><?= $myrequest->request_id; ?></div>
                            </div>
                            <div>
                                <div><b>Certification/Service Requested:</b> <?= $myrequest->type; ?></div>
                            </div>
                            <div>
                                <div><b>Reason:</b> <?= $myrequest->reason; ?></div>
                            </div>
                            <div><?php if ($myrequest->advisor == 0) {
                                        if ($_SESSION['role'] == 'advisor') { ?>
                                        <div> <a href="<?php echo base_url() . "staff/action/" . $myrequest->request_id; ?>">View</a></div>
                                    <?php } else { ?>
                                        <div>Verification pending by Advisor</div>


                                    <?php }
                                    } elseif ($myrequest->advisor == -1) { ?>
                                    <div> <a href="<?php echo base_url() . "staff/action/" . $myrequest->request_id; ?>">View</a></div>
                                    <?php } elseif ($myrequest->advisor == 1 && $myrequest->hod == 0) {
                                        if ($_SESSION['role'] == 'hod') { ?>
                                        <div><a href="<?php echo base_url() . "staff/action/" . $myrequest->request_id; ?>">View</a></div>
                                    <?php } else { ?>
                                        <div>Verification pending by HOD</div>

                                    <?php }
                                    } elseif ($myrequest->advisor == 1 && $myrequest->hod == 1 && $myrequest->principal == 0) {
                                        if ($_SESSION['role'] == 'principal') { ?>
                                        <div><a href="<?php echo base_url() . "staff/action/" . $myrequest->request_id; ?>">View</a></div>
                                    <?php } else { ?>
                                        <div>Verification pending by Principal</div>
                                    <?php }
                                    } elseif ($myrequest->advisor == 1 && $myrequest->hod == 1 && $myrequest->principal == 1 && $myrequest->office == 0) {
                                        if ($_SESSION['role'] == 'office') { ?>
                                        <div><a href="<?php echo base_url() . "staff/action/" . $myrequest->request_id; ?>">View</a></div>
                                    <?php } else { ?>

                                        <div>Verification pending by Office</div>
                                    <?php }
                                    } else if ($_SESSION['role'] == 'office' && $myrequest->completed == 0) { ?>
                                    <div><a href="<?php echo base_url() . "staff/action/" . $myrequest->request_id; ?>">View</a></div>
                                <?php } else { ?>
                                    <div><a href="<?php echo base_url() . 'staff/view_request/' . $myrequest->request_id; ?> ">View request</a></div>
                                    <div><a href="<?php echo base_url() . 'pdf_generate/print_req/' . $myrequest->request_id; ?>">Print request</a></div>
                                <?php } ?>
                            </div>
                            <div>
                                <ul class='progressbar'>
                                    <?php if ($myrequest->submit == 1) { ?><li class=" active"><?php } elseif ($myrequest->submit == -1) { ?>
                                        <li class="deactive"><?php } else { ?>
                                        <li><?php } ?>Submit<br><?= $myrequest->name; ?><br><?= $myrequest->remarks; ?><br><?= $myrequest->submit_date; ?></li>
                                        <?php if ($myrequest->advisor == 1) { ?><li class="active"><?php } elseif ($myrequest->advisor == -1) { ?>
                                            <li class="deactive"><?php } else { ?>
                                            <li><?php } ?>Advisor<br><?= $myrequest->advisor_id; ?><br><?= $myrequest->a_remarks; ?><br><?= $myrequest->a_date; ?></li>
                                            <?php if ($myrequest->hod == 1) { ?><li class="active"><?php } elseif ($myrequest->hod == -1) { ?>
                                                <li class="deactive"><?php } else { ?>
                                                <li><?php } ?>HOD<br><?= $myrequest->hod_id; ?><br><?= $myrequest->h_remarks; ?><br><?= $myrequest->h_date; ?></li>
                                                <?php if ($myrequest->principal == 1) { ?><li class="active"><?php } elseif ($myrequest->principal == -1) { ?>
                                                    <li class="deactive"><?php } else { ?>
                                                    <li><?php } ?>Principal<br><?= $myrequest->principal_id; ?><br><?= $myrequest->p_remarks; ?><br><?= $myrequest->p_date; ?></li>
                                                    <?php if ($myrequest->office == 1) { ?><li class="active"><?php } elseif ($myrequest->office == -1) { ?>
                                                        <li class="deactive"><?php } else { ?>
                                                        <li><?php } ?>Office<br><?= $myrequest->office_id; ?><br><?= $myrequest->o_remarks; ?><br><?= $myrequest->o_date; ?></li>
                                                        <?php if ($myrequest->issued == 1) { ?><li class="active"><?php } elseif ($myrequest->issued == -1) { ?>
                                                            <li class="deactive"><?php } else { ?>
                                                            <li><?php } ?>Issued<br><?= $myrequest->i_remarks; ?><br><?= $myrequest->issue_date; ?></li>
                                                            <?php if ($myrequest->receipt == 1) { ?><li class="active"><?php } elseif ($myrequest->receipt == -1) { ?>
                                                                <li class="deactive"><?php } else { ?>
                                                                <li><?php } ?>Receipt<br><?= $myrequest->receipt_date; ?></li>
                                                                <?php if ($myrequest->completed == 1) { ?><li class="active"><?php } else { ?>
                                                                    <li><?php } ?>Completed<br><?= $myrequest->r_remarks; ?><br><?= $myrequest->c_date; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                </table>

            <?php    } else {
                echo "<h4>No Requests</h4>";
            } ?><br>
        </div>
    </div>

    <div class="dashbox">
        <h4>Documents</h4>
        <div>
            <div style="width:99%;float:none;overflow-y:auto;height:20vh;">
                <?php if ($mydocs) {
                    foreach ($mydocs as $mydoc) { ?>

                        <div class="item-card">
                            <div>Document ID:<?= $mydoc->doc_id; ?></div>
                            <div>Type:<?= $mydoc->dtype; ?></div>
                            <div>Name:<?= $mydoc->name; ?></div>
                            <div>Admission no:<?= $mydoc->owner; ?></div>
                            <?php if ($mydoc->verified == 0) { ?>
                                <div><a href="<?php echo base_url() . "/staff/verifydoc/" . $mydoc->doc_id; ?>">Verify</a></div>
                            <?php } else {
                                echo '<div>Verified</div>' . $mydoc->remarks;
                            } ?>
                            <div><a href="<?php echo base_url() . 'mydash/viewdoc/' . $mydoc->doc_id; ?>">View</a></div>
                        </div>
                <?php }
                } else {
                    echo "No documents for verification";
                } ?>
            </div>
        </div>
    </div><br>
</div>