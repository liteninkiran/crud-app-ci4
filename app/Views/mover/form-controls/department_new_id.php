<?php
        $extra =
        [
            'id'       => 'department_new_id',
            'required' => 'required',
            'oninput'  => 'resetClass(this)'
        ];
?>

                    <div>
                        <?php echo form_label("Employee New Department *", 'department_new_id'); ?>
                        <?php echo form_dropdown_2('department_new_id', $departmentNew, $mover->department_new_id, $extra, ''); ?>
                    </div>
