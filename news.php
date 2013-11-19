<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'php/dbconnection.php';
include 'php/db.class.php';

$newsDB = new TableNews();

$last = $newsDB->fetchCount();


if ( !isset( $_GET['rec'] ) ) {
    $news = 1;
}
else {
    $news = $_GET['rec'];
}

$notizia= $newsDB->fetchByRow($news-1);

?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <div class="scroll_box">
            
            <div class="article_title"><?php 
            echo $notizia->Titolo; ?></div>
            <div class="article_content">
                <div class="article_date"><?php 
            $newDate = date("d.m.Y", strtotime($notizia->DataIns));
            echo $newDate; ?></div>
                <div class="article_image_box"><img class="article_image" src="<?php echo substr($notizia->Foto,3); ?>" /></div>
                <div class="horiz_bar"></div>
                <div class="article_text">
                    <p>
                        <?php echo $notizia->Testo; ?>
                    </p>
                </div>
                
                <div id="news_navigation">
                    <div class="news_navigation_cell">
                        <?php
                        if ( $news != 1 ) {
                            echo '<img class="news_navigation_link" src="images/links/arrow_left_end.png" onclick="gotoArticle(1);"/>';
                        }
                        ?>
                    </div>
                    <div class="news_navigation_cell">
                        <?php
                        if ( $news != 1 ) {
                            echo '<img class="news_navigation_link" src="images/links/arrow_left.png" onclick="gotoArticle(', $news - 1, ');"/>';
                        }
                        ?>
                    </div>
                    <div class="news_navigation_cell">
                        <div id="article_counter">
                            <span><?php echo $news; ?> / <?php echo $last; ?></span>
                        </div>
                    </div>
                    <div class="news_navigation_cell">
                        <?php
                        if ( $news != $last ) {
                            echo '<img class="news_navigation_link" src="images/links/arrow_right.png" onclick="gotoArticle(', $news + 1, ');" />';
                        }
                        ?>
                    </div>
                    <div class="news_navigation_cell">
                        <?php
                        if ( $news != $last ) {
                            echo '<img class="news_navigation_link" src="images/links/arrow_right_end.png" onclick="gotoArticle(', $last, ')" />';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
