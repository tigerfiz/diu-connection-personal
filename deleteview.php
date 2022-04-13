<?php
include'sessioncheck.php';
include 'db_connect.php';
$delete_value=$_GET['id'];
$question_table_value=$_GET['ids'];


$answer_delete="DELETE FROM `answerdata` WHERE id =$delete_value ";
$send_delete_quary_answer=$con->query($answer_delete);



header('Location:view.php?id='.$question_table_value);
?>