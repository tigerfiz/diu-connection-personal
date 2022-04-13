<?php
include'sessioncheck.php';
include 'db_connect.php';
include 'checker.php';

?>
<?php

$edit_value = $_GET['id'];
// echo $edit_value;

$select_quary = "SELECT * FROM `questiondata` WHERE id='$edit_value'";
$select_submit = $con->query($select_quary);
$select_result = $select_submit->fetch_assoc();
$select_result['question'];

if (isset($_POST['editsubmitbtn'])) {
    $update_value = $_GET['id'];
    $editform =  checker($_POST['editform']);
    $username = $select_result['username'];
    $sessionuser=$_SESSION['username'];
    $edit_quary = "INSERT INTO `answerdata`( `username`, `answer`, `questionkey`) VALUES ('$sessionuser','$editform','$update_value')";

    // echo $update_value;

    $edit_submit = $con->query($edit_quary);
    if ($edit_submit) {
        echo " NO error";
    } else {
        echo ("ERROR" . $con->error);
    }
    header('Location:main.php');
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="https://kit.fontawesome.com/f7bd1b1106.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/edit.css" />
    <title>Diu-Connection</title>
</head>

<body>
    <div class="total">

        <div class="innertotal">
            <div class="inner">
                <div class="title">
                    <h2><?php
                        print_r($select_result['username']);
                        ?></h2>
                </div>
                <form action="#" method="POST" class="editsection">
                    <label class="answerentryquestion" for=""><?php
                                                                print_r("<b>Question</b>: " . $select_result['question']);
                                                                ?></label>
                    <textarea name="editform" placeholder="Enter Your answer" id="textarea" cols="30" rows="10"></textarea>


                    <input name="editsubmitbtn" class="submitbtn" type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>
</body>

</html>
<?php

?>