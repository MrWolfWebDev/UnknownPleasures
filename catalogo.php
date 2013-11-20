<?php
include 'php/dbconnection.php';
include 'php/db.class.php';

$songDB = new TableSong();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="scroll_box">
            <div class="logo"><img src="images/finder_logo.png" /></div>

            <div class="search_zone">
                <input id="lens" type="image" src="images/lens.png" name="submit" alt="Cerca"><input id="search_text" onclick="clickclear( this, 'cerca..' );" onblur="clickrecall( this, 'cerca..' );" onkeyup="Search();" type="text" value="cerca..">
            </div>

            <div class="horiz_bar"></div>
            <div class="catalogo_text" id="catalogo_text">
                <table style="width: 540px; margin: 0 auto;">
                    <?php
                    $result = $songDB->fetchAll();

                    foreach ( $result as $song ) {
                        echo "<tr><td>", $song->Titolo, "</td><td><a href=" . substr( $song->Pdf, 3 ) . " target='_blank'><img src='images/pdf.png' height='30px' width='50px'></a></td><td><a href=" . $song->ITunes . " target='_blank'><img src='images/nota.png' alt='iTunes' height='30px' width='30px'></a></td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
