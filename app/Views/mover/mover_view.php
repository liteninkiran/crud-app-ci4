
            <div div class="row">

                <div class="column-3">
                    &nbsp;
                </div>

                <div class="column-3">
                    <h1>Movers</h1>
                </div>

                <div class="column-3">
                    <form action="<?= site_url('mover/create'); ?>" class="margin-t">
                        <input type="submit" value="ADD MOVER">
                    </form>
                </div>

            </div>

            <div>
<?php
                if($mover)
                {
?>
                    <table id="object-list">
                        <thead>
                            <tr>
                                <th>Mover</th>
                                <th class="tbl-col-100"></th>
                                <th class="tbl-col-100"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach($mover as $m)
                            {
                                $deleteUrl = site_url('mover/delete/' . $m->id);
                                $editUrl = site_url('mover/edit/' . $m->id);
                                $descr = $m->mover_full_name;
?>
                                <tr>
                                    <td><?php echo $m->mover_full_name; ?></td>
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
 