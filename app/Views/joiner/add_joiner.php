
<?php

        // Store link for form action
        $insertLink = site_url('joiner/store');
        $updateLink = site_url('joiner/update/') . $joiner->id;

        // Store link for form action
        $actionLink = $joiner->id ? $updateLink : $insertLink;

        $header = $joiner->id ? 'Edit Joiner' : 'Add New Joiner';

        $cancelLink = $_SERVER['HTTP_REFERER'] == null ? site_url('home') : $_SERVER['HTTP_REFERER'];
?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="joiner-tab">
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
                    <h2>About the Join</h2>
<?php
                    include('form-controls/join_date.php');
                    include('form-controls/employment_type.php');
                    include('form-controls/contract_end_date.php');
                    include('form-controls/application.php');
                    include('form-controls/hardware.php');
                    include('form-controls/remote_access.php');
                    include('form-controls/usb_usage.php');
                    include('form-controls/usb_usage_reason.php');
                    include('form-controls/additional_requirements.php');
?>
                </div>
 
                <div class="align-r">
                    <a href="<?= $cancelLink; ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="submitForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

