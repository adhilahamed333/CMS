<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="height: 83vh;float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Enter Subject details</h2>
        <?php echo form_open_multipart('admin/req'); ?>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Request Type:</label>
                <input type="text" name="type" placeholder="Request Type" required><br>
            </div>
            <div class="form-group">
                <label>Section:</label>
                <input type="text" name="section" placeholder="Section" required><br>
            </div>
            
        </div>
        <span class="red-span">
            <?php if ($error_msg) {
                echo $error_msg . "<br>";
            } ?></span>

        <input type="submit" value="Submit" class="btn btn-primary" style="width:100%">
        </form><br>
    </div>
</div>