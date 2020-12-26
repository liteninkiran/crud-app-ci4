
                    <div>
                        <label for            = "req_full_name">Requester Full Name *</label>
                        <input id             = "req_full_name"
                               type           = "text"
                               name           = "req_full_name"
                               placeholder    = "Enter the requester's full name"
                               value          = "<?= $mover->req_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
