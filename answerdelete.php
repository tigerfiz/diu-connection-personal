<?php
include'sessioncheck.php';
include 'db_connect.php';
$delete_value=$_GET['id'];
echo $delete_value;

$answer_delete="DELETE FROM `answerdata` WHERE id =$delete_value ";
$send_delete_quary_answer=$con->query($answer_delete);



header('Location:answer.php');
?>