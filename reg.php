<?php

session_start();
require "DB.php";

if(!isset($_SESSION["username"]))
{
    session_destroy();
    header("Location: index.php");
}

if(isset($_POST["reg_user"]) && isset($_POST["pw1"]) && isset($_POST["pw2"]))
{
    $reg_user=$_POST["reg_user"];
    $pw1=$_POST["pw1"];
    $pw2=$_POST["pw2"];

    $db=new DB_Class();

    $db->Connection("jutalek");
    if(strcmp($pw1,$pw2)==0)
    {
        $db->Reg($reg_user,$pw1);
    }
    else
    {
        echo "<script>alert('A két jelszó nem egyezik meg!')</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <title>Jutalékok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="js\jquery.min.js"></script>
    <script src="js\jquery-3.4.1.min.js"></script>
    <script src="ellenorzes.js"></script>
</head>

<body class="gray_background">
<div class="container-fluid justify-content-center greenbck">
    
    <nav class="navbar navbar-expand-sm justify-content-center bg-light">
        <ul class="navbar-nav"> 
            <li class="nav-item">
                <a class="nav-link" href="reg.php">Regisztrálás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Rögzítés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kimutat.php">Kimutatások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Kilépés</a>
            </li>
        </ul>
    </nav>

    <div id="div_reg" class="container-fluid d-flex justify-content-center bg-light">
        <form id="form_reg" action="" method="POST">
            <div class="form-group">
                <label for="reg_user">Felhasználónév</label>
                <input type="text" class="form-control" name="reg_user" id="reg_user" required>
            </div>

            <div class="form-group">
                <label for="pw1">Jelszó</label>
                <input type="password" class="form-control" name="pw1" id="pw1" required>
            </div>

            <div class="form-group">
                <label for="pw2">Jelszó ismét</label>
                <input type="password" class="form-control" name="pw2" id="pw2" required>
            </div>
            <p>test</p>
            <button type="submit" class="btn btn-primary" name="reg_submit" id="reg_submit">Regisztráció</button>
        </form>
    </div>

   


</div>
</body>

</html>