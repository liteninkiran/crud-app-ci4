
<?php

        // Store link for form action
        $insertLink = site_url('mover/store');
        $updateLink = site_url('mover/update/') . $mover->id;

        // Store link for form action
        $actionLink = $mover->id ? $updateLink : $insertLink;

        $header = $mover->id ? 'Edit Mover' : 'Add New Mover';

        $cancelLink = $_SERVER['HTTP_REFERER'] == null ? site_url('home') : $_SERVER['HTTP_REFERER'];
?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="mover-tab">
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
                    include('form-controls/department_new_id.php');
                    include('form-controls/department_prev_id.php');
?>
                </div>
 
                <div class="align-r">
                    <a href="<?= $cancelLink; ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="submitForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

