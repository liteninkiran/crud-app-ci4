
<?php

        // Store link for form action
        $insertLink = site_url('department/store');
        $updateLink = site_url('department/update/') . $department->id;

        // Store link for form action
        $actionLink = $department->id ? $updateLink : $insertLink;

        $header = $department->id ? 'Edit Department' : 'Add New Department';

?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="department-tab">

                    <div>
                        <label>Department *</label>
                        <input type           = "text"
                               name           = "department"
                               placeholder    = "Enter the department name"
                               value          = "<?= $department->department; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>

                </div>
 
                <div class="align-r">
                    <a href="<?= site_url('department'); ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="submitForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

