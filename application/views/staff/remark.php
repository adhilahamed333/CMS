<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center">
    <br>
    <div class="dashbox">
    Request ID:<?php echo $arequest_id; ?><br>
    <div class="item-card">
    <a href="<?php echo base_url() . "index.php/staff/mystudent/" . $admission_no; ?>">Student Details</a><br>
    <a href="<?php echo base_url() . "index.php/staff/view_request/" . $arequest_id; ?>">View request</a><br>
    <?php if ($status->office == 1) { ?><a href="<?php echo base_url() . "index.php/pdf_generate/print_req/" . $arequest_id; ?>">Print request</a><br>
        <?php if ($status->office == 1 && $status->issued == 0) {
            echo form_open_multipart('staff/issue_request/' . $arequest_id);
            echo '<input type="checkbox" name="return" value="1"><label for="return">Return appicable</label><input type="submit" value="Issue">';
        ?></form><br><?php } ?>
        <?php if ($status->issued == 1 && $status->receipt == 1 && $requests->return_applicable == 1 && $requests->returned == 0) {
            echo "<a href='" . base_url() . "index.php/staff/verify_return/" . $arequest_id . "'>Verify return</a><br>";
        }
    } else if (($_SESSION['role'] == 'advisor' && $status->advisor == 0) || ($_SESSION['role'] == 'hod' && $status->hod == 0) || ($_SESSION['role'] == 'principal' && $status->principal == 0) || ($_SESSION['role'] == 'office' && $status->office == 0)) {
        echo form_open_multipart('staff/a_remark');
        echo '<input type="hidden" name="arequest_id" value=' . $arequest_id . '>
    <input type="text" name="remark"><input type="submit" value="Approve">';
        ?></form>
    <?php echo form_open_multipart('staff/r_remark');
        echo '<input type="hidden" name="arequest_id" value=' . $arequest_id . '>
    <input type="text" name="remark"><input type="submit" value="Reject">';
    } ?></form>
</div><br>
</div>
</div>