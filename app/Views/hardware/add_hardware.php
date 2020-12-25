
<?php

        // Store link for form action
        $insertLink = site_url('hardware/store');
        $updateLink = site_url('hardware/update/') . $hardware->id;

        // Store link for form action
        $actionLink = $hardware->id ? $updateLink : $insertLink;

        $header = $hardware->id ? 'Edit Hardware' : 'Add New Hardware';

        $cancelLink = $_SERVER['HTTP_REFERER'] == null ? site_url('home') : $_SERVER['HTTP_REFERER'];
?>

        <div>

            <h1><?= $header; ?></h1>

            <form method="post" id="jmlForm" action="<?= $actionLink; ?>">

                <div class="jml-tab" id="hardware-tab">

                    <div>
                        <label>Hardware *</label>
                        <input type           = "text"
                               name           = "hardware"
                               placeholder    = "Enter the hardware name"
                               value          = "<?= $hardware->hardware; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>

                </div>
 
                <div class="align-r">
                    <a href="<?= $cancelLink; ?>"><button type="button" id="jml-cancel" class="margin-r">CANCEL</button></a>
                    <button type="button" id="jml-submit" onclick="submitForm(this.parentElement.parentElement.id)" class="margin-t">SUBMIT</button>
                </div>

            </form>

        </div>

