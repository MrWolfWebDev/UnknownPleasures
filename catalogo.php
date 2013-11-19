<?php
include 'php/dbconnection.php';
include 'php/db.class.php';

$songDB = new TableSong();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="scroll_box">
            <div class="logo"><img src="images/finder_logo.png" /></div>
            <form name="search_tracks" action="query.php" enctype="text/plain">
                <div class="search_zone">
                    <input id="lens" type="image" src="images/lens.png" name="submit" alt="Cerca"><input id="search_text" onclick="clickclear(this, 'cerca..');" onblur="clickrecall(this, 'cerca..');" type="text" value="cerca..">
                </div>
            </form>
            <div class="horiz_bar"></div>
            <div class="catalogo_text">
                <?php
                $result = $songDB->fetchAll();
                
                foreach ($result as $song) {
                    echo "<p>",$song->Titolo,"<a href=".substr($song->Pdf,3)." target='_blank'><img src='images/pdf.png' height='30px' width='50px'></a><a href=".$song->ITunes." target='_blank'><img src='images/nota.png' alt='iTunes' height='30px' width='30px'></a></p>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
