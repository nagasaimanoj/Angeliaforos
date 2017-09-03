<?php
echo "<div class='w3-container' style='margin-top:35px'; padding-top:30px;><table width='100%'>";
        $conn = mysqli_connect('localhost', 'root', 'password', 'Angeliaforos') or die('could not connect to data-base');
        $query = "select * from user_list order by user";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td><a href=\"chat.php?reciever=".$row['user']."\">".$row['user']."</a></td></tr>";
            }
            echo "</table></div>";
        } else {
            echo "<h1>No Data in existing Records";
        }
        mysqli_close($conn);