
                    <div>
                        <label>Employee Full Name *</label>
                        <input type           = "text"
                               name           = "employee_full_name"
                               placeholder    = "Enter the employee's full name"
                               value          = "<?= $mover->employee_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
