
                    <div id="usb_usage_reason_div">
                        <label    for            = "usb_usage_reason">USB Access Reason *</label>
                        <textarea id             = "usb_usage_reason"
                                  name           = "usb_usage_reason"
                                  rows           = "1"
                                  placeholder    = "Enter the reason for USB access"
                                  oninput        = "changeMe(this)"><?= $mover->usb_usage_reason; ?></textarea>  
                    </div>
