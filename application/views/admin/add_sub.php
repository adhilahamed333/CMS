<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="height: 83vh;float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Enter Subject details</h2>
        <?php echo form_open_multipart('admin/sub'); ?>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Course Code:</label>
                <input type="text" name="course_code" placeholder="Course Code" required><br>
            </div>
            <div class="form-group">
                <label>Course Name:</label>
                <input type="text" name="course_name" placeholder="Course Name" required><br>
            </div>
            <div class="form-group">
                <label>Semester:</label>
                <input type="text" name="sem" placeholder="Semester" required><br>
            </div>
            <div class="form-group">
                <label>Credit:</label>
                <input type="text" name="credit" placeholder="Credit" required><br>
            </div>
            <div class="form-group">
                <label>Slot:</label>
                <input type="text" name="slot" placeholder="Slot" required><br>
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