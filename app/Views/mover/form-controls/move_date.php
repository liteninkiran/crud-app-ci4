
                    <div>
                        <label for="mode_date">Move Date *</label>

                        <?php if($mover): ?>

                            <input id             = "move_date"
                                   name           = "move_date"
                                   type           = "date"
                                   value          = "<?= $mover->move_date; ?>"
                                   oninput        = "changeMe(this)"
                                   required>

                        <?php else: ?>

                            <input id             = "move_date"
                                   name           = "move_date"
                                   type           = "text"
                                   placeholder    = "Enter the move date"
                                   onfocus        = "changeType(this, 'date')"
                                   oninput        = "changeMe(this)"
                                   required>

                        <?php endif; ?>

                    </div>
