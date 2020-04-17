<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-center">


    <div class="dashbox">
        <h5>Documents</h5>
        <?php if ($mydocs) {
            foreach ($mydocs as $mydoc) { ?>

                <div class="item-card">
                    <div><?= $mydoc->doc_id; ?></div>
                    <div><?= $mydoc->dtype; ?></div>
                    <div><a href="<?php echo base_url() . 'index.php/mydash/viewdoc/' . $mydoc->doc_id; ?>">View</a></div>
                </div>
        <?php }
        } ?>
        <br>
    </div>

</div>