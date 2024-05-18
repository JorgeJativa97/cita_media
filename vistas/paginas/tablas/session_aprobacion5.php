<?php 
error_reporting(0);
session_start();

if(isset($_POST['rol'])){ 
    $valorq = $_POST['rol'];
    $_SESSION['rol']=$valorq;
    echo $valorq;
    }
