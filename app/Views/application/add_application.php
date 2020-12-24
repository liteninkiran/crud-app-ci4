
<?php

        // Store link for form action
        $insertLink = site_url('public/application/store');
        $updateLink = site_url('public/application/update/') . $application->id;

        // Store link for form action
        $actionLink = $application->id ? $updateLink : $insertLink;

        $header = $application->id ? 'Edit Application' : 'Add New Application';

?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="application-tab">

                    <div>
                        <label>Application *</label>
                        <input type           = "text"
                               name           = "application"
                               placeholder    = "Enter the application name"
                               value          = "<?= $application->application; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>

                    <div>
                        <label>Application Owner Name *</label>
                        <input type        = "text"
                               name        = "application-owner-name"
                               placeholder = "Enter the application owner name"
                               value       = "<?= $application->application_owner_name; ?>"
                               oninput     = "changeMe(this)"
                               required>
                    </div>

                    <div>
                        <label>Application Owner Email *</label>
                        <input type        = "email"
                               name        = "application-owner-email"
                               placeholder = "Enter the application owner email"
                               value       = "<?= $application->application_owner_email; ?>"
                               oninput     = "changeMe(this)"
                               required>
                    </div>

                </div>

                <div class="align-r">
                    <a href="<?= site_url('public/application'); ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="validateForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

