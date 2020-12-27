<?php
        $extra =
        [
            "id"          => "department_id",
            "required"    => "required",
            "oninput"     => "changeMe(this)",
            "onchange"    => "changeText(this)",
            "onfocusin"   => "changeText(this, 'black')",
            "onfocusout"  => "changeText(this)"
        ];
?>

                    <div>
                        <?php echo form_label("Employee Department *", 'department_id'); ?>
                        <?php echo form_dropdown_2('department_id', $department, $joiner->department_id, $extra, ''); ?>
                    </div>
