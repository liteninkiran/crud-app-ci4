
                    <div>
                        <label for="mode_date">Leave Date *</label>

                        <?php if($leaver): ?>

                            <input id             = "leave_date"
                                   name           = "leave_date"
                                   type           = "date"
                                   value          = "<?= $leaver->leave_date; ?>"
                                   oninput        = "changeMe(this)"
                                   required>

                        <?php else: ?>

                            <input id             = "leave_date"
                                   name           = "leave_date"
                                   type           = "text"
                                   placeholder    = "Enter the leave date"
                                   onfocus        = "changeType(this, 'date')"
                                   oninput        = "changeMe(this)"
                                   required>

                        <?php endif; ?>

                    </div>
