<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Enter Principal details</h2>
        <?php echo form_open_multipart('admin/principal'); ?>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Username" required><br>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="text" name="password" placeholder="password" required><br>
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="text" name="cpassword" placeholder="Confirm" required><br>
            </div>
        </div>
        <h3>Basics:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required><br>
            </div>
            <div class="form-group">
                <label>Staff ID:</label>
                <input type="text" name="staff_id" required><br>
            </div>
        </div>
        <span class="red-span">
            <?php if ($error_msg) {
                echo $error_msg . "<br>";
            } ?>
        </span>

        <input type="submit" value="Submit" class="btn btn-primary" style="width:100%">
        </form><br>
    </div>
</div>