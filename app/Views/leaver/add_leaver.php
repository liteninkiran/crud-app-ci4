
<?php

        // Store link for form action
        $insertLink = site_url('leaver/store');
        $updateLink = site_url('leaver/update/') . $leaver->id;

        // Store link for form action
        $actionLink = $leaver->id ? $updateLink : $insertLink;

        $header = $leaver->id ? 'Edit Leaver' : 'Add New Leaver';

        $cancelLink = $_SERVER['HTTP_REFERER'] == null ? site_url('home') : $_SERVER['HTTP_REFERER'];
?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="leaver-tab">
                    <h2>About the Requester</h2>
<?php
                    include('form-controls/req_full_name.php');
                    include('form-controls/req_email.php');
?>
                    <h2>About the Employee</h2>
<?php
                    include('form-controls/employee_full_name.php');
                    include('form-controls/employee_staff_num.php');
                    include('form-controls/employee_job_title.php');
                    include('form-controls/department_id.php');
                    include('form-controls/manager_full_name.php');
?>
                    <h2>About the Leave</h2>
<?php
                    include('form-controls/leave_date.php');
                    include('form-controls/hardware.php');
                    include('form-controls/additional_requirements.php');
?>
                </div>
 
                <div class="align-r">
                    <a href="<?= $cancelLink; ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="submitForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

