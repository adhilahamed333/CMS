<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="height: 83vh;float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h1>Profile</h1>
        <div class="item-card">
        
            <h3><a href="<?php echo base_url(); ?>student/sbasics">Basics</a></h3>
            <h3><a href="<?php echo base_url(); ?>student/spersonal">Personal</a></h3>
            <h3><a href="<?php echo base_url(); ?>student/sfamily">Family</a></h3>
            <h3><a href="<?php echo base_url(); ?>student/sadmission">Admission</a></h3>
            <h3><a href="<?php echo base_url(); ?>student/shostel">Hostel</a></h3>
            <h3><a href="<?php echo base_url(); ?>student/sacadentry">Acadamic Entry Level</a></h3>
            <h3><a href="<?php echo base_url(); ?>student/sacadexit">Acadamic Exit Level</a></h3>
        </div>
        <div>
            <?php echo form_open('home/password_change'); ?>

            <input type="submit" name="submit" value="Change Password" class="btn btn-primary">

            </form>
        </div><br>
    </div>


</div>