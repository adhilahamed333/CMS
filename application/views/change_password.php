<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<div class="login col-sm-2 text-center"></div>
<div class="login col-sm-6 text-center">

    <div class="dashbox">
        <h1>Change Password</h1>
        <?php echo form_open('home/update_password'); ?>
        <div class="form-group">
            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
            <label for="op">Old Password</label>
            <input type="password" name="op" placeholder="Old Password" class="form-control">
        </div>
        <div class="form-group">
            <label for="op">New Password</label>
            <input type="password" name="np" placeholder="New Password" class="form-control">
        </div>
        <div class="form-group">
            <label for="op">Confirm New Password</label>
            <input type="password" name="cp" placeholder="Confirm New Password" class="form-control">
        </div>
        <span style="color: red"><?php echo $message_error; ?></span>
        <div class="form-group">
            <input type="submit" name="submit" value="Change" class="btn btn-primary">
        </div>
        <br>
    </div>
    </form>


</div>
<div class="login col-sm-2 text-center"></div>