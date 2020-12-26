
                    <div>

                        <label>Applications</label>

                        <button type="button" onclick="selectAll('application[]')" class="margin-b-10">SELECT ALL</button>

                        <div id="application-div" class="border">
<?php
                            foreach($application as $app)
                            {
                                $id = "application-" . $app->id;
                                $check = in_array($app->id, $applicationMtm) ? ' checked' : '';
?>
                                <fieldset>
                                    <input type="checkbox" id="<?= $id; ?>" name="application[]" value="<?= $app->id; ?>" onclick="" <?= $check; ?>>
                                    <label for="<?= $id; ?>" id="<?= $id; ?>-label"><?= $app->application; ?></label>
                                </fieldset>
<?php
                            }
?>
                        </div>
                    </div>
