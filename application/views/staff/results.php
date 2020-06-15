<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left">
    <h1>Results
        <?php if ($_SESSION['role'] == 'advisor') {
            echo '(' . $_SESSION['branch_in_charge'] . ',' . $_SESSION['batch_in_charge'] . ')';
        } else if ($_SESSION['role'] == 'hod') {
            echo '(' . $_SESSION['branch_in_charge'] . ')';
        }
        ?>
    </h1>
    <div class="dashbox">

        <div class="item-card">
            <h3>View Results</h3>
            <?php echo form_open_multipart('result'); ?>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <select name="semester" required>
                    <option value="">Select Semester:</option>
                    <option value="1">S1</option>
                    <option value="2">S2</option>
                    <option value="3">S3</option>
                    <option value="4">S4</option>
                    <option value="5">S5</option>
                    <option value="6">S6</option>
                    <option value="7">S7</option>
                    <option value="8">S8</option>
                </select><br>
                <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>

        <h3><a class="btn btn-primary" href="<?php echo base_url(); ?>result/result_upload">Upload Result</a></h3>

    </div>

</div>