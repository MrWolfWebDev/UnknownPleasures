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
        <title>Aggiungi Una News</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/adminstyle.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <form class="span10 offset1" enctype="multipart/form-data" action="addnews.php" method="post">
                    <div class="row"><h3>Inserisci una news al sito</h3></div>
                    <div class="row"><hr></hr></div>
                    <div class="row">
                        <h4>Titolo</h4> <input class="span6" type="text" class="input-block-level" name="Titolo"/>
                    </div>

                    <div class="row">
                        <h4>Immagnie</h4><input type="file" name = "files"/> 
                    </div>

                    <div class="row">
                        <h4>News</h4> <textarea class="span6" class="input-block-level" name="Testo" rows="10" style="resize:none;"></textarea> 
                    </div>
                    <div class="row"><hr></hr></div>
                    <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Inserisci" name="Submit"/></div>   
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['Submit'])) {

            $Titolo = filter_var($_POST['Titolo'], FILTER_SANITIZE_STRING);
            $Testo = filter_var($_POST['Testo'], FILTER_SANITIZE_STRING);

            $newsDB = new TableNews();

            /*
             * Uploda immagine
             */
            $nome_immagine = $_FILES['files']['tmp_name'];
            $img_info = getimagesize($_FILES['files']['tmp_name']);

            // Separate the extension
            $originalfile = substr($nome_immagine, 0, strripos($nome_immagine, '.'));
            $ext = $img_info[2];

            $inviato = file_exists($nome_immagine);

            function hashImage() {
                $length = 5;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
                for ($p = 0; $p < $length; $p++) {
                    $filename .= $characters[mt_rand(0, strlen($characters))];
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

            /*
             * Metodo per inserimento in db
             */
            $newsDB->insert($array);

            /*
             * Prosegue dopo inserimento
             */
            header("Location:index.php");
        }
        ?>
    </body>
</html>
  <?php
else:
    header("location:login.php");
endif;