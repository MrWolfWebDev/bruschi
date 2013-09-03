<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Aggiungi Auto</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
            <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
            <link href="css/adminstyle.css" rel="stylesheet" />
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <form class="span10 offset1" action="addfoto.php" enctype="multipart/form-data" method="post">
                        <div class="row"><h2>Aggiungi foto per il dettaglio:</h2></div>
                        <div class="row"><hr></hr></div>
                        <div class="row">
                            <input id="file" name="files[]" type="file" multiple="multiple"></input>
                        </div>
                        <div class="row"><hr></hr></div>
                        <div class="row"><input class="btn btn-large btn-primary " type="submit" name="submit" value="Inserisci"  /></div>          
                    </form>
                </div>
            </div>

            <?php
            //Dati accesso db
            include('../php/db_account.php');
            //effettuo l'inserimento sul database
            include('../php/db_connect.php');

            $query = "SELECT  `Id` FROM  `bruschi` ORDER BY  `Id` DESC LIMIT 1";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_row($result);

            $id = $row[0];

            if (isset($_POST['submit'])) {

                if (isset($_FILES)) {

                    $lista = ($_FILES['files']['tmp_name']);
                    $i = 1;
                    foreach ($lista as $nome_immagine) {



                        //$nome_immagine = $lista[$i - 1];
                        //valore di foto_id dopo l'inserimento
                        $percorso = "../img/cover/";
                        //cartella sul server dove verrÃ  spostata la foto

                        $nuovo_nome = "{$percorso}{$id}-{$i}.jpg";
                        $i++;

                        $inviato = file_exists($nome_immagine);
                        //verifica se il file Ã¨ stato caricato sul server
                        
                        $sql = "UPDATE `bruschi` SET `Foto`=$i WHERE `Id`=$id";

                        mysql_query($sql) or die(mysql_error());

                        if ($inviato) {
                            // sposto l'immagine nella cartella
                            move_uploaded_file($nome_immagine, $nuovo_nome);
                        }

                        // Ottengo le informazioni sull'immagine originale
                        list($width1, $height1) = getimagesize($nuovo_nome);
                        // Creo la versione 480*359 dell'immagine (thumbnail)
                        $thumb1 = imagecreatetruecolor(480, 359);
                        $source1 = imagecreatefromjpeg($nuovo_nome . '');
                        imagecopyresized($thumb1, $source1, 0, 0, 0, 0, 480, 359, $width1, $height1);
                        // Salvo l'immagine ridimensionata
                        imagejpeg($thumb1, $percorso . $id . ".jpg" . '', 75);
                        ////////////////////////////////
                    }
                    header("Location: index.php");
                } else {
                    echo "Compila tutti i campi";
                }
            }
            ?>

        </body>
    </html>
    <?php
else:
    header('location:login.php');
endif;
?>