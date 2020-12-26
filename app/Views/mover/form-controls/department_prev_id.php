<?php
        $extra =
        [
            'id'       => 'department_prev_id',
            'required' => 'required',
            "oninput"     => "changeMe(this)",
            "onchange"    => "changeText(this)",
            "onfocusin"   => "changeText(this, 'black')",
            "onfocusout"  => "changeText(this)"
        ];
?>

                    <div>
                        <?php echo form_label("Employee Previous Department *", 'department_prev_id'); ?>
                        <?php echo form_dropdown_2('department_prev_id', $departmentPre, $mover->department_prev_id, $extra, ''); ?>
                    </div>
