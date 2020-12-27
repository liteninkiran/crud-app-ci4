<?php
        $options =
        [
            ''          => 'Select employment type',
            'Permanent' => 'Permanent',
            'Contract'  => 'Contract'
        ];

        $extra =
        [
            'id'          => 'employment_type',
            'required'    => 'required',
            'oninput'     => 'changeMe(this)',
            'onchange'    => "hideElement('contract_end_date', this, 'Contract')",
            "onfocusin"   => "changeText(this, 'black')",
            "onfocusout"  => "changeText(this)"
        ];

?>
                    <div>
                        <?php echo form_label("Employment Type *", 'employment_type'); ?>
                        <?php echo form_dropdown_2('employment_type', $options, $joiner->employment_type, $extra, ''); ?>
                    </div>
