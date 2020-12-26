
                    <div>
                        <label for            = "new_manager_full_name">New Manager Full Name *</label>
                        <input id             = "new_manager_full_name"
                               name           = "new_manager_full_name"
                               type           = "text"
                               placeholder    = "Enter the new manager's full name"
                               value          = "<?= $mover->new_manager_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
