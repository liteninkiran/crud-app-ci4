
            <div div class="row">

                <div class="column-3">
                    &nbsp;
                </div>

                <div class="column-3">
                    <h1>Departments</h1>
                </div>

                <div class="column-3">
                    <form action="<?= site_url('department/create'); ?>" class="margin-t">
                        <input type="submit" value="ADD DEPARTMENT">
                    </form>
                </div>

            </div>

            <div>
<?php
                if($department)
                {
?>
                    <table id="object-list">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th class="tbl-col-100"></th>
                                <th class="tbl-col-100"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach($department as $dept)
                            {
                                $deleteUrl = site_url('department/delete/' . $dept->id);
                                $editUrl = site_url('department/edit/' . $dept->id);
                                $descr = $dept->department;
?>
                                <tr>
                                    <td><?php echo $dept->department; ?></td>
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
 