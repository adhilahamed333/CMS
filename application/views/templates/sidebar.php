<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

        <div class="col-sm-2 sidenav">
            <p><a href="<?php echo base_url(); ?>index.php/request">Certification/Service Requests</a></p>
            <?php if ($_SESSION['role'] == 'student') { ?><p><a href="<?php echo base_url(); ?>index.php/mydash/mydoc">My Documents</a></p><?php } ?>
            <p><a href="#">Results</a></p>
        </div>