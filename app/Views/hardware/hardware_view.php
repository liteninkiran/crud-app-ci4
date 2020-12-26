
            <div div class="row">

                <div class="column-3">
                    &nbsp;
                </div>

                <div class="column-3">
                    <h1>Hardware</h1>
                </div>

                <div class="column-3">
                    <form action="<?= site_url('hardware/create'); ?>" class="margin-t">
                        <input type="submit" value="ADD HARDWARE">
                    </form>
                </div>

            </div>

            <div>
<?php
                if($hardware)
                {
?>
                    <table id="object-list">
                        <thead>
                            <tr>
                                <th>Hardware</th>
                                <th class="tbl-col-100"></th>
                                <th class="tbl-col-100"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach($hardware as $hw)
                            {
                                $deleteUrl = site_url('hardware/delete/' . $hw->id);
                                $editUrl = site_url('hardware/edit/' . $hw->id);
                                $descr = $hw->hardware;
?>
                                <tr>
                                    <td><?php echo $hw->hardware; ?></td>
                                    <td><form action="<?= $editUrl; ?>"><input type="submit" value="EDIT"></form></td>
                                    <td><button onclick="confirmDelete('<?= $deleteUrl; ?>', '<?= $descr; ?>');">DELETE</button></td>
                                </tr>
<?php
                            }
?>
                    </tbody>
                </table>
<?php
            }
            else
            {
?>
                No Records To Display
<?php
            }
?>
            </div>

        </div>
 