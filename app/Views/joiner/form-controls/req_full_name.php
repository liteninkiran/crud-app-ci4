
                    <div>
                        <label for            = "req_full_name">Requester Full Name *</label>
                        <input id             = "req_full_name"
                               name           = "req_full_name"
                               type           = "text"
                               placeholder    = "Enter the requester's full name"
                               value          = "<?= $joiner->req_full_name; ?>"
                               oninput        = "changeMe(this)"
                               required>
                    </div>
