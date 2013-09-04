<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>www.bruschiclassic.it - Auto, Moto Barche d'Epoca e particolari</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <link rel="shortcut icon" href="favicon.ico"/>        
            <style type="text/css">
                .stile { font-family: Times New Roman, Times, serif; font-size: 14px; font-weight: bold } 
                p.MsoNormal
                {
                    margin-top:0cm;
                    margin-right:0cm;
                    margin-bottom:10.0pt;
                    margin-left:0cm;
                    text-align:center;
                    line-height:115%;
                    font-size:11.0pt;
                    font-family:"Calibri","sans-serif";
                }
                table.MsoNormalTable
                {
                    font-size:11.0pt;
                    font-family:"Calibri","sans-serif";
                }
            </style>
            <base target="_blank">
                <script type="text/javascript">

                    var _gaq = _gaq || [];
                    _gaq.push(['_setAccount', 'UA-25263209-4']);
                    _gaq.push(['_trackPageview']);

                    (function() {
                        var ga = document.createElement('script');
                        ga.type = 'text/javascript';
                        ga.async = true;
                        ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(ga, s);
                    })();

                </script>
                </head>

                <body style="margin-left:0px; margin-top:0px;">
                    <?php
                    require_once 'php/db_account.php';
                    require_once 'php/db_connect.php';
                    ?>
                    <table width="970" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr> 
                            <td align="center">
                                <img border="0" src="logo-indirizzo.gif" width="970" height="50"></td>
                        </tr>
                        <tr>
                            <td align="center"><a href="mappa.htm" target="_blank">
                                    <img src="dove-siamo.gif" width="97" height="20" border="0"/></a></td>
                        </tr>
                        <tr> 
                            <td align="center">
                                <img src="logo_2.jpg" width="150" height="150" alt="www.bruschiclassic.it - Auto, Moto, Barche  d'Epoca e particolari - logo"></td>
                        </tr>
                    </table>
                    <br>
                        <table width="970" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr> 
                                <td height="120" align="center" valign="bottom"><font face="Times New Roman, Times, serif" size="6" color="#000000"><b><i>AUTO</i></b></font></td>
                            </tr>
                            <tr> 
                                <td> 
                                    <table width="950" border="1" cellspacing="0" cellpadding="5" align="center" class="stile">
                                        <tr align="center"> 
                                            <td width="8%"><img src="anno.jpg" width="83" height="46"></td>
                                            <td width="20%"><img src="marca.jpg" width="104" height="46"></td>
                                            <td width="20%"><img src="modello.jpg" width="122" height="46"></td>
                                            <td width="22%">
                                                <img src="caratteristiche.jpg" width="205" height="46"></td>
                                            <td width="15%"><img src="prezzo.jpg" width="103" height="46"></td>
                                            <td width="15%"><img src="anteprima_foto.jpg" width="129" height="46"></td>
                                        </tr>

                                        <?php
                                        $query = "SELECT * FROM `bruschi` WHERE `Auto`=1";
                                        $result = mysql_query($query) or die(mysql_error());

                                        while ($auto = mysql_fetch_assoc($result)) {
                                            if ($auto['Prezzo'] > 0) {
                                                $prezzo = $auto['Prezzo'] . "  &#8364;";
                                            } else {
                                                $prezzo = "su richiesta";
                                            }
                                            echo'<tr> 
        <td align="center" valign="middle">' . $auto['Anno'] . '</td>
          <td align="center" valign="middle">' . $auto['Marca'] . '</td>
          <td align="center" valign="middle">' . $auto['Modello'] . '</td>
          <td valign="middle" align="center">
			<p style="margin:0cm;margin-bottom:.0001pt">' . $auto['Caratteristiche'] . '</td>
          <td align="center" valign="middle"  bgcolor="#FFFF00">' . $prezzo . '</td><td bgcolor="#0000FF">
			<a target="_blank" href="dett.php?ID=' . $auto['Id'] . '">
			<img border="0" src="img/cover/pre' . $auto['Id'] . '.jpg" width="130" height="130"></a></td>
        </tr>';
                                        }
                                        ?>

                                    </table>

                                </td>
                            </tr>
                            <tr> 
                                <td height="40">&nbsp;</td>
                            </tr>
                            <tr> 
                                <td height="40">
                                    <div align="center">
                                        &nbsp;<table border="0">
                                            <tr>    
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td height="120" align="center" valign="bottom"><font face="Times New Roman, Times, serif" size="6" color="#000000"><b><i>BARCHE</i></b></font></td>
                                            </tr>
                                            <tr> 
                                                <td align="center"> 
                                                    <table width="950" border="1" cellspacing="0" cellpadding="5" align="center" class="stile">
                                                        <tr align="center"> 
                                                            <td width="8%"><img src="anno.jpg" width="83" height="46"></td>
                                                            <td width="20%"><img src="marca.jpg" width="104" height="46"></td>
                                                            <td width="20%"><img src="modello.jpg" width="122" height="46"></td>
                                                            <td width="22%">
                                                                <img src="caratteristiche.jpg" width="205" height="46"></td>
                                                            <td width="15%"><img src="prezzo.jpg" width="103" height="46"></td>
                                                            <td width="15%"><img src="anteprima_foto.jpg" width="129" height="46"></td>
                                                        </tr>
                                                        <?php
                                                        $query2 = "SELECT * FROM `bruschi` WHERE `Barca`=1";
                                                        $result2 = mysql_query($query2) or die(mysql_error());

                                                        while ($auto = mysql_fetch_assoc($result2)) {
                                                            if ($auto['Prezzo'] > 0) {
                                                                $prezzo1 = $auto['Prezzo'] . "  &#8364;";
                                                            } else {
                                                                $prezzo1 = "su richiesta";
                                                            }
                                                            echo'<tr> 
        <td align="center" valign="middle">' . $auto['Anno'] . '</td>
          <td align="center" valign="middle">' . $auto['Marca'] . '</td>
          <td align="center" valign="middle">' . $auto['Modello'] . '</td>
          <td valign="middle" align="center">
			<p style="margin:0cm;margin-bottom:.0001pt">' . $auto['Caratteristiche'] . '</td>
          <td align="center" valign="middle"  bgcolor="#FFFF00">' . $prezzo1 . ' &#8364;</td><td bgcolor="#0000FF">
			<a target="_blank" href="dett.php?ID=' . $auto['Id'] . '">
			<img border="0" src="img/cover/pre' . $auto['Id'] . '.jpg" width="130" height="130"></a></td>
        </tr>';
                                                        }
                                                        ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr> 
                                                <td height="40">&nbsp;</td>
                                            </tr>
                                            <tr> 
                                                <td height="120" align="center" valign="bottom"><font face="Times New Roman, Times, serif" size="6" color="#000000"><b><i>MOTO</i></b></font></td>
                                            </tr>
                                            <tr> 
                                                <td align="center">
                                                    <table width="950" border="1" cellspacing="0" cellpadding="5" align="center" class="stile">
                                                        <tr align="center"> 
                                                            <td width="8%"><img src="anno.jpg" width="83" height="46"></td>
                                                            <td width="20%"><img src="marca.jpg" width="104" height="46"></td>
                                                            <td width="20%"><img src="modello.jpg" width="122" height="46"></td>
                                                            <td width="22%">
                                                                <img src="caratteristiche.jpg" width="205" height="46"></td>
                                                            <td width="15%"><img src="prezzo.jpg" width="103" height="46"></td>
                                                            <td width="15%"><img src="anteprima_foto.jpg" width="129" height="46"></td>       
                                                        </tr>

                                                        <?php
                                                        $query1 = "SELECT * FROM `bruschi` WHERE `Moto`=1";
                                                        $result1 = mysql_query($query1) or die(mysql_error());

                                                        while ($auto = mysql_fetch_assoc($result1)) {
                                                            if ($auto['Prezzo'] > 0) {
                                                                $prezzo2 = $auto['Prezzo'] . "  &#8364;";
                                                            } else {
                                                                $prezzo2 = "su richiesta";
                                                            }
                                                            echo'<tr> 
        <td align="center" valign="middle">' . $auto['Anno'] . '</td>
          <td align="center" valign="middle">' . $auto['Marca'] . '</td>
          <td align="center" valign="middle">' . $auto['Modello'] . '</td>
          <td valign="middle" align="center">
			<p style="margin:0cm;margin-bottom:.0001pt">' . $auto['Caratteristiche'] . '</td>
          <td align="center" valign="middle"  bgcolor="#FFFF00">' . $prezzo2 . ' &#8364;</td><td bgcolor="#0000FF">
			<a target="_blank" href="dett.php?ID=' . $auto['Id'] . '">
			<img border="0" src="img/cover/pre' . $auto['Id'] . '.jpg" width="130" height="130"></a></td>
        </tr>';
                                                        }
                                                        ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" height="40">&nbsp;</td>
                                            </tr>
                                            <tr> 
                                                <td align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000">P.I. 
                                                        01138470099</font></td>
                                            </tr>
                                        </table>
                                        </body>
                                        </html>
