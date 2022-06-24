<?php

include('../includes/db.php');
session_start();
ob_start();

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_article WHERE article_id = '$id'";
    if ($conn->query($sql)) {
        echo 'success';
    } else {
        echo "<script>alert('Data not deleted'); </script>";
    }
}
