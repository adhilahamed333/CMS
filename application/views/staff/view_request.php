<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="login col-sm-10" style="float:left;overflow-y:auto;height:100%;">
    <h2 style="align-items: center">GOVERNMENT ENGINEERING COLLEGE IDUKKI</h2>
    <h5 style="align-items: center">APPLICATION FOR RECOMMENDATION/ATTESTATION/CERTIFICATES/RETURN OF TESTIMONIALS/REFUND PF FEES</h5>
    <div>
        <table border="1">
            <tr>
                <th colspan="2">Request ID</th>
                <td colspan="6"><?= $request->request_id; ?></td>
            </tr>
            <tr>
                <th>1</th>
                <th>Name of applicant</th>
                <td colspan="6"> <?= $request->name; ?> </td>
            </tr>
            <tr>
                <th>2</th>
                <th>Course/programme & branch</th>
                <td colspan="2"> <?= $request->course; ?></td>
                <td colspan="4"> <?= $request->branch; ?></td>
            </tr>
            <tr>
                <th rowspan="4">3</th>
                <th rowspan="3">Details of admission to college and hostel</th>
                <td colspan="2">College Admission</td>
                <td rowspan="2">Univercity Registraion no</td>
                <td rowspan="2">Current Semester</td>
                <td colspan="2">Hostel</td>
            </tr>
            <tr>
                <td>No</td>
                <td>Date</td>
                <td>Name</td>
                <td>Date of admission</td>
            </tr>
            <tr>
                <td> <?= $request->admission_no; ?></td>
                <td> <?= $request->date_of_joining; ?></td>
                <td> <?= $request->univercity_reg_no; ?> </td>
                <td>S<?= $request->semester; ?></td>
                <td> <?= $request->hostel_name; ?></td>
                <td> <?= $request->date_of_admission; ?></td>
            </tr>
            <tr>
                <th>TC No. & Date</th>
                <td colspan="2"> <?= $request->tc_no; ?></td>
                <td colspan="6">
                    <?php if (!$request->tc_issue_date == '0000-00-00') {
                        echo $request->tc_issue_date;
                    } ?></td>
            </tr>
            <tr>
                <th>4</th>
                <th>Certification/Services requested</th>
                <td colspan="6"> <?php echo $request->section . ")" . $request->type; ?></td>
            </tr>
            <tr>
                <th>5</th>
                <th>Applicant's Undertaking</th>
                <td colspan="6">ALL</td>
            </tr>
            <tr>
                <th rowspan="4">6</th>
                <th rowspan="4">Contact address and signatures of applicant with date</th>
                <td colspan="2">Applicant's Contact Address</td>
                <td colspan="4">Appicant's dated signature on</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2"><?= $request->address; ?></td>
                <td colspan="2">Submission of request</td>
                <td colspan="2">Receipt of items</td>
            </tr>
            <tr>

                <td colspan="2">Signed by <?= $request->name; ?></td>
                <td colspan="2">Signed by <?= $request->name; ?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?= $request->mobile; ?></td>
                <td>Date:</td>
                <td><?= $request->submit_date; ?></td>
                <td>Date:</td>
                <td><?= $request->receipt_date; ?></td>
            </tr>
            <tr>
                <th>7</th>
                <th>Specific remarks of Tutor/Warden</th>
                <td colspan="6"><?= $request->a_remarks; ?></td>
            </tr>
            <tr>
                <th>8</th>
                <th>Dated signature of Tutor/Warden</th>
                <td colspan="2">Signed by <?= $request->advisor_id; ?></td>
                <td>Date</td>
                <td colspan="3"><?= $request->a_date; ?></td>
            </tr>
            <tr>
                <th rowspan="2">9</th>
                <th>Specific remarks of HOD</th>
                <td colspan="6"><?= $request->h_remarks; ?></td>
            </tr>
            <tr>
                <th>Dated signature of HOD</th>
                <td colspan="2">Signed by <?= $request->hod_id; ?></td>
                <td>Date</td>
                <td colspan="3"><?= $request->h_date; ?></td>
            </tr>
            <tr>
                <th colspan="2">Remarks & Dated signature of Principal</th>
                <td colspan="2"><?= $request->p_remarks; ?></td>
                <td colspan="1">Signed by <?= $request->principal_id; ?></td>
                <td>Date</td>
                <td colspan="2"><?= $request->p_date; ?></td>
            </tr>
            <tr>
                <th colspan="2" rowspan="3">Remarks, Initials & Date</th>
                <td colspan="2">Offie section</td>
                <td colspan="4">AA</td>
            </tr>
            <tr>
                <td colspan="5"><?= $request->o_remarks; ?><br></td>
                <td>Signed by <?= $request->office_id; ?></td>
            </tr>
            <tr>
                <td colspan="1">Date of issue</td>
                <td colspan="2"><?= $request->issue_date; ?></td>
                <td colspan="2">Date of Return</td>
                <td colspan="2"><?= $request->return_date; ?></td>
            </tr>
        </table>

    </div>