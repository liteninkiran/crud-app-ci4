
                    <div>
                        <label for            = "employee_full_name">Employee Full Name *</label>
                        <input id             = "employee_full_name"
                               name           = "employee_full_name"
                               type           = "text"
                               placeholder    = "Enter the employee's full name"
                               value          = "<?= $leaver->employee_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
