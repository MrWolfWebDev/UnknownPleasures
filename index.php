<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unknown Pleasure</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script type="text/javascript">
            function ajaxFunction( page ) {
                var ajaxRequest = new XMLHttpRequest();
                ajaxRequest.onreadystatechange = function() {
                    if ( ajaxRequest.readyState === 4 && ajaxRequest.status === 200 ) {
                        document.getElementById( "news_status" ).className = 'menu_unselected';
                        document.getElementById( "catalogo_status" ).className = 'menu_unselected';
                        document.getElementById( "chisiamo_status" ).className = 'menu_unselected';
                        document.getElementById( page + "_status" ).className = 'menu_selected';
                        document.getElementById( "content" ).innerHTML = ajaxRequest.responseText;
                    }
                };
                ajaxRequest.open( "GET", page + ".php" );
                ajaxRequest.send();
            }

            function clickclear( thisfield, defaulttext ) {
                if ( thisfield.value === defaulttext ) {
                    thisfield.value = "";
                }
            }

            function clickrecall( thisfield, defaulttext ) {
                if ( thisfield.value === "" ) {
                    thisfield.value = defaulttext;
                }
            }

            function firstArticle() {

            }

            function previousArticle() {

            }

            function nextArticle() {

            }

            function lastArticle() {

            }
        </script>
    </head>
    <body onLoad="ajaxFunction( 'news' );">
        <div id="header">
            <div id="menu">
                <div class="menu_line"></div>
                <div class="navigation">
                    <div class="menu_link" onclick="ajaxFunction( 'news' );">
                        <div id="news_status" class="menu_selected"></div>
                        <div class="menu_link_text news"></div>
                    </div>
                    <div class="menu_divide"></div>
                    <div class="menu_link" onclick="ajaxFunction( 'catalogo' );">
                        <div id="catalogo_status" class="menu_unselected"></div>
                        <div class="menu_link_text cat" ></div>
                    </div>
                    <div class="menu_divide"></div>
                    <div class="menu_link" onclick="ajaxFunction( 'chisiamo' );">
                        <div id="chisiamo_status" class="menu_unselected"></div>
                        <div class="menu_link_text chi" ></div>
                    </div>
                </div>
                <div class="menu_line"></div>
            </div>
        </div>
        <div id="content">
        </div>
        <div id="fold_area"></div>
        <div id="footer">
            <div class="footer_right_area">
                <div class="footer_textarea">
                    <span class="footer_text">contatti</span>
                </div>
                <div class="footer_link">
                    <a href="mailto:prova@prova.it"><img class="link_logo" alt="mail_logo" src="images/links/mail.png" /></a>
                </div>
                <div class="footer_link">
                    <a href="https://facebook.com" target="_blank"><img class="link_logo" alt="facebook_logo" src="images/links/fb.png" /></a>
                </div>
                <div class="footer_link">
                    <a href="http://twitter.com" target="_blank"><img class="link_logo" alt="twitter_logo" src="images/links/twitter.png" /></a>
                </div>
                <div class="footer_link">
                    <a href="http://youtube.com" target="_blank"><img class="link_logo" alt="Youtube_logo" src="images/links/youtube.png" /></a>
                </div>
            </div>
        </div>
    </body>
</html>
