
<?php

function conDb(){
  $con = mysqli_connect('localhost', 'root', '', 'pruebausuarios');
 
  if(!$con){
    print_r(mysqli_connect_error());
    return false;
  }else{
    $con->set_charset("utf8");
    return $con;
  }
}


