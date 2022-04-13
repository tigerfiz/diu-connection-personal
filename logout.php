<?php

include 'sessioncheck.php';
session_destroy();

header("Location:index.php");
?>