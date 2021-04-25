<?php

class DB_Class
{
    protected $host;
    protected $username;
    protected $password;
    protected $con;

    function __construct()
    {
        $this->host="localhost";
        $this->username="root";
        $this->password="";
    }

    function __destruct()
    {

    }

    function Connection($dbname)
    {
        try
        {
            $this->con=new PDO("mysql:host=$this->host;dbname=$dbname",$this->username,$this->password);
            $this->con->exec("set names utf-8");
        }
        catch(PDOException $e)
        {
            die("Hiba".$e);
        }
    }

    function Login($username,$pwd)
    {
        $success=false;

        $res=$this->con->prepare("SELECT * FROM users WHERE Nev= :pNev AND Jelszo= :pJelszo");

        $res->bindparam("pNev",$username);
        $res->bindparam("pJelszo",$pwd);

        $row=$res->execute();
        $row=$res->fetch();

        if($row>0)
        {
            $success=true;
            $_SESSION["id"]=$row["ID_user"];
        }
        else
        {
            $success=false;
        }

        return $success;
    }


    function Feltoltes()
    {
        $tomb=null;
        $res2=$this->con->prepare("SELECT * FROM jogcimek");

        $row=$res2->execute();
        
        while($row=$res2->fetch())
        {
            $tomb[]=$row;
        }
        return $tomb;
    }

    function Kilistazas($uid,$jogcim)
    {
        $counter=0;
        $uid=$_SESSION["id"];
        //$res=$this->con->prepare("SELECT `jutalekok`.`datum`,`jogcimek`.`jogcim`, `jutalekok`.`kiadas`FROM `jutalekok` LEFT JOIN `jogcimek` ON `jutalekok`.`ID_jogcim` = `jogcimek`.`ID_jogcim`WHERE (`jutalekok`.`ID_user` = :Iduser);");
        $res=$this->con->prepare("SELECT jutalekok.datum,jogcimek.jogcim,jutalekok.jutalek FROM jutalekok JOIN jogcimek ON jutalekok.ID_jogcim=jogcimek.ID_jogcim WHERE jutalekok.ID_user= :pUserID AND jogcimek.ID_jogcim= :pJogcim");
        
        $res->bindparam("pUserID",$uid);
        $res->bindparam("pJogcim",$jogcim);

        $row=$res->execute();
        if($row>0)
        {
            echo "<table class='text-left'>";
            echo "<tr>";
            echo "<th style='width:250px;'>Dátum</th>";
            echo "<th style='width:200px;'>Jogcím</th>";
            echo "<th style='width:100px;'>Összeg</th>";
            echo "</tr>";
            while($row=$res->fetch())
            {
                if($counter<10)
                {
                    echo 
                    "<tr>
                        <td>".$row['datum']."</td>
                        <td>".$row['jogcim']."</td>
                        <td>".$row['jutalek']."</td>
                    </tr>";
                    $counter++;
                }
                
            }
            echo "</table>";
        }
        else
        {
            echo "<script>alert('hiba')</script>";
        }
      
    }

    function Reg($username,$pw1)
    {
        $success=false;

        $res=$this->con->prepare("INSERT INTO users (Nev,Jelszo) VALUES(?,?)");

        $res->bindparam(1,$username);
        $res->bindparam(2,$pw1);

        $row=$res->execute();

        if($row>0)
        {
            $success=true;
            echo "<script>alert('Sikeres regisztráció!')</script>";
        }
        else
        {
            $success=false;
        }

        return $success;
    }

}

?>