
            <div div class="row">

                <div class="column-3">
                    &nbsp;
                </div>

                <div class="column-3">
                    <h1>Joiners</h1>
                </div>

                <div class="column-3">
                    <form action="<?= site_url('joiner/create'); ?>" class="margin-t">
                        <input type="submit" value="ADD JOINER">
                    </form>
                </div>

            </div>

            <div>
<?php
                if($joiner)
                {
?>
                    <table id="object-list">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Join Date</th>
                                <th class="tbl-col-100"></th>
                                <th class="tbl-col-100"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach($joiner as $j)
                            {
                                $deleteUrl = site_url('joiner/delete/' . $j->id);
                                $editUrl = site_url('joiner/edit/' . $j->id);
                                $descr = $j->employee_full_name;
?>
                                <tr>
                                    <td><?= $j->employee_full_name; ?></td>
                                    <td><?= date('d/m/Y', strtotime($j->join_date)); ?></td>
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
 