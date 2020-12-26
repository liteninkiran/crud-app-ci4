
                    <div>

                        <label>Hardware</label>

                        <button type="button" onclick="selectAll('hardware[]')" class="margin-b-10">SELECT ALL</button>

                        <div id="hardware-div" class="border">
<?php
                            foreach($hardware as $hw)
                            {
                                $id = "hardware-" . $hw->id;
                                $check = in_array($hw->id, $hardwareMtm) ? ' checked' : '';
?>
                                <fieldset>
                                    <input type="checkbox" id="<?= $id; ?>" name="hardware[]" value="<?= $hw->id; ?>" onclick="" <?= $check; ?>>
                                    <label for="<?= $id; ?>" id="<?= $id; ?>-label"><?= $hw->hardware; ?></label>
                                </fieldset>
<?php
                            }
?>
                        </div>
                    </div>
