<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Enter Student details</h2>
        <?php echo form_open_multipart('admin/student'); ?>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Username" required><br>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="password" required><br>
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" name="cpassword" placeholder="Confirm" required><br>
            </div>
        </div>
        <h3>Basics:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Admission number:</label>
                <input type="text" name="admissionno" required><br>
            </div>
            <div class="form-group">
                <label>Course:</label>
                <input type="text" name="course" required><br>
            </div>
            <div class="form-group">
                <label>Branch:</label>
                <input type="text" name="branch" required><br>
            </div>
            <div class="form-group">
                <label>Semester:</label>
                <input type="text" name="semester" required><br>
            </div>
            <div class="form-group">
                <label>Batch:</label>
                <input type="text" name="batch" required><br>
            </div>
            <div class="form-group">
                <label>Date of Joining:</label>
                <input type="date" name="date_of_joining" required><br>
            </div>
            <div class="form-group">
                <label>University Register Number:</label>
                <input type="text" name="univesity_reg_no" required><br>
            </div>
        </div>
        <h3>Personal:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required><br>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <input type="text" name="gender" required><br>
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <input type="date" name="dob" required><br>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone"><br>
            </div>
            <div class="form-group">
                <label>Mobile:</label>
                <input type="text" name="mobile" required><br>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" required><br>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required><br>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <input type="text" name="category" required><br>
            </div>
        </div>
        <h3>Family:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Name of Father/Mother:</label>
                <input type="text" name="name_of_fm" required><br>
            </div>
            <div class="form-group">
                <label>Occupation of Father/Mother:</label>
                <input type="text" name="occupation_of_fm" required><br>
            </div>
            <div class="form-group">
                <label>Address of Father/Mother:</label>
                <input type="text" name="address_of_fm" required><br>
            </div>
            <div class="form-group">
                <label>Phone of Father/Mother:</label>
                <input type="text" name="phone_of_fm" required><br>
            </div>
            <div class="form-group">
                <label>Email of Father/Mother:</label>
                <input type="email" name="email_of_fm"><br>
            </div>
            <div class="form-group">
                <label>Name of Local Guardian:</label>
                <input type="text" name="name_of_lg"><br>
            </div>
            <div class="form-group">
                <label>Relation with Local Guardian:</label>
                <input type="text" name="relation_with_lg"><br>
            </div>
            <div class="form-group">
                <label>Occupation of Local Guardian:</label>
                <input type="text" name="occupation_of_lg"><br>
            </div>
            <div class="form-group">
                <label>Address of Local Guardian:</label>
                <input type="text" name="address_of_lg"><br>
            </div>
            <div class="form-group">
                <label>Phone of Local Guardian:</label>
                <input type="text" name="phone_of_lg"><br>
            </div>
            <div class="form-group">
                <label>Email of Local Guardian:</label>
                <input type="email" name="email_of_lg"><br>
            </div>


        </div>
        <h3>Admission:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Date of Admission:</label>
                <input type="date" name="date_of_admission" required><br>
            </div>
            <div class="form-group">
                <label>Admint Card/Memo number:</label>
                <input type="text" name="adcard_memo_no" required><br>
            </div>
            <div class="form-group">
                <label>Rank:</label>
                <input type="number" name="rank" required><br>
            </div>
            <div class="form-group">
                <label>Admission Catagory:</label>
                <input type="text" name="catagory_admission" required><br>
            </div>
        </div>
        <h3>Hostel:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Hostel Name:</label>
                <input type="text" name="hostel_name"><br>
            </div>
            <div class="form-group">
                <label>Date of Admission:</label>
                <input type="date" name="date_of_hadmission"><br>
            </div>
        </div>
        <h3>Acadamic Entry Level:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Qualifying Exam:</label>
                <input type="text" name="qualifying_exam" required><br>
            </div>
            <div class="form-group">
                <label>Period of Study:</label>
                <input type="text" name="period_of_study" required><br>
            </div>
            <div class="form-group">
                <label>Name of Institution:</label>
                <input type="text" name="name_of_institution" required><br>
            </div>
            <div class="form-group">
                <label>Univercity/Board:</label>
                <input type="text" name="univercity_or_board" required><br>
            </div>
            <div class="form-group">
                <label>Total Marks Secured:</label>
                <input type="text" name="total_marks_secured" required><br>
            </div>
            <div class="form-group">
                <label>Maximum Mark:</label>
                <input type="text" name="max_mark" required><br>
            </div>
            <div class="form-group">
                <label>TC/CC number:</label>
                <input type="text" name="tc_or_cc_no" required><br>
            </div>
            <div class="form-group">
                <label>Date of TC/CC:</label>
                <input type="date" name="date_of_tc_or_cc" required><br>
            </div>
        </div>

        <span class="red-span">
            <?php if ($error_msg) {
                echo $error_msg . "<br>";
            } ?></span>

        <input type="submit" value="Submit" class="btn btn-primary" style="width:100%">
        </form><br>
    </div>
</div>