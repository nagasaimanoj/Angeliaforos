<?php

$query = "select user from user_list order by user where not user='" . $_SESSION['user'] . "'";
echo $query;
echo $_SESSION['user'];
