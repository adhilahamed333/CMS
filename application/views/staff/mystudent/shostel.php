<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <h5><a href="<?php echo base_url() . 'staff/mystudent/' . $hostel['admission_no']; ?>">Profile</a></h5>
    <h3>Hostel</h3>
    <h9>Hostel Name:</h9>
    <?php
    echo $hostel['hostel_name'];
    ?><br>
    <h9>Date of Admission:</h9>
    <?php
    echo $hostel['date_of_admission'];
    ?><br>

</div>