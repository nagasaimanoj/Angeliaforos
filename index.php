<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location:chat.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class='w3-card'>
            <form action='db.php' method='post'>
                <table border='1'>
                    <input type='hidden' name='formname' value='login'/>
                    <tr>
                        <td>
                            <input type='text' name='uname' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='password' name='upass' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='submit' style='width:100%' />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>