<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <div>
        <?php echo $doc_id; ?><br></div>
    <div>
        <table>
            <tr>
                <th>Document ID</th>
                <th>Type</th>
            </tr>
            <?php if ($mydocs) {
                foreach ($mydocs as $mydoc) { ?>

                    <tr>
                        <td><?= $mydoc->doc_id; ?></td>
                        <td><?= $mydoc->dtype; ?></td>
                        <td><a href="<?php echo base_url() . 'index.php/mydash/viewdoc/' . $mydoc->doc_id; ?>">View</a></td>
                    </tr>
            <?php }
            } ?>
        </table>
    </div>
    <div class=form-group>
        <?php echo form_open_multipart('mydash/upload_doc'); ?>
        <label for="userfile">Upload Document:</label>
        <br>Document type:
        <input type="text" name="dtype">
        <input type="file" name="userfile" size="20" />
        <?php echo $error_msg; ?><br>
        <input type="submit" value="Upload" class="btn btn-primary">
        </form>
    </div>
</div>