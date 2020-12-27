
                    <div>
                        <label for="mode_date">Join Date *</label>

                        <?php if($joiner): ?>

                            <input id             = "join_date"
                                   name           = "join_date"
                                   type           = "date"
                                   value          = "<?= $joiner->join_date; ?>"
                                   oninput        = "changeMe(this)"
                                   required>

                        <?php else: ?>

                            <input id             = "join_date"
                                   name           = "join_date"
                                   type           = "text"
                                   placeholder    = "Enter the join date"
                                   onfocus        = "changeType(this, 'date')"
                                   oninput        = "changeMe(this)"
                                   required>

                        <?php endif; ?>

                    </div>
