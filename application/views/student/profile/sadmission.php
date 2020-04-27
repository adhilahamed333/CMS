<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <h5><a href="<?php echo base_url(); ?>home/profile">Profile</a></h5>
    <div class="dashbox">
        <h3>Admission</h3>
        <div class="item-card">
            <h9>Admission Number:</h9>
            <?php
            echo $admission['admission_no'];
            ?><br>
            <h9>Date of Admission:</h9>
            <?php
            echo $admission['date_of_admission'];
            ?><br>
            <h9>Admit Card/Memo Number:</h9>
            <?php
            echo $admission['adcard_memo_no'];
            ?><br>
            <h9>Rank:</h9>
            <?php
            echo $admission['rank'];
            ?><br>
            <h9>Category of Admission:</h9>
            <?php
            echo $admission['category_admission'];
            ?><br>

        </div>
        <br>
    </div>
</div>