<?php

$conn = mysqli_connect('localhost', 'root', '', 'Angeliaforos') or die('could not connect to data-base');
$query = "select * from messages_table order by senttime";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    echo "<table border=1>
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