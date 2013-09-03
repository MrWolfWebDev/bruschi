 <?php
        
require_once '../php/db_account.php';
require_once '../php/db_connect.php';
   
        if(isset($_POST) && !empty($_POST)){
			$empty = 0;
                        
			foreach (array_keys($_POST) as $key)
			{
				 
                                 if (empty($_POST[$key])){ $empty= 1; }
                                                          
			}
        if ($empty==0){
			
				// Unchecked checkbox are not set in $_POST
				// Even if the values aren't set, we want to insert a value
	
                                $id=$_POST['auto'];
            
                                if($_POST['prezzo']=="-"){$prezzo=-1;}else{$prezzo = filter_var(str_replace(",", ".", $_POST['prezzo']) , FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);}
                                
				$descrizione = filter_var($_POST['descrizione'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$anno = filter_var($_POST['anno'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$marca = filter_var($_POST['marca'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$modello = filter_var($_POST['modello'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				                            
                        	$sql = "UPDATE `bruschi` SET `Anno`=$anno,`Marca`=\"$marca\",`Modello`=\"$modello\",`Caratteristiche`=\"$descrizione\",`Prezzo`=$prezzo WHERE `Id`=$id";
                                mysql_query($sql) or die(mysql_error());
                                
                                if (!empty($_FILES['files']['tmp_name'])){
                                $nome_immagine = $_FILES['files']['tmp_name'];
                                
                                //valore di foto_id dopo l'inserimento
				
				$percorso = "../img/cover/";
				//cartella sul server dove verrà spostata la foto
				
				$nuovo_nome = $percorso.$id.".jpg";
				
                                
				$inviato=file_exists($nome_immagine);
                               
				if ($inviato) {
					// sposto l'immagine nella cartella 
					move_uploaded_file($nome_immagine,$nuovo_nome);
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
                                        $source = imagecreatefromjpeg($nuovo_nome.'');
                                        imagecopyresized($thumb, $source, 0, 0, 0, 0, 130, 97, $width, $height);
                                        // Salvo l'immagine ridimensionata
                                        imagejpeg($thumb,$percorso."pre".$id.".jpg".'', 75);
                                        ////////////////////////////////
                                        
                                        // Ottengo le informazioni sull'immagine originale
                                        list($width1, $height1) = getimagesize($nuovo_nome);
                                        // Creo la versione 480*359 dell'immagine (thumbnail)
                                        $thumb1 = imagecreatetruecolor(480, 359);
                                        $source1 = imagecreatefromjpeg($nuovo_nome.'');
                                        imagecopyresized($thumb1, $source1, 0, 0, 0, 0, 480, 359, $width1, $height1);
                                        // Salvo l'immagine ridimensionata
                                        imagejpeg($thumb1,$percorso.$id.".jpg".'', 75);
                                        ////////////////////////////////
                                
			}

                                }
                                
                               header("location:modfoto.php?id=$id");
        }
?>
