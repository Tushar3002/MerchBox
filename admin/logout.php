<?php
session_start();
if(!isset($_SESSION['ses']))
{
    session_destroy();
    header('location:signin.php');
}else{
header('location:signin.php');
}
?>