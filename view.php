<?php
include'sessioncheck.php';
include 'menu.php';
include 'db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f7bd1b1106.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" />


    <title>DIU CONNECTION</title>

</head>

<body>
    <section class="total">

        <div class="leftgap">

        </div>





        <div class="content">
            <div class="innercontent">
                <div class="innercontenttop">


                    <div class="postsendarea">
                        <h1 style="color: white; font-size:2rem;">VIEW</h1>
                    </div>

                </div>

            </div>


            <?php
            $id_value = $_GET['id'];
            $selectquery = "SELECT * FROM `answerdata` WHERE questionkey=$id_value ORDER BY id DESC";
            $query = mysqli_query($con, $selectquery);

            $number_of_answer = mysqli_num_rows($query);


            while ($res = mysqli_fetch_array($query)) {
                //   echo $res['username'];

            ?>


                <div class="postcontent" name="postcontent">
                    <div class="postcontentinner">
                        <div class="postcontentheader">
                            <img class="postcontentheaderimg" src="https://cdn-icons-png.flaticon.com/512/2922/2922506.png" alt="">
                            <h2 class="postcontentheaderusername"><?php echo $res['username'] ?></h2>
                        </div>
                        <!-- <div class="countanswerview">
                            <p><b>Total Answer: <?php echo $number_of_answer; ?></b> </p>
                        </div> -->



                         <!-- add edit and delete button only for own post -->
                        <?php
                        if ($_SESSION['username'] == $res['username']) {
                        ?>
                            <form class="modifyarea" action="#" method="GET">
                                <a href="editview.php?id=<?php echo $res['id'];
                                                            ?>" name="modify" class="modifybtn">
                                    <i id="edit" class="fa-solid fa-pen-to-square fa-2x"></i>
                                </a>
                                <a href='deleteview.php?id=<?php echo $res['id'];
                                                            ?>&ids=<?php echo $id_value ?>' name="delete" <?php
                                                                                                        ?> class="modifybtn">
                                    <i id="delete" class="fa-solid fa-trash fa-2x"></i>
                                </a>
                            </form>
                        <?php
                        }
                        ?>



                        <div class="qustioncontent">
                            <p><?php echo $res['answer'] ?></p>
                        </div>

                        <div class="answerarea">
                            <!-- This Botton will submit the answer. -->
                            <!-- <a class="answerbtn" href="answer.php"> <button class="answerbtn1" name="answerbtn">ANSWER</button></a> -->


                            <!-- This Botton will view other people answew. -->
                            <!-- <a class="answerbtn" href="view.php">
                                <button class="answerbtn1" name="viewbtn">VIEW</button>
                            </a> -->
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

        function delete_worning() {
            confirm("Are want to delete it!\nEither OK or Cancel.");
        }
    </script>
</body>