
                    <div>
                        <label for            = "manager_full_name">Manager Full Name *</label>
                        <input id             = "manager_full_name"
                               name           = "manager_full_name"
                               type           = "text"
                               placeholder    = "Enter the manager's full name"
                               value          = "<?= $joiner->manager_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
