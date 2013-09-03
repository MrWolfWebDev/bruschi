<?php
session_start();
if ($_SESSION['auth'] == 1):
    $id = $_GET['id'];?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Modifica Foto</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/adminstyle.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <form class="span10 offset1" action="modfoto.php" enctype="multipart/form-data" method="post">
                     <div class="row"><h2>Aggiungi 7 foto per il dettaglio se vuoi modificarle:</h2></div>
                     <div class="row"><i>Altrimenti clicca su Fine</i></div>
                     <div class="row"><hr></hr></div>
                     <div class="row">
                     <input id="file" name="files[]" type="file" multiple="multiple"></input>
                     </div>
                    <div class="row"><hr></hr></div>
                    <div class="row"><input class="btn btn-large btn-primary " type="submit" name="submit" value="Fine"  /></div>
                    <input type="hidden" value="<?echo $id;?>" name="id"/>
                </form>
            </div>
        </div>
        
        <?php
        //Dati accesso db
                            include('../php/db_account.php');
                            //effettuo l'inserimento sul database
                            include('../php/db_connect.php');

                            
                            
                            if (isset($_POST['submit'])) {
                                $id=$_POST['id'];
                                if (isset($_FILES) && is_uploaded_file($_FILES['files']['tmp_name'][0]) && is_uploaded_file($_FILES['files']['tmp_name'][1]) && is_uploaded_file($_FILES['files']['tmp_name'][2])&& is_uploaded_file($_FILES['files']['tmp_name'][3])&& is_uploaded_file($_FILES['files']['tmp_name'][4])&& is_uploaded_file($_FILES['files']['tmp_name'][5])&& is_uploaded_file($_FILES['files']['tmp_name'][6])) {
                                    
                                    $lista = ($_FILES['files']['tmp_name']);
                                    for ($i = 1; $i <= 7; $i++) {
                                        


                                        $nome_immagine = $lista[$i-1];
                                        //valore di foto_id dopo l'inserimento
                                        $percorso = "../img/cover/";
                                        //cartella sul server dove verrÃ  spostata la foto
                                        
                                        $nuovo_nome = "{$percorso}{$id}-{$i}.jpg";

                                        $inviato = file_exists($nome_immagine);
                                        //verifica se il file Ã¨ stato caricato sul server


                                        if ($inviato) {
                                            // sposto l'immagine nella cartella
                                            move_uploaded_file($nome_immagine, $nuovo_nome);
                                        }
                                        
                                        // Ottengo le informazioni sull'immagine originale
                                        list($width1, $height1) = getimagesize($nuovo_nome);
                                        // Creo la versione 480*359 dell'immagine (thumbnail)
                                        $thumb1 = imagecreatetruecolor(480, 359);
                                        $source1 = imagecreatefromjpeg($nuovo_nome.'');
                                        imagecopyresized($thumb1, $source1, 0, 0, 0, 0, 480, 359, $width1, $height1);
                                        // Salvo l'immagine ridimensionata
                                        imagejpeg($thumb1,$percorso.$id."-$i.jpg".'', 75);
                                        ////////////////////////////////

                                    }
                                } header("Location: index.php");
                            }
                            ?>
        
    </body>
</html>



  <?php
else:
    header('location:login.php');
endif;
?>
