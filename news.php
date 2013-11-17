<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($_GET['rec'])) {

    $news = 0;
}
else
{
    $news=$_GET['rec'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="scroll_box">
            <div class="article_title">Titolo</div>
            <div class="article_content">
                <div class="article_date">01.01.2013</div>
                <div class="article_image_box"><img class="article_image" src="images/prova_articolo.jpg" /></div>
                <div class="horiz_bar"></div>
                <div class="article_text">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                    </p>
                    <p>
                        Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.
                    </p>
                    <p>
                        Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.
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
                        <img class="news_navigation_link" src="images/links/arrow_left_end.png" onclick="firstArticle();"/>
                    </div>
                    <div class="news_navigation_cell">
                        <img class="news_navigation_link" src="images/links/arrow_left.png" onclick="previousArticle();"/>
                    </div>
                    <div class="news_navigation_cell">
                        <div id="article_counter">
                            <span>1 / 1</span>
                        </div>
                    </div>
                    <div class="news_navigation_cell">
                        <img class="news_navigation_link" src="images/links/arrow_right.png" onclick="nextArticle();" />
                    </div>
                    <div class="news_navigation_cell">
                        <img class="news_navigation_link" src="images/links/arrow_right_end.png" onclick="lastArticle();" />
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
