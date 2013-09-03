<?php
require_once 'php/db_account.php';
require_once 'php/db_connect.php';
        
$id=$_GET['ID'];
$query="SELECT * FROM `bruschi` WHERE `Id`=$id";
$result = mysql_query($query) or die(mysql_error());
$sql="SELECT `Foto` FROM `bruschi` WHERE `Id`=$id";
$nfoto = mysql_query($sql) or die(mysql_error());

$auto=mysql_fetch_assoc($result);

$foto = mysql_fetch_assoc($nfoto);

?>

<html>
<head>
<title>www.bruschiclassic.it - Auto, Moto Barche d'Epoca e particolari</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
a {
	color: #000000;
}
a:visited {
	color: #000000;
}
a:active {
	color: #000000;
}
a:hover {
	color: #000000;
}
.stile { font-family: Times New Roman, Times, serif; font-size: 18px; font-color: black; font-weight: bold } 
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
<table width="970" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td><img src="images/logo_indirizzo.gif" width="970" height="50"></td>
  </tr>
  <tr> 
    <td align="center"><img src="images/logo_2.jpg" width="150" height="150"></td>
  </tr>
  <tr> 
    <td height="40">&nbsp;</td>
  </tr>
  <tr> 
    <td> 
      <table width="950" border="1" cellspacing="0" cellpadding="5" align="center" class="stile">
        <tr> 
          <td valign="top">Anno: <?php echo $auto['Anno']?><br>
            <br>
            Marca: <?php echo $auto['Marca']?><br>
            <br>
            Modello: <?php echo $auto['Modello']?><br>
            <br>
            Caratteristiche:<br> <?php echo $auto['Caratteristiche']?><br>
            <br>
            Prezzo: <?php echo $auto['Prezzo']?> &euro;</td>
          <td width="60%" align="center" valign="middle"><br>
            <?php 
            
            $limit=$foto["Foto"]-1;
            echo'<p><img border="0" src="img/cover/'.$id.'.jpg" width="480" height="360"><br></p>';
            for($i=1;$i<=$limit;$i++){
            echo'<p><img border="0" src="img/cover/'.$id.'-'.$i.'.jpg" width="480" height="360"><br></p>';}
          ?>
                    </td>
        </tr>
      </table>
    	<p>&nbsp;</td>
  </tr>
  <tr> 
    <td height="40">&nbsp;</td>
  </tr>
</table>
</body>
</html>
