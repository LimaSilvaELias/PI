<?php

session_id('session_token');

$data = serialize($_SESSION);
$query = "INSERT INTO sessions (session_id) VALUES ('" . session_id() . "')";
mysqli_query($conn, $query);


?>