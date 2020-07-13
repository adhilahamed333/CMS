<?php
defined('BASEPATH') or exit('No direct script access allowed');

?><div class="login col-sm-3 text-center"></div>
<div class="login col-sm-6 text-center">
    <h1>Login</h1>
    <?php echo form_open('home/validate_login'); ?>
    <div class="form-group">
        <input type="text" name="username" placeholder="Username" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <span class="red-span"><?php echo $message_error; ?></span>
    <div class="form-group">
        <input type="submit" name="submit" value="Login" class="btn btn-primary">
    </div>
    </form>


</div>
<div class="login col-sm-3 text-center"></div>