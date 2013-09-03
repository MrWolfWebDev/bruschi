<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <html>
        <head>
            <title>Pannello di Amministrazione</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
            <link href="bootstrap/css/bootstrap-responsive.css" rel='stylesheet' />
            <link href="css/adminstyle.css" rel="stylesheet" />

        </head>


        <body>
            <div class='container'>
                <div class="row">
                    <div class="accordion span4 offset4" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    <i class="icon-asterisk"></i> Auto
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse" style="height: 0px; ">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addauto.php"><i class="icon-plus"></i> Aggiungi Auto</a></li>
                                        <li><a href="delauto.php"><i class="icon-minus"></i> Elimina Auto</a></li>
                                        <li><a href="modauto.php"><i class="icon-refresh"></i> Modifica Auto</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    <i class="icon-asterisk"></i> Moto
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addmoto.php"><i class="icon-plus"></i> Aggiungi Moto</a></li>
                                        <li><a href="delmoto.php"><i class="icon-minus"></i> Elimina Moto</a></li>
                                        <li><a href="modmoto.php"><i class="icon-refresh"></i> Modifica Moto</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                    <i class="icon-asterisk"></i> Barche
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addbarca.php"><i class="icon-plus"></i> Aggiungi Barca</a></li>
                                        <li><a href="delbarca.php"><i class="icon-minus"></i> Elimina Barca</a></li>
                                        <li><a href="modbarca.php"><i class="icon-refresh"></i> Modifica Barca</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>                        

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse6">
                                    <i class="icon-remove-circle"></i> Logout
                                </a>
                            </div>
                            <div id="collapse6" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="logout.php"><i class="icon-remove"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        </body>

    </html>
    <?php
else:
    header("location:login.php");
endif;
?>