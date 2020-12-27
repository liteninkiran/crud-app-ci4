
                    <div>
                        <label fpr            = "employee_staff_num">Employee Staff Number *</label>
                        <input id             = "employee_staff_num"
                               name           = "employee_staff_num"
                               type           = "text"
                               placeholder    = "Enter the employee's staff number"
                               value          = "<?= $joiner->employee_staff_num; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
