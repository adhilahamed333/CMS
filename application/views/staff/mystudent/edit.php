<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-10 text-left" style="float:left;overflow-y:auto;height:100%;">
    <div class="dashbox">
        <h2>Edit Profile</h2>
        <?php echo form_open_multipart('staff/edit'); ?>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $basics['username']; ?>" readonly><br>
            </div>
        </div>
        <h3>Basics:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Admission number:</label>
                <input type="text" name="admissionno" value="<?php echo $basics['admission_no']; ?>" readonly><br>
            </div>
            <div class="form-group">
                <label>Course:</label>
                <input type="text" name="course" value="<?php echo $basics['course']; ?>" readonly><br>
            </div>
            <div class="form-group">
                <label>Branch:</label>
                <input type="text" name="branch" value="<?php echo $basics['branch']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Semester:</label>
                <input type="text" name="semester" value="<?php echo $basics['semester']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Date of Joining:</label>
                <input type="date" name="date_of_joining" value="<?php echo $basics['date_of_joining']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Date of Leaving:</label>
                <input type="date" name="date_of_leaving" value="<?php echo $basics['date_of_leaving']; ?>"><br>
            </div>
            <div class="form-group">
                <label>University Register Number:</label>
                <input type="text" name="univesity_reg_no" value="<?php echo $basics['university_reg_no']; ?>" required><br>
            </div>
        </div>
        <h3>Personal:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $personal['name']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <input type="text" name="gender" value="<?php echo $personal['gender']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <input type="date" name="dob" value="<?php echo $personal['dob']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" value="<?php echo $personal['phone']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Mobile:</label>
                <input type="text" name="mobile" value="<?php echo $personal['mobile']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo $personal['address']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $personal['email']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <input type="text" name="category" value="<?php echo $personal['category']; ?>" required><br>
            </div>
        </div>
        <h3>Family:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Name of Father/Mother:</label>
                <input type="text" name="name_of_fm" value="<?php echo $family['name_of_fm']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Occupation of Father/Mother:</label>
                <input type="text" name="occupation_of_fm" value="<?php echo $family['occupation_of_fm']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Address of Father/Mother:</label>
                <input type="text" name="address_of_fm" value="<?php echo $family['address_of_fm']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Phone of Father/Mother:</label>
                <input type="text" name="phone_of_fm" value="<?php echo $family['phone_of_fm']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Email of Father/Mother:</label>
                <input type="email" name="email_of_fm" value="<?php echo $family['email_of_fm']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Name of Local Guardian:</label>
                <input type="text" name="name_of_lg" value="<?php echo $family['name_of_lg']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Relation with Local Guardian:</label>
                <input type="text" name="relation_with_lg" value="<?php echo $family['relation_with_lg']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Occupation of Local Guardian:</label>
                <input type="text" name="occupation_of_lg" value="<?php echo $family['occupation_of_lg']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Address of Local Guardian:</label>
                <input type="text" name="address_of_lg" value="<?php echo $family['address_of_lg']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Phone of Local Guardian:</label>
                <input type="text" name="phone_of_lg" value="<?php echo $family['phone_of_lg']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Email of Local Guardian:</label>
                <input type="email" name="email_of_lg" value="<?php echo $family['email_of_lg']; ?>"><br>
            </div>


        </div>
        <h3>Admission:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Date of Admission:</label>
                <input type="date" name="date_of_admission" value="<?php echo $admission['date_of_admission']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Admint Card/Memo number:</label>
                <input type="text" name="adcard_memo_no" value="<?php echo $admission['adcard_memo_no']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Rank:</label>
                <input type="number" name="rank" value="<?php echo $admission['rank']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Admission Catagory:</label>
                <input type="text" name="catagory_admission" value="<?php echo $admission['category_admission']; ?>" required><br>
            </div>
        </div>
        <h3>Hostel:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Hostel Name:</label>
                <input type="text" name="hostel_name" value="<?php echo $hostel['hostel_name']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Date of Admission:</label>
                <input type="date" name="date_of_hadmission" value="<?php echo $hostel['date_of_admission']; ?>"><br>
            </div>
        </div>
        <h3>Acadamic Entry Level:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>Qualifying Exam:</label>
                <input type="text" name="qualifying_exam" value="<?php echo $acadentry['qualifying_exam']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Period of Study:</label>
                <input type="text" name="period_of_study" value="<?php echo $acadentry['period_of_study']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Name of Institution:</label>
                <input type="text" name="name_of_institution" value="<?php echo $acadentry['name_of_institution']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Univercity/Board:</label>
                <input type="text" name="univercity_or_board" value="<?php echo $acadentry['university_or_board']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Total Marks Secured:</label>
                <input type="text" name="total_marks_secured" value="<?php echo $acadentry['total_marks_secured']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Maximum Mark:</label>
                <input type="text" name="max_mark" value="<?php echo $acadentry['max_mark']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>TC/CC number:</label>
                <input type="text" name="tc_or_cc_no" value="<?php echo $acadentry['tc_or_cc_no']; ?>" required><br>
            </div>
            <div class="form-group">
                <label>Date of TC/CC:</label>
                <input type="date" name="date_of_tc_or_cc" value="<?php echo $acadentry['date_of_tc_or_cc']; ?>" required><br>
            </div>
        </div>
        <h3>Acadamic Exit Level:</h3>
        <div class="item-card"><br>
            <div class="form-group">
                <label>CGPA:</label>
                <input type="text" name="cgpa" value="<?php echo $acadexit['cgpa']; ?>" readonly><br>
            </div>
            <div class="form-group">
                <label>Year of Graduation:</label>
                <input type="text" name="year_of_graduation" value="<?php echo $acadexit['year_of_graduation']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Contuct and Charactor:</label>
                <input type="text" name="conduct_and_chara" value="<?php echo $acadexit['conduct_and_chara']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Rank in Class:</label>
                <input type="text" name="rank_in_class" value="<?php echo $acadexit['rank_in_class']; ?>"><br>
            </div>
            <div class="form-group">
                <label>Remarks:</label>
                <input type="text" name="remarks" value="<?php echo $acadexit['remarks']; ?>"><br>
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