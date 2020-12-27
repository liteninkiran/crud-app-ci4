<?php
        $options =
        [
            '' => 'Select remote access option',
            '1' => 'Yes',
            '0' => 'No'
        ];

        $extra =
        [
            'id'          => 'remote_access',
            'required'    => 'required',
            'oninput'     => 'changeMe(this)',
            'onchange'    => 'changeText(this)',
            "onfocusin"   => "changeText(this, 'black')",
            "onfocusout"  => "changeText(this)"
        ];

?>

                    <div>
                        <?= form_label("Remote Access Required? *", 'remote_access'); ?>
                        <?= form_dropdown_2('remote_access', $options, $joiner->remote_access, $extra, ''); ?>
                    </div>

