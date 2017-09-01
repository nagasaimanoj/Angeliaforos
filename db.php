<?php
    switch ($_REQUEST['formname']) {
        case 'insertform':
            run("INSERT INTO `Angeliaforos`.`messages_table` (`sender`,`reciever`,`sentmessage`) VALUES('"
                . $_REQUEST['sender']
                . "','"
                . $_REQUEST['reciever']
                . "','"
                . $_REQUEST['sentmessage']
                . "');");
            header("location:index.php");
            break;
    }

    function run($query)
    {
        if (!mysqli_connect_errno($link = mysqli_connect('localhost', 'root', '', 'Angeliaforos'))) {
            mysqli_query($link, $query);
            mysqli_close($link);
        } else {
            die('Could not connect: ' . mysql_error());
        }
    }
?>