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


var_dump($last);

if (!isset($_GET['rec'])) {
    $news = 1;
} else {
    $news = $_GET['rec'];
}

$notizia= $newsDB->fetchByID($news);
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <div class="scroll_box">
            <div class="article_title"><?php echo $notizia->Titolo ?></div>
            <div class="article_content">
                <div class="article_date"><?php echo $notizia->DataIns ?></div>
                <div class="article_image_box"><img class="article_image" src="<?php echo $notizia->Foto ?>" /></div>
                <div class="horiz_bar"></div>
                <div class="article_text">
                    <p>
                     <?php echo $notizia->Testo ?>
                    </p>
                </div>
                <div class="social_networks_links">
                    <a href="https://facebook.com" target="_blank">
                        <div class="sn_link">
                            <img class="link_mini_logo" alt="facebook_logo" src="images/links/fb_mini.png" />
                        </div>
                    </a>
                    <a href="http://twitter.com" target="_blank">
                        <div class="sn_link">
                            <img class="link_mini_logo" alt="twitter_logo" src="images/links/twitter_mini.png" />
                        </div>
                    </a>
                </div>
                <div id="news_navigation">
                    <div class="news_navigation_cell">
                        <img class="news_navigation_link" src="images/links/arrow_left_end.png" onclick="gotoArticle(1);"/>
                    </div>
                    <div class="news_navigation_cell">
                        <img class="news_navigation_link" src="images/links/arrow_left.png" onclick="gotoArticle(<?php echo $news-1; ?>);"/>
                    </div>
                    <div class="news_navigation_cell">
                        <div id="article_counter">
                            <span><?php echo $news; ?> / <?php echo $last; ?></span>
                        </div>
                    </div>
                    <div class="news_navigation_cell">
                        <?php
                        //if($news!=$last){
                        echo '<img class="news_navigation_link" src="images/links/arrow_right.png" onclick="gotoArticle(<?php echo $news+1; ?>);" />';
                        //}
                        ?>                    
                    </div>
                    <div class="news_navigation_cell">
                        <img class="news_navigation_link" src="images/links/arrow_right_end.png" onclick="gotoArticle(<?php echo $last; ?>)" />
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
