<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Elimina Moto</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/adminstyle.css" rel="stylesheet" />
    </head>

    <body>
          <div class="container">
            <div class="row">
                <form class="span10 offset1" method="POST" action="kill.php">
                     <div class="row"><h3>Selezione la moto o le moto da eliminare</h3></div>
                     <div class="row"><hr></hr></div>
                     <div class="row"><span class="span2"><b>Modello:</b></span><span class="span1"><b>Anno:</b></span></div>
<?php
require_once '../php/db_account.php';
require_once '../php/db_connect.php';

$sql = "SELECT * FROM `bruschi` WHERE `Moto`=1";
$result = mysql_query($sql) or die(mysql_error());

while ($auto=  mysql_fetch_assoc($result)){

    echo "
        <div class=\"row\">
        <input class=\"span1\" type='checkbox' name='auto[]'value='".$auto['Id']."' /> <span class=\"span2\">" .$auto['Modello']."</span><span class=\"span1\">".$auto['Anno']."</span>
        </div>";
    
    
}
?>
                     <div class="row"><hr></hr></div>
                     <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Elimina"  /></div>             
                </form>
            </div>
          </div>
      </body>
  <?php
else:
    header('location:login.php');
endif;
?>