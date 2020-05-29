<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10 text-center" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Compose Message</h2>
        <div class="item-card text-center"><br>
            <?php echo form_open('message/send'); ?>
            <div class="form-group">
                <label for="reason" style="margin-right:25px">From:</label>
                <input type="text" name="from" value="<?= $_SESSION['username'] ?>" readonly style="width: 80%;height:50px"><br>
            </div>
            <div class="form-group">
                <label for="request" style="margin-right:44px">To:</label>
                <select name="to" style="width: 80%;height:50px" required>
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
                </select><br>
            </div>
            <div class="form-group">
                <label for="reason" style="margin-right:9px">Subject:</label>
                <input type="text" name="subject" style="width: 80%;height:50px" required><br>
            </div>
            <div class="form-group">
                <label for="reason" style="margin-right:855px">Message:</label><br>
                <textarea name="message" style="margin-left: 70px;width: 80%;height:120px" required></textarea><br>
            </div>
            <input type="submit" name="send" value="Send" class="btn btn-primary" style="margin: 8px">
            </form>
        </div>
        <br>
    </div><br>
</div>