<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="col-sm-10 text-left" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Certification /Service Requests</h2>
        <?php echo form_open_multipart('request/request_s1'); ?>

        <div class="form-group">
            <label for="request">Request type:</label>
            <select name="request">
                <option value="0">Select a request type:</option>
                <?php if ($types) {
                    foreach ($types as $type) { ?>
                        <option value='<?= $type->type ?>'><?= $type->type ?></option>
                <?php }
                } ?>
            </select><br>
        </div>
        <div class="form-group">
            <label for="other">Specify:</label>
            <input type="text" name="other" placeholder="Specify"><br>
        </div>
        <div class="form-group">
            <label for="reason">Reason:</label>
            <input type="text" name="reason" placeholder="Reason"><br>
        </div>
        <div class=form-group>
            <label for="userfile">Attatch documents if applicable:</label>
            <br>Document type:
            <input type="text" name="dtype">
            <input type="file" name="userfile" size="20" />
        </div>
        <div class="form-group">
            <label>Applicant's Undertaking:</label><br>
            <input type="checkbox" name="undertaking1" value="a"><label for="undertaking1">I certify that all the informaition given above is true</label><br>
            <input type="checkbox" name="undertaking2" value="b"><label for="undertaking2">No police /court /institute cases of law-and-order /indisciplice are pending against me</label><br>
            <input type="checkbox" name="undertaking3" value="c"><label for="undertaking3">I undertake to return the testimonials (taken fron office) within 3 days from the date of receipt, keep copies for future use, and not request for the same again</label><br>
            <input type="checkbox" name="undertaking4" value="d"><label for="undertaking4">I am not in reciept of any other scholorship /stipend /finantial aid, shall retain only one scholarship /stipend, and surrender all others, if any</label><br>
            <input type="checkbox" name="undertaking5" value="e"><label for="undertaking5">I agree to legal and punitive actions against me, if i engoy more than one scholarship /stipend at a time</label><br>
        </div>

        <div class="form-group">
            <label for="remarks">Remarks:</label>
            <input type="text" name="remarks" placeholder="Remarks">
        </div>
        <span class="red-span">
            <?php if ($error_msg) {
                echo $error_msg . "<br>";
            } ?></span>

        <input type="submit" value="Submit" class="btn btn-primary">
        </form>


    </div>
</div>