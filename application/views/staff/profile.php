<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <div class="dashbox">
        <h1>Profile</h1>
        <div class="item-card">
            <h9>Username:</h9>
            <?php
            echo $sdetails['username'];
            ?><br>
            <h9>Name:</h9>
            <?php
            echo $sdetails['name'];
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
                <h9>Batch in Charge:</h9>
            <?php
                echo $sdetails['batch_in_charge'];
            }
            if ($_SESSION['role'] == 'office') {
            ?><br>
                <h9>Section in Charge:</h9>
            <?php
                echo $sdetails['section_in_charge'];
            } ?><br>


        </div>
        <div>
            <?php echo form_open('home/password_change'); ?>

            <input type="submit" name="submit" value="Change Password" class="btn btn-primary">

            </form>
        </div>
        <br>
    </div>

</div>