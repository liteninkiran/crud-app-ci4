
                    <div id="contract_end_date_div">
                        <label for="contract_end_date">Contract End Date *</label>

                        <?php if($mover): ?>

                            <input id             = "contract_end_date"
                                   name           = "contract_end_date"
                                   type           = "date"
                                   value          = "<?= $mover->contract_end_date; ?>"
                                   oninput        = "changeMe(this)">

                        <?php else: ?>

                            <input id             = "contract_end_date"
                                   name           = "contract_end_date"
                                   type           = "text"
                                   placeholder    = "Enter the contract end date"
                                   onfocus        = "changeType(this, 'date')"
                                   oninput        = "changeMe(this)">

                        <?php endif; ?>

                    </div>
