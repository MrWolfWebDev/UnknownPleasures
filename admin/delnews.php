<?php
session_start();
if ($_SESSION['auth'] == 1):


    include '../php/dbconnection.php';
    include '../php/db.class.php';
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Elimina News</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
            <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
            <link href="css/adminstyle.css" rel="stylesheet" />
        </head>

        <body>
            <div class="container">
                <div class="row">
                    <form class="span10 offset1" enctype="multipart/form-data" action="delnews.php" method="post">
                        <div class="row"><h3>Elimina news</h3></div>
                        <div class="row"><hr></hr></div>

                        <?php
                        $newsDB = new TableNews();

                        $result1 = $newsDB->Title();

                        foreach ($result1 as $news) {
                            echo '<input type="checkbox"  name="news[]" value="',$news[1],'"/> <b>',$news[0],"</b> del <b>",$news[2],"</b>";
                            echo '<br/>';
                        }
                        ?>

                        <div class="row"><hr></hr></div>
                        <div class="row"><input class="btn btn-large btn-primary " type="submit" value="Elimina" name="Delete"/></div>   
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['Delete'])) {
                              
                $deadlist=$_POST['news'];
               
                foreach ($deadlist as $id)
                {
                   $newsDB->delete($id);
                }
                
            }
            
            ?>
        </body>
    </html>
    <?php
else:
    header("location:login.php");
endif;