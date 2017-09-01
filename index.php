<?php
session_start();
if ($_SESSION['user'] != "") {
    header("location:chat.php");
}
?>
<html>
    <head>
        <link rel='w3.css'/>
    </head>
    <body>
        <form action='db.php' method='post'>
            <input type='hidden' name='formname' value='login'/>
            <input type='text' name='uname' />
            <input type='password' name='upass' />
            <input type='submit' />
        </form>
    </body>
</html>