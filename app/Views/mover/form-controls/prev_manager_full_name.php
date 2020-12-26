
                    <div>
                        <label for            = "prev_manager_full_name">Previous Manager Full Name *</label>
                        <input id             = "prev_manager_full_name"
                               name           = "prev_manager_full_name"
                               type           = "text"
                               placeholder    = "Enter the previous manager's full name"
                               value          = "<?= $mover->prev_manager_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
