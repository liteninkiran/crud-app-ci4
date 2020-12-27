
                    <div>
                        <label for            = "employee_job_title">Employee Job Title *</label>
                        <input id             = "employee_job_title"
                               name           = "employee_job_title"
                               type           = "text"
                               placeholder    = "Enter the employee's job title"
                               value          = "<?= $joiner->employee_job_title; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
