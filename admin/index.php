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
                                    <i class="icon-asterisk"></i> News
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse" style="height: 0px; ">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addnews.php"><i class="icon-plus"></i> Aggiungi News</a></li>
                                        <li><a href="delnews.php"><i class="icon-minus"></i> Elimina News</a></li>
                                        <li><a href="modnews.php"><i class="icon-refresh"></i> Modifica News</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    <i class="icon-asterisk"></i> Brani
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addbrano.php"><i class="icon-plus"></i> Aggiungi Brano</a></li>
                                        <li><a href="delbrano.php"><i class="icon-minus"></i> Elimina Brano</a></li>
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