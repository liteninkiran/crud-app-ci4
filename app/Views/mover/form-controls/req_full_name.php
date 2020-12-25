
                    <div>
                        <label>Requester Full Name *</label>
                        <input type           = "text"
                               name           = "req_full_name"
                               placeholder    = "Enter the requester's full name"
                               value          = "<?= $mover->req_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
