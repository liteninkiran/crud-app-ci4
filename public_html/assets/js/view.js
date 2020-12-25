
    function confirmDelete($url, $descr = '')
    {
        var message;

        if($descr == '')
        {
            message = "Are you sure you want to delete the record?";
        }
        else
        {
            message = "Are you sure you want to delete the following record?\n\n" + $descr;
        }

        var sure = confirm(message);

        if(sure)
        {
            location.href = $url;
        }
    }
