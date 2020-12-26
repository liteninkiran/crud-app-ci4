
            <div div class="row">

                <div class="column-3">
                    &nbsp;
                </div>

                <div class="column-3">
                    <h1>Leavers</h1>
                </div>

                <div class="column-3">
                    <form action="<?= site_url('leaver/create'); ?>" class="margin-t">
                        <input type="submit" value="ADD LEAVER">
                    </form>
                </div>

            </div>

            <div>
<?php
                if($leaver)
                {
?>
                    <table id="object-list">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Leave Date</th>
                                <th class="tbl-col-100"></th>
                                <th class="tbl-col-100"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach($leaver as $l)
                            {
                                $deleteUrl = site_url('leaver/delete/' . $l->id);
                                $editUrl = site_url('leaver/edit/' . $l->id);
                                $descr = $l->employee_full_name;
?>
                                <tr>
                                    <td><?= $l->employee_full_name; ?></td>
                                    <td><?= date('d/m/Y', strtotime($l->leave_date)); ?></td>
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
 