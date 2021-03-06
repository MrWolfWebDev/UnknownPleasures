<?php
include 'php/dbconnection.php';
include 'php/db.class.php';

$newsDB = new TableNews();

$last = $newsDB->fetchCount();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unknown Pleasure</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script src="http://malsup.github.io/jquery.blockUI.js"></script>
        <script type="text/javascript">
            function ajaxFunction(page) {
                var ajaxRequest = new XMLHttpRequest();
                ajaxRequest.onreadystatechange = function() {
                    if (ajaxRequest.readyState === 4 && ajaxRequest.status === 200) {
                        document.getElementById("news_status").className = 'menu_unselected';
                        document.getElementById("catalogo_status").className = 'menu_unselected';
                        document.getElementById("chisiamo_status").className = 'menu_unselected';
                        document.getElementById(page + "_status").className = 'menu_selected';
                        document.getElementById("content").innerHTML = ajaxRequest.responseText;
                    }
                };
                ajaxRequest.open("GET", page + ".php");
                ajaxRequest.send();
            }

            function clickclear(thisfield, defaulttext) {
                if (thisfield.value === defaulttext) {
                    thisfield.value = "";
                }
            }

            function clickrecall(thisfield, defaulttext) {
                if (thisfield.value === "") {
                    thisfield.value = defaulttext;
                }
            }

            function gotoArticle(rec) {
                var ajaxRequest = new XMLHttpRequest();
                ajaxRequest.onreadystatechange = function()
                {
                    if (ajaxRequest.readyState === 4 && ajaxRequest.status === 200)
                    {
                        document.getElementById("content").innerHTML = ajaxRequest.responseText;
                    }
                };
                ajaxRequest.open("GET", "news.php?rec=" + rec);
                ajaxRequest.send();
            }

            function Search() {
                var ajaxRequest = new XMLHttpRequest();
                ajaxRequest.onreadystatechange = function()
                {
                    if (ajaxRequest.readyState === 4 && ajaxRequest.status === 200)
                    {
                        document.getElementById("catalogo_text").innerHTML = ajaxRequest.responseText;
                    }
                };
                var src = document.getElementById("search_text").value;
                ajaxRequest.open("GET", "php/searchfiller.php?src=" + src);
                ajaxRequest.send();
            }

            $(document).ready(function( ) {
                $('#contatti').click(function( ) {
                    $.blockUI({message: $('#contacts'),
                        css: {
                            top: ($(window).height( ) - 400) / 2 + 'px',
                            left: ($(window).width( ) - 400) / 2 + 'px',
                            width: '400 px',
                            height: '400 px'
                        }
                    });
                    $('.blockOverlay').click($.unblockUI);
                    $('#chiudi').click($.unblockUI);
                });
            });
        </script>
    </head>
    <body onLoad="ajaxFunction('news');">
        <div id="header">
            <div id="menu">
                <div class="menu_line"></div>
                <div class="navigation">
                    <div class="menu_link" onclick="ajaxFunction('news');">
                        <div id="news_status" class="menu_selected"></div>
                        <div class="menu_link_text news"></div>
                    </div>
                    <div class="menu_divide"></div>
                    <div class="menu_link" onclick="ajaxFunction('catalogo');">
                        <div id="catalogo_status" class="menu_unselected"></div>
                        <div class="menu_link_text cat" ></div>
                    </div>
                    <div class="menu_divide"></div>
                    <div class="menu_link" onclick="ajaxFunction('chisiamo');">
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
                    <a ><img class="link_logo" alt="Contatti" id="contatti" src="images/links/contatti.png" style="height:30px !important; width: auto !important;"/></a>
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
                    <a href="http://youtube.com" target="_blank"><img class="link_logo" alt="Youtube_logo" src="images/links/youtube.png" style="width: 35px !important;"/></a>
                </div>
            </div>
        </div>

        <div id="contacts" style="display:none; background-color:#FFF; color:#000; width:400px; height:400px;">
            <a id="chiudi" style="cursor:pointer; position:absolute; right:5px;">x</a>
            <br />
            <img src="images/up_logo.png" alt="Unknown Pleasure" height="150px"/>
            <p align="left" style="margin-left:85px;"><b>P.I.:</b>    01569240094</p>
            <p align="left" style="margin-left:85px;"><b>A:</b>VIA L. GROSSO 28/6 - 17013<BR /> ALBISOLA SUPERIORE(SV)</p>
            <p align="left" style="margin-left:85px;"><b>T:</b>3479259983</p>
            <p align="left" style="margin-left:85px;"><b>M:</b>INFO@SIMONECAPELLI.IT</p>
            <p align="left" style="margin-left:85px;"><b>W:</b>WWW.SIMONECAPELLI.IT</p>
            <br/>
            <br/>
        </div>


    </body>
</html>
