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
            <title>Elimina Brano</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
            <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
            <link href="css/adminstyle.css" rel="stylesheet" />
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <form class="span10 offset1" enctype="multipart/form-data" action="delbrano.php" method="post">
                        <div class="row"><h3>Elimina news</h3></div>
                        <div class="row"><hr></hr></div>

                        <?php
                        $songDB = new TableSong();

                        $result1 = $songDB->fetchAll();
                        
                        echo "<table><tr><td></td><td><b>Titolo</b></td><td><b>Album</b></td><td><b>Artista</b></td></tr>";
                 
                        foreach ($result1 as $song) {
                            echo '<tr><td><input type="checkbox"  name="song[]" value="',$song->ID,'"/></td><td>',$song->Titolo,"</td><td>",$song->Album,"</td><td>",$song->Artista,"</td>";
                            echo '<br/>';
                        }
                        
                        echo "</table>";
                        ?>
                        
                        

                        <div class="row"><hr></hr></div>
                        <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Elimina" name="Kill"/></div>   
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['Kill'])) {
                              
                $deadlist=$_POST['song'];
                
                foreach ($deadlist as $kill)
                {
                    $path=$songDB->fetchByID($kill);
                    unlink($path->Pdf);                 
                    $songDB->delete($kill);
                }
                
   
               header("Location:index.php");
            }
            
            ?>
        </body>
    </html>
    <?php
else:
    header("location:login.php");
endif;