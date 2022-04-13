<?php
include'sessioncheck.php';
include 'db_connect.php';
$delete_value=$_GET['id'];
echo $delete_value;

$detete_quary="DELETE FROM `questiondata` WHERE `questiondata`.`id` ='$delete_value'";
$send_delete_quary=$con->query($detete_quary);




$answer_delete="DELETE FROM `answerdata` WHERE questionkey =$delete_value ";
$send_delete_quary_answer=$con->query($answer_delete);



header('Location:question.php');
