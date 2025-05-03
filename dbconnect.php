<?php
$conn = new mysqli("localhost", "root", "", "safesurf_smc");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
// else{
//     echo "Connection Successful";
// }
