
<?php

        // Store link for form action
        $insertLink = site_url('mover/store');
        $updateLink = site_url('mover/update/') . $mover->id;

        // Store link for form action
        $actionLink = $mover->id ? $updateLink : $insertLink;

        $header = $mover->id ? 'Edit Mover' : 'Add New Mover';

?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="mover-tab">

                    <div>
                        <label>Requester Full Name *</label>
                        <input type           = "text"
                               name           = "req_full_name"
                               placeholder    = "Enter the requester's full name"
                               value          = "<?= $mover->req_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>

                </div>
 
                <div class="align-r">
                    <a href="<?= site_url('mover'); ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="submitForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

