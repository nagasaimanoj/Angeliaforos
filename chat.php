<?php
session_start();
if (!$_SESSION['user']) {
    header("location:index.php");
}
if(!isset($_REQUEST['reciever'])){
    header("location:friends.php");
}

echo "
<html>
    <head>
        <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'/>
    </head>

    <body>
        <div style='position:fixed; z-index:15; left:0; right:0; top:0;'>
            <form action='db.php' method='post'>
                <input type='hidden' name='formname' value='sendmessage' />
                <input type='hidden' name='reciever' value='".$_REQUEST['reciever']."' />
                <input type='hidden' name='sender' value='".$_SESSION['user']."'/>
                <table align='center' style='width:100%;' class='w3-card'>
                    <tr>
                        <td>
                            <a class='w3-input w3-round-large w3-text-white w3-light-green' href='db.php?formname=logout'>logout</a>
                        </td>
                        <td style='width:100%'>
                            <input type='text' name='sentmessage' style='width:100%;' class='w3-input w3-round-large w3-text-white w3-light-green' name='message'
                                   placeholder='enter your message here' name='sentmessage' required autofocus autocomplete='off'/>
                        </td>
                        <td>
                            <input type='submit' value='send' style='width:100%' class='w3-input w3-round-large w3-text-white w3-light-green'/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>";

        echo "<div class='w3-container' style='margin-top:35px'; padding-top:30px;><table width='100%'>";
        $conn = mysqli_connect('localhost', 'root', 'password', 'Angeliaforos') or die('could not connect to data-base');
        $query = "select * from messages_table where (reciever='".$_REQUEST['reciever']."' and sender='".$_SESSION['user']."') or (sender='".$_REQUEST['reciever']."' and reciever='".$_SESSION['user']."') order by senttime desc";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                if ($row['sender'] == $_SESSION['user']) {
                    echo "<td><div align='right'><p class='w3-btn w3-round-xxlarge w3-text-grey w3-light-grey'><span class='w3-btn w3-round-xxlarge w3-text-white w3-cyan'>" . $row['sentmessage'] . "</span><span class='w3-btn w3-round w3-opacity'><sub>You</sub></span></p></div></td></tr>";
                } else {
                    echo "<td><div align='left'><p class='w3-btn w3-round-xxlarge w3-text-grey w3-light-grey'><span class='w3-btn w3-round w3-opacity'><sub>" . $row['sender'] . "</sub></span><span class='w3-btn w3-round-xxlarge w3-text-white w3-grey'>" . htmlspecialchars($row['sentmessage']) . "</span></p></div></td></tr>";
                }
            }
            echo "</table></div>";
        } else {
            echo "<h1>No Data in existing Records";
        }
        mysqli_close($conn);
        ?>