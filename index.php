<html>
<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>

<body>
    <div style='position:fixed; z-index:15; left:0; right:0; top:0;'>
        <form action='db.php'>
            <input type='hidden' name='formname' value='insertform' />
            <input type='hidden' name='sender' value='manoj' />
            <table align='center' style='width:100%;' class='w3-card'>
                <tr>
                    <td>
                        <select name='reciever' style='width:100%' class='w3-input w3-round-large w3-text-white w3-light-green' required>
                            <?php
                                $conn = mysqli_connect('localhost', 'root', '', 'Angeliaforos') or die('could not connect to data-base');
                                $query = "select user from user_list order by user;";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option class='w3-text-white' value='".$row['user']."'>".$row['user']."</option>";
                                    }
                                }else{
                                    echo "<option>records empty</option>";
                                }
                            ?>
                            </select>
                    </td>
                    <td>
                        <input type='text' name='sentmessage' style='width:100%;' class='w3-input w3-round-large w3-text-white w3-light-green' name='message'
                            placeholder='enter your message here' name='sentmessage' required/>
                    </td>
                    <td>
                        <input type='submit' value='send' style='color:green; width:100%' class='w3-input w3-round-large w3-text-white w3-light-green'
                        />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'Angeliaforos') or die('could not connect to data-base');
    $query = "select * from messages_table order by senttime desc";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='w3-container' style='margin-top:35px'; padding-top:30px;><table width='100%'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            if ($row['reciever'] == "mohana priya")
                echo "<td><div align='right'><p class='w3-btn w3-round-xxlarge w3-text-grey w3-light-grey'><span class='w3-btn w3-round-xxlarge w3-text-white w3-cyan'>" . $row['sentmessage'] . "</span><span class='w3-btn w3-round w3-opacity'><sub>You</sub></span></p></div></td></tr>";
            else
                echo "<td><div align='left'><p class='w3-btn w3-round-xxlarge w3-text-grey w3-light-grey'><span class='w3-btn w3-round w3-opacity'><sub>".$row['reciever']."</sub></span><span class='w3-btn w3-round-xxlarge w3-text-white w3-grey'>" . $row['sentmessage'] . "</span></p></div></td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "<div class='w3-container' style='margin-top:35px'; padding-top:30px;><table width='100%'><h3 align='center'>No Data in existing Records</h3></div>";
    }
    mysqli_close($conn);
?>