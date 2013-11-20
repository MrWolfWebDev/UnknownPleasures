<?php

include 'dbconnection.php';
include 'db.class.php';

$songDB = new TableSong();

if (!isset($_GET['src']) or $_GET['src']==" ") {
    $result = $songDB->fetchAll();
    echo '<table style="width: 540px;">';
    foreach ($result as $song) {
        echo "<tr><td>", $song->Titolo, "</td><td><a href=" . substr( $song->Pdf, 3 ) . " target='_blank'><img src='images/pdf.png' height='30px' width='50px'></a></td><td><a href=" . $song->ITunes . " target='_blank'><img src='images/nota.png' alt='iTunes' height='30px' width='30px'></a></td></tr>";
    }
    echo '</table>';
} else {
    
    $result = $songDB->fetchBySearch($_GET['src']);
    echo '<table style="width: 540px;">';
    foreach ($result as $song) {
        echo "<tr><td>", $song->Titolo, "</td><td><a href=" . substr( $song->Pdf, 3 ) . " target='_blank'><img src='images/pdf.png' height='30px' width='50px'></a></td><td><a href=" . $song->ITunes . " target='_blank'><img src='images/nota.png' alt='iTunes' height='30px' width='30px'></a></td></tr>";
    }
    echo '</table>';
}
                
                