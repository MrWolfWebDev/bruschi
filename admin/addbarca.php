<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Aggiungi Barca</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
            <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
            <link href="css/adminstyle.css" rel="stylesheet" />
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <form class="span10 offset1" enctype="multipart/form-data" action="addbarca.php" method="post">
                        <div class="row"><h3>Aggiungi i dati della barca</h3></div>
                        <div class="row"><i>In caso il dato manchi digita "-"</i></div>
                        <div class="row"><hr></hr></div>
                        <div class="row">
                            <input class="span1" type="text" class="input-block-level" name="anno" placeholder="Anno" />
                            <input class="span2" type="text" class="input-block-level" name="marca" placeholder="Marca" />
                        </div>
                        <div class="row">
                            <input class="span3" type="text" class="input-block-level" name="modello" placeholder="Modello" />            
                        </div>
                        <div class="row">
                            <textarea class="span4" class="input-block-level" name="descrizione" placeholder="Descrizione" cols="40" rows="7" style=" resize: none !important;"/></textarea>
                        </div>
                        <div class="row">
                            <input class="span2" type="text" class="input-block-level" name="prezzo" placeholder="Prezzo" />
                        </div>                    
                        <div class="row">
                            Inserisci l'immagine di copertina:<input type="file" name = "files"/>
                        </div>
                        <div class="row"><hr></hr></div>
                        <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Inserisci"  /></div>          
                    </form>
                </div>
            </div>

            <?php
            //Dati accesso db
            include('../php/db_account.php');
            //effettuo l'inserimento sul database
            include('../php/db_connect.php');
            if (isset($_POST) && !empty($_POST)) {
                $empty = 0;

                foreach (array_keys($_POST) as $key) {

                    if (empty($_POST[$key])) {
                        $empty = 1;
                    }
                }

                if ($empty == 0 && !empty($_FILES['files']['tmp_name'])) {

                    // Unchecked checkbox are not set in $_POST
                    // Even if the values aren't set, we want to insert a value

                    if ($_POST['prezzo'] == "-") {
                        $prezzo = -1;
                    } else {
                        $prezzo = filter_var(str_replace(",", ".", $_POST['prezzo']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    }

                    $descrizione = filter_var($_POST['descrizione'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $anno = filter_var($_POST['anno'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $marca = filter_var($_POST['marca'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $modello = filter_var($_POST['modello'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $nome_immagine = $_FILES['files']['tmp_name'];

                    $newIdQuery = "SELECT `Id` FROM `bruschi` ORDER BY `Id` DESC";

                    $insert = "INSERT INTO `bruschi`(`Anno`, `Marca`, `Modello`, `Caratteristiche`, `Prezzo`, `Barca`) VALUES ($anno,'$marca','$modello','$descrizione',$prezzo,1)";


                    mysql_query($insert) or die(mysql_error());
                    $result = mysql_query($newIdQuery) or die(mysql_error());

                    $row = mysql_fetch_assoc($result);
                    $ID = $row["Id"];
                    echo "$ID";

                    //valore di foto_id dopo l'inserimento

                    $percorso = "../img/cover/";
                    //cartella sul server dove verrÃ  spostata la foto

                    $nuovo_nome = $percorso . $ID . ".jpg";


                    $inviato = file_exists($nome_immagine);

                    if ($inviato) {
                        // sposto l'immagine nella cartella 
                        move_uploaded_file($nome_immagine, $nuovo_nome);
                        header("Location:addfoto.php");
                    } else {
                        echo "<BR> Errore";
                    }


                    ////////////////////////////////////
                    //Creazione anteprime
                    // Ottengo le informazioni sull'immagine originale
                    list($width, $height) = getimagesize($nuovo_nome);
                    // Creo la versione 130*97 dell'immagine (thumbnail)
                    $thumb = imagecreatetruecolor(130, 97);
                    $source = imagecreatefromjpeg($nuovo_nome . '');
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, 130, 97, $width, $height);
                    // Salvo l'immagine ridimensionata
                    imagejpeg($thumb, $percorso . "pre" . $ID . ".jpg" . '', 75);
                    ////////////////////////////////
                    // Ottengo le informazioni sull'immagine originale
                    list($width1, $height1) = getimagesize($nuovo_nome);
                    // Creo la versione 480*359 dell'immagine (thumbnail)
                    $thumb1 = imagecreatetruecolor(480, 359);
                    $source1 = imagecreatefromjpeg($nuovo_nome . '');
                    imagecopyresized($thumb1, $source1, 0, 0, 0, 0, 480, 359, $width1, $height1);
                    // Salvo l'immagine ridimensionata
                    imagejpeg($thumb1, $percorso . $ID . ".jpg" . '', 75);
                    ////////////////////////////////
                } else {
                    echo '<div class="alert alert-error">Devi inserire tutti i campi</div>';
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