
<?php
include 'sessioncheck.php';
include 'menu.php';
include 'db_connect.php';
?>

<?php



?>
<?php

if (isset($_POST['postbotton']) && !empty($_POST['post'])) {
    $postform = $_POST['post'];
    $username1 = $_SESSION['username'];
    $name1 = $_SESSION['fullname'];
    $queryinsert2 = "INSERT INTO `questiondata`( `username`, `name`, `question`) VALUES ('$username1','$name1','$postform')";
    if ($con->query($queryinsert2) === TRUE) {
        echo "Work successfully";
    } else {
        echo "Error:" . $con->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f7bd1b1106.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" />


    <title>Diu Connection</title>

</head>

<body>
    <section class="total">

        <div class="leftgap">

        </div>





        <div class="content">
            <div class="innercontent">
                <div class="innercontenttop">
                    <form action="main.php" method="POST">
                        <div class="innercontentheader">

                            <div class="profileimg">
                                <img style="width: 70%;" src="https://cdn-icons-png.flaticon.com/512/3048/3048122.png" alt="">
                            </div>
                            <h2 class="currentusername"><?php echo $_SESSION['username'] ?></h2>
                            <div class="postsendarea">
                                <input placeholder="Create a new Qustions" class="postform" type="text" name="post" value="">


                                <button name="postbotton" name="postsubmit" class="postbtn">
                                    <i id="sendicon" class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>


                <?php
                $selectquery = "SELECT * FROM `questiondata` ORDER BY id 
                DESC";
                $query = $con->query($selectquery);

                //   $num = mysqli_num_rows($query);

                // print_r($query);


                while ($res = $query->fetch_assoc()) {
                    //   echo $res['username'];


                ?>


                    <div class="postcontent" name="postcontent">
                        <div class="postcontentinner">
                            <div class="postcontentheader">
                                <img class="postcontentheaderimg" src="https://cdn-icons-png.flaticon.com/512/2922/2922506.png" alt="">
                                <h2 class="postcontentheaderusername"><?php echo $res['username'] ?></h2>
                            </div>


                            <!-- add edit and delete button only for own post -->
                            <?php
                            if ($_SESSION['username'] == $res['username']) {
                            ?>

                                <form class="modifyarea" action="question.php" method="GET">
                                    <a href="editmain.php?id=<?php echo $res['id'];
                                                                ?>" name="modify" class="modifybtn">
                                        <i id="edit" class="fa-solid fa-pen-to-square fa-2x"></i>
                                    </a>
                                    <a href='deletemain.php?id=<?php echo $res['id'];
                                                                ?>' name="delete" <?php
                                                                                    ?> class="modifybtn">
                                        <i id="delete" class="fa-solid fa-trash fa-2x"></i>
                                    </a>
                                </form>

                            <?php

                            }
                            ?>






                            <div class="countanswerview">
                                <p><b>Total Answer: <?php


                                                    $count_value_id = $res['id'];


                                                    $selectquery_count = "SELECT * FROM `answerdata` WHERE questionkey=$count_value_id  ORDER BY id DESC";
                                                    $query_count = mysqli_query($con, $selectquery_count);

                                                    $number_of_answer = mysqli_num_rows($query_count);



                                                    echo $number_of_answer; ?></b> </p>

                            </div>


                            <div class="qustioncontent">
                                <p><?php echo $res['question'] ?></p>
                            </div>
                            <div class="answerarea">
                                <!-- This Botton will submit the answer. -->
                                <a class="answerbtn" href="answerentry.php?id=<?php echo $res['id'] ?>"> <button class="answerbtn1" name="answerbtn">ANSWER</button></a>


                                <!-- This Botton will view other people answew. -->
                                <a class="answerbtn" href="view.php?id=<?php echo $res['id'] ?>">
                                    <button class="answerbtn1" name="viewbtn">VIEW</button>
                                </a>
                            </div>
                        </div>

                    </div>

                <?php


                }
                $con->close(); ?>






            </div>


        </div>





        <div class="rightgap">

        </div>


    </section>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
    </script>
</body>