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
                    <input id="lens" type="image" src="images/lens.png" name="submit" alt="Cerca"><input id="search_text" onclick="clickclear( this, 'cerca..' );" onblur="clickrecall( this, 'cerca..' );" type="text" value="cerca..">
                </div>
            </form>
            <div class="horiz_bar"></div>
            <div class="catalogo_text">
                <p>
                    Lorem ipsum dolor sit amet, <br/> consectetur adipisicing elit,<br/> sed do eiusmod tempor incididunt ut labore <br/> dolore magna aliqua. <br/> Ut enim ad minim veniam, <br/> quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br/> Duis aute irure dolor in reprehenderit in voluptate <br/> velit esse cillum dolore eu fugiat nulla pariatur. <br/>Excepteur sint occaecat cupidatat non proident, <br/>sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </body>
</html>
