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
        <title>Aggiungi Un Brano</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/adminstyle.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <form class="span10 offset1" enctype="multipart/form-data" action="addbrano.php" method="post">
                    <div class="row"><h3>Inserisci un nuovo brano</h3></div>
                    <div class="row"><hr></hr></div>
                    <div class="row">
                        <h4>Titolo</h4> <input class="span6" type="text" class="input-block-level" name="Titolo"/>
                    </div>

                    <div class="row">
                        <h4>Artista</h4> <input class="span6" type="text" class="input-block-level" name="Artista"/>
                    </div>

                    <div class="row">
                        <h4>Album</h4> <input class="span6" type="text" class="input-block-level" name="Album"/> 
                    </div>
                    
                    <div class="row">
                        <h4>Genere</h4> <input class="span6" type="text" class="input-block-level" name="Genere"/> 
                    </div>
                    
                    <div class="row">
                        <h4>Anno</h4> <input class="span2" type="text" class="input-block-level" name="Anno"/> 
                    </div>
                    
                    <div class="row">
                        <h4>Link iTunes</h4> <input class="span6" type="text" class="input-block-level" name="ITunes"/> 
                    </div>
                    
                    <div class="row">
                        <h4>Inserisci il PDF</h4><input type="file" name = "pdf"/> 
                    </div>
                    
                    <div class="row"><hr></hr></div>
                    <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Inserisci" name="Inserisci"/></div>   
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['Inserisci'])) {
            
            echo 'Inserimento';

            $Titolo  = filter_var($_POST['Titolo'], FILTER_SANITIZE_STRING);
            $Artista = filter_var($_POST['Artista'], FILTER_SANITIZE_STRING);
            $Album   = filter_var($_POST['Album'], FILTER_SANITIZE_STRING);
            $Genere  = filter_var($_POST['Genere'], FILTER_SANITIZE_STRING); 
            $Anno    = filter_var($_POST['Anno'], FILTER_SANITIZE_STRING);
            $ITunes  = filter_var($_POST['ITunes'], FILTER_SANITIZE_STRING);

            $songDB = new TableSong();
            
            /*
             * Uploda immagine
             */
            $nome_pdf = $_FILES['pdf']['tmp_name'];
            $pdf_info = getimagesize($_FILES['pdf']['tmp_name']);

            // Separate the extension
            $originalfile = substr($nome_pdf, 0, strripos($nome_pdf, '.'));
            $ext = $pdf_info[2];

            $inviato = file_exists($nome_pdf);

            function hashImage() {
                $length = 5;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
                for ($p = 0; $p < $length; $p++) {
                    $filename .= $characters[mt_rand(0, strlen($characters))];
                }
                return $filename;
            }

            $ID = hashImage($originalfile) . $ext;

            $nuovo_nome = "../pdf/" . $ID . ".pdf";

            if ($inviato) {
                // sposto l'immagine nella cartella 
                move_uploaded_file($nome_pdf, $nuovo_nome);
            } else {
                echo "<BR> Errore";
            }
             /*
             * Creo array per inserimento
             */
            $array = array(
                "Titolo"  => $Titolo,
                "Artista" => $Artista,
                "Album"   => $Album,
                "Genere"  => $Genere,
                "Anno"    => $Anno,
                "ITunes"  => $ITunes,
                "Pdf"     => $nuovo_nome,
                "DataIns" => date("Y-m-d"),
            );

            /*
             * Metodo per inserimento in db
             */
            $songDB->insert($array);

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