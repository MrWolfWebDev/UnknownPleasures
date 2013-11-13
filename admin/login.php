

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/adminstyle.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <form class="span4 offset4" action="login.php" method="post">

                    <?php
                    session_start();
                    if (count($_POST)) {

                        //Dati accesso db
                        include('../php/db_account.php');
                        //effettuo l'inserimento sul database
                        include('../php/db_connect.php');
                        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
                            $user = filter_var($_POST['user'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            $pass = filter_var($_POST['pass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                            $sql = "SELECT `IdUser` FROM `admins` WHERE `User`='$user' AND `Password`=SHA1('$pass')";
                            mysql_query($sql);

                            if (mysql_affected_rows() > 0) {
                                $_SESSION['auth'] = 1;
                                $_SESSION['user'] = $user;

                                header("location:index.php");
                            } else {
                                echo "<div class='alert alert-error'>Nome utente o password errati</div>";
                            }
                        } else {
                            echo "<div class='alert'>Devi inserire tutti i campi</div>";
                        }
                    }
                    ?>

                    <h2>Effettua il login</h2>
                    <input type="text" class="input-block-level" name="user" placeholder="Nome Utente" />
                    <input type="password" class="input-block-level" name="pass" placeholder="Password"/>
                    <input class="btn btn-large btn-primary" type="submit" name="submit" value="Login"  />
                </form>
            </div>
        </div>
    </body>
</html>

