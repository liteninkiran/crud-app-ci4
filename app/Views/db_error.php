<?php

    if($errors)
    {
?>
        <h1>Errors</h1>
        <p>There appears to a problem with your request. Please see below for more detailed information.</p>
        <table>
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach($errors as $field => $message)
                {
?>
                    <tr>
                        <td><?= $field; ?></td>
                        <td><?= $message; ?></td>
                    </tr>
<?php
                }
?>
            </tbody>
        </table>


        <h1>Form Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach($formData as $field => $value)
                {
?>
                    <tr>
                        <td><?= $field; ?></td>
                        <td><?= $value; ?></td>
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
        echo "No errors to display";
    }


?>
