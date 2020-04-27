<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="col-sm-2 sidenav">

    <?php if ($_SESSION['role'] == 'student') { ?>
        <h4><a href="<?php echo base_url(); ?>mydash/mydoc">My Documents</a></h4>
        <h4><a href="<?php echo base_url(); ?>request">Certification/Service Requests</a></h4>
        <h4><a href="<?php echo base_url() . 'myresult'; ?>">Results</a></h4>
    <?php } else { ?>
        <h4><a href="<?php echo base_url() . 'staff/myclass'; ?>">My Class</a></h4>
        <h4><a href="<?php echo base_url() . 'result_upload'; ?>">Upload Results</a></h4>
    <?php } ?>

</div>