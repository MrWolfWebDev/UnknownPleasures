<?php

include 'dbconnection.php';
include 'db.class.php';

$songDB = new TableSong();

if (!isset($_GET['src']) or $_GET['src']==" ") {
    $result = $songDB->fetchAll();

    foreach ($result as $song) {
        echo "<p>", $song->Titolo, "<a href=" . substr($song->Pdf, 3) . " target='_blank'><img src='images/pdf.png' height='30px' width='50px'></a><a href=" . $song->ITunes . " target='_blank'><img src='images/nota.png' alt='iTunes' height='30px' width='30px'></a></p>";
    }
} else {
    
    $result = $songDB->fetchBySearch($_GET['src']);

    foreach ($result as $song) {
        echo "<p>", $song->Titolo, "<a href=" . substr($song->Pdf, 3) . " target='_blank'><img src='images/pdf.png' height='30px' width='50px'></a><a href=" . $song->ITunes . " target='_blank'><img src='images/nota.png' alt='iTunes' height='30px' width='30px'></a></p>";
    }
}
                
                