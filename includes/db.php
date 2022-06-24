<?php

$conn = new mysqli('localhost', 'root', '', 'hearmeout');

if($conn->connect_error){
    echo "<script>alert('database not connected');</script>";
}
