<?php
session_start();
if ($_SESSION['auth'] == 1):
?>

<?php
   require_once '../php/db_account.php';
   require_once '../php/db_connect.php';

   $id=$_POST['auto'];
   
   $sql = "SELECT * FROM `bruschi` WHERE `Id`=".$id."";
   $result = mysql_query($sql) or die(mysql_error());
   $veicolo=mysql_fetch_assoc($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Modifica Auto</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/adminstyle.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <form class="span10 offset1" enctype="multipart/form-data" action="mod2.php" method="post">
                     <div class="row"><h3>Modifica i dati dell'auto</h3></div>
                     <div class="row"><i>In caso il dato manchi digita "-"</i></div>
                     <div class="row"><hr></hr></div>
                    <div class="row">
                        <input class="span1" type="text" class="input-block-level" name="anno" value="<?php echo $veicolo['Anno']; ?>" />
                        <input class="span2" type="text" class="input-block-level" name="marca" value="<?php echo $veicolo['Marca']; ?>" />
                    </div>
                    <div class="row">
                        <input class="span3" type="text" class="input-block-level" name="modello"value="<?php echo $veicolo['Modello']; ?>" />            
                    </div>
                    <div class="row">
                        <textarea class="span4" class="input-block-level" name="descrizione" cols="40" rows="7" style=" resize: none !important;"/><?php echo $veicolo['Caratteristiche']; ?></textarea>
                    </div>
                    <div class="row">
                        <input class="span2" type="text" class="input-block-level" name="prezzo" value="<?php echo $veicolo['Prezzo']; ?>" />
                    </div>                    
                    <div class="row">
                        <?php echo "<img width='100' height='80' src='../img/cover/pre$id.jpg'/>"; ?>Inserisci l'immagine di copertina se vuoi modificarla:<input type="file" name = "files" value="<?php echo "../img/cover/$id.jpg"; ?>"/>
                    </div>           
                    <div class="row"><hr></hr></div>
                    <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Modifica"  /></div>          
                    <input type="hidden" value="<?php echo $id; ?>" name="auto"/>
                </form>
            </div>
        </div>
        
               
        
    </body>
</html>


  <?php
else:
    header('location:login.php');
endif;
?>