<?php

session_start();

switch ($_REQUEST['formname']) {
    case 'insertform':
        $result = run("INSERT INTO `Angeliaforos`.`messages_table` (`sender`,`reciever`,`sentmessage`) VALUES('"
                . $_REQUEST['sender']
                . "','"
                . $_REQUEST['reciever']
                . "','"
                . $_REQUEST['sentmessage']
                . "');");
        dispatch($result);
        break;

    case 'login':
        $query = "select password from `Angeliaforos`.`user_list` where user='" . $_REQUEST['uname'] . "'";
        $result = run($query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['password'] == $_REQUEST['upass']) {
                    $_SESSION["user"] = $_REQUEST['uname'];
                }
            }
            mysqli_close($link);
        } else {
            echo "no records";
        }
        dispatch(true);
        break;

    case 'logout':
        session_unset();
        session_destroy();
        dispatch(true);
        break;

    default:
        dispatch(true);
        break;
}

function run($query) {
    if (!mysqli_connect_errno($link = mysqli_connect('localhost', 'root', 'password', 'Angeliaforos'))) {
        $result = mysqli_query($link, $query);
        mysqli_close($link);
        return $result;
    } else {
        die('Could not connect: ' . mysql_error());
    }
}

function dispatch($isSuccess) {
    if ($isSuccess) {
        header("location:index.php");
    } else {
        die("some error happened ");
    }
}

?>