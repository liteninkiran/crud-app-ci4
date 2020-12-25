
                    <div>
                        <label>Employee Job Title *</label>
                        <input type           = "text"
                               name           = "employee_job_title"
                               placeholder    = "Enter the employee's job title"
                               value          = "<?= $mover->employee_job_title; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
