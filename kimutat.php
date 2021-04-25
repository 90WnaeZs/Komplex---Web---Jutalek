<?php
session_start();
require "DB.php";

if(!isset($_SESSION["username"]))
{
    session_destroy();
    die();
    header("Location: index.php");
}

$db=new DB_Class();
$db->Connection("jutalek");
$tomb_kimut=$db->Feltoltes();

$listara=false;

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

    <div id="lista">
            <form action="" method="POST">
                <select id="jogcim" name="jogcim">
                    <?php 
                        foreach($tomb_kimut as $key)
                        {
                            echo "<option value='".$key['ID_jogcim']."'>".$key['jogcim']."</option>";
                        }
                    ?>
                </select>
            <button type="submit" name="lista_sub" id="lista_sub">Kilistázás</button>
            </form>

        <?php
        if(isset($_POST["lista_sub"]) && isset($_SESSION["username"]) && isset($_POST["jogcim"]))
        {
            $listara=true;
            $db->Kilistazas($_SESSION['id'],$_POST["jogcim"]);
        }
        ?>
            
        
    </div>

   


</div>
</body>

</html>