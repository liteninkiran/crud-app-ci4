
                    <div id="contract_end_date_div">
                        <label for="contract_end_date">Contract End Date *</label>

                        <?php if($joiner): ?>

                            <input id             = "contract_end_date"
                                   name           = "contract_end_date"
                                   type           = "date"
                                   value          = "<?= $joiner->contract_end_date; ?>"
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
