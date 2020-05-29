<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>View Message</h2>
        <div class="item-card text-center"><br>
            <?php if ($_SESSION['username'] != $message->fromuser) { ?>
                <div class="form-group">
                    <label for="reason" style="margin-right:25px">From:</label>
                    <input type="text" name="from" value="<?= $message->fromuser ?>" readonly style="width: 80%"><br>
                </div>
            <?php }
            if ($_SESSION['username'] != $message->touser) { ?>
                <div class="form-group">
                    <label for="request" style="margin-right:44px">To:</label>
                    <input type="text" name="from" value="<?= $message->touser ?>" readonly style="width: 80%"><br>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="request" style="margin-right:27px">Date:</label>
                <input type="text" name="from" value="<?php echo date('d/M/Y  h:i A', strtotime($message->time)); ?>" readonly style="width: 80%"><br>
            </div>
            <?php if ($message->readtime!=NULL) { ?>
                <div class="form-group">
                    <label for="request" style="margin-right:8px">Read at:</label>
                    <input type="text" name="from" value="<?php echo date('d/M/Y  h:i A', strtotime($message->readtime)); ?>" readonly style="width: 80%"><br>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="reason" style="margin-right:9px">Subject:</label>
                <input type="text" name="from" value="<?= $message->subject ?>" readonly style="width: 80%"><br>
            </div>
            <div class="form-group">
                <label for="reason" style="margin-right:825px">Message:</label><br>
                <textarea name="message" style="margin-left: 70px;width: 80%;height:200px"><?= $message->message ?></textarea><br>
            </div>
        </div>
        <br>
    </div><br>
</div>