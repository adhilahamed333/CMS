<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <h1>Profile</h1>
    <h9>Username:</h9>
    <?php
    echo $sdetails['username'];
    ?><br>
    <h9>Staff ID:</h9>
    <?php
    echo $sdetails['staff_id'];
    if ($_SESSION['role'] == 'advisor' || $_SESSION['role'] == 'hod') {
    ?><br>
        <h9>Branch in Charge:</h9>
    <?php
        echo $sdetails['branch_in_charge'];
    }
    if ($_SESSION['role'] == 'advisor') {
    ?><br>
        <h9>Semester in Charge:</h9>
    <?php
        echo $sdetails['sem_in_charge'];
    }
    if ($_SESSION['role'] == 'office') {
    ?><br>
        <h9>Section in Charge:</h9>
    <?php
        echo $sdetails['section_in_charge'];
    } ?><br>



</div>