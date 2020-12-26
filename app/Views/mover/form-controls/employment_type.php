<?php
        $options =
        [
            ''          => 'Select employment type',
            'Permanent' => 'Permanent',
            'Contract'  => 'Contract'
        ];

        $extra =
        [
            'id'       => 'employment_type',
            'required' => 'required',
            'oninput'  => 'changeMe(this)',
            'onchange' => "hideElement('contract_end_date', this, 'Contract')"
        ];

?>
                    <div>
                        <?php echo form_label("Employment Type *", 'employment_type'); ?>
                        <?php echo form_dropdown_2('employment_type', $options, $mover->employment_type, $extra, ''); ?>
                    </div>
