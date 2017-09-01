<html>
<body>
    <table align='center'>
        <tr>
            <td>
                <form action='dp.php'>
                    <input type='hidden' name='formname' value='insertform' />
                    <table align='center' border=1>
                        <tr>
                            <td>
                                <select name='sender' style='width:100%' required>
                                <option>from</option>
                                <option value='manoj'>manoj</option>
                                <option value='kumar'>kumar</option>
                                <option value='saheb'>saheb</option>
                                <option value='praveen'>praveen</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name='reciever' style='width:100%' required>
                                <option>to</option>
                                <option value='manoj'>manoj</option>
                                <option value='kumar'>kumar</option>
                                <option value='saheb'>saheb</option>
                                <option value='praveen'>praveen</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea rows="10" name='sentmessage' style='width:100%' name='message' placeholder='enter your message here' name='sentmessage'
                                    required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type='submit' value='send' style='width:100%; color:green;' />
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
            <td>
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'Angeliaforos') or die('could not connect to data-base');
                    $query = "select * from messages_table order by senttime";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table align='center' border=1>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Message</th>
                            <th>Time</th>
                        </tr>
                    ";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>" . $row['sender'] . "</td>
                            <td>" . $row['reciever'] . "</td>
                            <td>" . $row['sentmessage'] . "</td>
                            <td>" . $row['senttime'] . "</td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h3 align='center'>No Data in existing Records</h3></div>";
                    }
                    mysqli_close($conn);
                ?>
            </td>
        </tr>
    </table>
</body>