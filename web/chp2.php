<?php
session_start();

$_SESSION["nev"] = $_POST["nev"];


$elozo_oldal = $_POST['elozo'];
if (isset($_POST["send"])){
   if (strtolower($_POST["captcha_code"]) == $_SESSION["captcha"])
   {
       if($elozo_oldal == "login")
       {
          $_SESSION["password"] = $_POST["password"];
          header('Location: login.php');
       }
       else if($elozo_oldal == "regisztracio")
       {
            $_SESSION["jelszo1"] = $_POST["jelszo1"];
            $_SESSION["jelszo2"] = $_POST["jelszo2"];
            $_SESSION["email"] = $_POST["email"];
            header('Location: reg3.php');
       }
   
   }else
   {
        if($elozo_oldal == "login")
       {
           print "<script language='javascript'>alert('Hibas ervenyesito kod!');</script>";
           print '<meta http-equiv="refresh" content="0; URL=login.php">';
       }
       else if($elozo_oldal == "regisztracio")
       {
            print "<script language='javascript'>alert('Hibas ervenyesito kod!');</script>";
            print '<meta http-equiv="refresh" content="0; URL=regisztracio.php">';
       }
      
   }
}
?>