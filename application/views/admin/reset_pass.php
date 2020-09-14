<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="height: 83vh;float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <?php echo form_open_multipart('admin/reset'); ?>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Username:</label>
                <select name="username" required>
                    <option></option>
                    <?php if ($students || $advisors || $hods || $principals || $office) {
                        foreach ($advisors as $user) { ?>
                            <option value='<?= $user->username ?>'><?= $user->username ?>(<?= $user->name ?>-<?= $user->role ?>)</option>
                        <?php }
                        foreach ($hods as $user) { ?>
                            <option value='<?= $user->username ?>'><?= $user->username ?>(<?= $user->name ?>-<?= $user->role ?>)</option>
                        <?php }
                        foreach ($principals as $user) { ?>
                            <option value='<?= $user->username ?>'><?= $user->username ?>(<?= $user->name ?>-<?= $user->role ?>)</option>
                        <?php }
                        foreach ($office as $user) { ?>
                            <option value='<?= $user->username ?>'><?= $user->username ?>(<?= $user->name ?>-<?= $user->role ?>)</option>
                        <?php }
                        foreach ($students as $user) { ?>
                            <option value='<?= $user->username ?>'><?= $user->username ?>(<?= $user->name ?>-<?= $user->role ?>)</option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label>New Password:</label>
                <input type="password" name="password" placeholder="Password" required><br>
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" name="cpassword" placeholder="Confirm" required><br>
            </div>
        </div>

        <div class="red-span">
        <label>Admin Password:</label>
        <input type="password" name="apassword" placeholder="Admin" required ><br>
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