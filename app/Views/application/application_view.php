
            <div div class="row">

                <div class="column-3">
                    &nbsp;
                </div>

                <div class="column-3">
                    <h1>Applications</h1>
                </div>

                <div class="column-3">
                    <form action="<?= site_url('public/application/create'); ?>">
                        <input type="submit" value="ADD APPLICATION">
                    </form>
                </div>

            </div>

            <div>
<?php
                if($application)
                {
?>
                    <table id="application-list">
                        <thead>
                            <tr>
                                <th>Application</th>
                                <th>Application Owner</th>
                                <th>Email</th>
                                <th class="tbl-col-100"></th>
                                <th class="tbl-col-100"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            foreach($application as $app)
                            {
                                $deleteUrl = site_url('public/application/delete/' . $app->id);
                                $editUrl = site_url('public/application/edit/' . $app->id);
                                $descr = $app->application;
?>
                                <tr>
                                    <td><?php echo $app->application; ?></td>
                                    <td><?php echo $app->application_owner_name; ?></td>
                                    <td><?php echo $app->application_owner_email; ?></td>
                                    <td><a href="<?= $editUrl; ?>" id="edit-record">EDIT</a></td>
                                    <td><a href="javascript:;" onclick="confirmDelete('<?= $deleteUrl; ?>', '<?= $descr; ?>');" id="delete-record">DELETE</a></td>
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
<!-- 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function()
            {
                $('#application-list').DataTable(
                {
                    "pageLength": 100
                });
            });
        </script>
 -->
 