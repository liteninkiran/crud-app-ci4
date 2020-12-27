<?php
        $options =
        [
            '' => 'Select USB access option',
            '1' => 'Yes',
            '0' => 'No'
        ];

        $extra =
        [
            'id'          => 'usb_usage',
            'required'    => 'required',
            'oninput'     => 'changeMe(this)',
            'onchange'    => "hideElement('usb_usage_reason', this, '1')",
            "onfocusin"   => "changeText(this, 'black')",
            "onfocusout"  => "changeText(this)"
        ];

?>

                    <div>
                        <?= form_label("USB Access Required? *", 'usb_usage'); ?>
                        <?= form_dropdown_2('usb_usage', $options, $joiner->usb_usage, $extra, ''); ?>
                    </div>

