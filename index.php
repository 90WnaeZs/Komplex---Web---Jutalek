<?php
session_start();
require "DB.php";

if(isset($_SESSION["username"]))
{
    session_destroy();
}

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submit"]))
{
    $user=$_POST["username"];
    $pw=$_POST["password"];
    $db=new DB_Class();
    $db->Connection("jutalek");
    if($db->Login($user,$pw))
    {
        $_SESSION["username"]=$user;
        header("Location: kimutat.php");
    }
    else
    {
        $db->con->null;
        session_destroy();
        echo "<script>alert('Nem sikerült belépni!')</script>";
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
    <script src="ellenorzes.js"></script>
</head>

<body class="gray_background">
<div id="container" class="container-fluid">
    <div class="header">Belépés</div>
    <div id="div_form" class="justify-content-center pad20">
    
        <form action="" method="POST">
                <div class="form-group">
                <label for="username">Felhasználónév</label>
                <input type="text" class="form-control" name="username" id="username" required minlength="0">
                </div>

                <div class="form-group">
                <label for="password">Jelszó</label>
                <input type="password" class="form-control" name="password" id="password" required minlength="0">
                <br>
                <button type="submit" class="btn btn-primary top_marg20" name="submit" id="submit">Belépés</button>
                </div>
        </form>
    </div>


</div>
</body>

</html>