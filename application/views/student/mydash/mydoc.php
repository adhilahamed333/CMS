<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-center">
    <div class="dashbox">
        <h4>My Documents </h4>
        <?php if ($doc_id) { ?>
            <div class="item-card">
                <?php echo $doc_id; ?><br></div>
        <?php } ?>
        <div>
            <div>
                <?php if ($mydocs) {
                    foreach ($mydocs as $mydoc) { ?>

                        <div  class="item-card">
                            <div>Document ID:<?= $mydoc->doc_id; ?></div>
                            <div>Type:<?= $mydoc->dtype; ?></div>
                            <div><a href="<?php echo base_url() . 'index.php/mydash/viewdoc/' . $mydoc->doc_id; ?>">View</a></div>
                        </div>
                <?php }
                } else {
                    echo "No verified documents";
                } ?>
            </div>
        </div>
        <div class="item-card">
            <?php echo form_open_multipart('mydash/upload_doc'); ?>
            <label for="userfile">Upload Document:</label>
            <br>Document type:
            <input type="text" name="dtype"><br><br>
            <input type="file" name="userfile" size="20"  style="display: unset; padding-left:100px"/><br>
            <span><?php echo $error_msg; ?><br></span>
            <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div><br>
    </div><br>
</div>