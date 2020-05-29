<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-center">
    <br>
    <div class="dashbox"><br>
        <?php echo form_open_multipart('Admin/role'); ?>
        <div class="form-group">
            <label for="request">User Role:</label>
            <select name="role">
                <option value="0">Select a Role:</option>
                <option value="student">Student</option>
                <option value="advisor">Advisor</option>
                <option value="hod">HOD</option>
                <option value="principal">Principal</option>
                <option value="office">Office</option>
            </select><br>
        </div>
        <span class="red-span"><?php echo $error_msg; ?></span><br>
        <input type="submit" value="Submit" class="btn btn-primary">
        </form><br>
    </div>
</div>