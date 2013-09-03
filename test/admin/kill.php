<?php
require_once '../php/db_account.php';
require_once '../php/db_connect.php';

$listanera=$_POST["auto"];

foreach($listanera as $kill) {
         
    $sql="DELETE FROM `bruschi` WHERE `Id`=$kill";
    mysql_query($sql) or die(mysql_error());
    
    unlink("../img/cover/$kill.jpg");
    unlink("../img/cover/pre$kill.jpg");
    for($i=1;$i<8;$i++){
        unlink("../img/cover/$kill-$i.jpg");
    }
}
   
    header('location:index.php');

?>
