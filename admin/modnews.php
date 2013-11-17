<?php
session_start();
if ($_SESSION['auth'] == 1):


    include '../php/dbconnection.php';
    include '../php/db.class.php';
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Modifica La News</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
            <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
            <link href="css/adminstyle.css" rel="stylesheet" />
        </head>

        <body>


            <div class="container">

                <div class="row">
                    <?php
                    if (!isset($_POST['Mod'])) {

                        echo '<form class="span10 offset1" enctype="multipart/form-data" action="modnews.php" method="post">
                        <div class="row"><h3>Seleziona la news da modificare</h3></div>
                        <div class="row"><hr></hr></div>';


                        $newsDB = new TableNews();

                        $result1 = $newsDB->fetchAll();

                        foreach ($result1 as $news) {
                            echo '<input type="radio"  name="news" value="', $news->ID, '"/> <b>', $news->Titolo, "</b> del <b>", $news->DataIns, "</b>";
                            echo '<br/>';
                        }


                        echo' <div class="row"><hr></hr></div>
                        <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Modifica" name="Mod"/></div>   
                    </form>                
            </div>';
                    } else {

                        $newsDB = new TableNews();

                        $mod = $_POST['news'];

                        $candidat = $newsDB->fetchByID($mod);


                        echo' <form class="span10 offset1" enctype="multipart/form-data" action="modnews.php?id=' . $candidat->ID . '" method="post">
                    <div class="row"><h3>Modifica la news</h3></div>
                    <div class="row"><hr></hr></div>
                    <div class="row">
                        <h4>Titolo</h4> <input class="span6" type="text" class="input-block-level" name="Titolo" value="' . $candidat->Titolo . '"/>
                    </div>
                    

                    <div class="row">
                        <img src="'.$candidat->Foto.'"/>
                    </div>



                    <div class="row">
                        <h4>Immagnie</h4><input type="file" name = "img"/> 
                    </div>

                    <div class="row">
                        <h4>News</h4> <textarea class="span6" class="input-block-level" name="Testo" rows="10" style="resize:none;">' . $candidat->Testo . '</textarea> 
                    </div>
                    <div class="row"><hr></hr></div>
                    <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Prosegui" name="Prosegui"/></div>   
                </form>
            </div>
        </div>';
                    }
                    if (isset($_POST['Prosegui'])) {

                        $Id = $_GET['id'];

                        $newsDB = new TableNews();
                        $candidat = $newsDB->fetchByID($Id);

                        $Titolo = filter_var($_POST['Titolo'], FILTER_SANITIZE_STRING);
                        $Testo = filter_var($_POST['Testo'], FILTER_SANITIZE_STRING);
                        
                        echo empty($_FILES['img']['tmp_name']);

                        if ($_FILES['img']['tmp_name']) {
                            echo 'Foto';
                            $Path = $candidat->Foto;
                            unlink($Path);

                            /*
                             * Uploda immagine
                             */
                            $nome_immagine = $_FILES['img']['tmp_name'];
                            $img_info = getimagesize($_FILES['img']['tmp_name']);

                            // Separate the extension
                            $originalfile = substr($nome_immagine, 0, strripos($nome_immagine, '.'));
                            $ext = $img_info[2];

                            $inviato = file_exists($nome_immagine);

                            function hashImage() {
                                $length = 5;
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
                                for ($p = 0; $p < $length; $p++) {
                                    $filename = $characters[mt_rand(0, strlen($characters))];
                                }
                                return $filename;
                            }

                            $ID = hashImage($originalfile) . $ext;

                            $nuovo_nome = "../images/cover/" . $ID . ".jpg";

                            if ($inviato) {
                                // sposto l'immagine nella cartella 
                                move_uploaded_file($nome_immagine, $nuovo_nome);
                            } else {
                                echo "<BR> Errore";
                            }

                            /*
                             * Creo array per inserimento
                             */
                            $array = array(
                                "Data" => "2013-11-1",
                                "Titolo" => $Titolo,
                                "Testo" => $Testo,
                                "Foto" => $nuovo_nome,
                                "DataIns" => date("Y-m-d"),
                            );

                            $obj = new News();
                            $obj->fromArray($array);
                            $newsDB->update($obj, $candidat);

                            /*
                             * Prosegue dopo inserimento
                             */
                            header("Location:index.php");
                        } else {
                            /*
                             * Creo array per inserimento
                             */

                            $nuovo_nome = $candidat->Foto;

                            $array = array(
                                "Data" => "2013-11-1",
                                "Titolo" => $Titolo,
                                "Testo" => $Testo,
                                "Foto" => $nuovo_nome,
                                "DataIns" => date("Y-m-d"),
                            );
                            $obj = new News();
                            $obj->fromArray($array);
                            $newsDB->update($obj, $candidat);

                            /*
                             * Prosegue dopo inserimento
                             */

                            echo 'No foto';
                            header("Location:index.php");
                        }
                    }
                    ?>
                </div>
        </body>
    </html>
    <?php
else:
    header("location:login.php");
endif;