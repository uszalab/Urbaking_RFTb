<?php 
session_start();

//ha nincs bejelentkezve senki akkor a bejelentkezés.php-ra irányít
if($_SESSION['nev'] == "")
{
 header('location: bejelentkezes.php');
}
?>


<html>
<head>

<?php include_once ('\weblap\modulok\bootstrap.php');?>
	<meta charset="UTF-8" />
	<title>Termék hozzáadása</title>
    <link rel="stylesheet" type="text/css" href="kinezet.css"/>
</head>
<body>

<div id="fejlec">
   <img id ="logo" src="img/logo1.jpg"/>
   <h1>Rögzítés!</h1>
</div>

<!--
Űrlap, amely egy táblázatot tartalmaz, ahol megadhatjuk a bevinni kívánt adatokat.
   -->
<div id="felvitel">

<form action="felvitel2.php" method="post" enctype="multipart/form-data">
    <h2>Kérem adja meg az adatokat:</h2>
    <table id="felvitel_tb">
        <tr>
            <td>Név:</td>
            <td align="left"><input type="text" id="nev" name="nev" size="20"></td> 
        </tr>
        <tr>
            <td>Termék:</td>
            <td align="left"><input type="text" id="osztaly" name="osztaly" size="20" min="1"></td>
        </tr>
        <tr>
            <td>Megjegyzes:</td>
            <td align="left"> <input type="text" id="megjegyzes" name="megjegyzes" size="20" min="1"></td>
        </tr>
        <tr>
            <td>Fénykép:</td>
            <td align="left"> <input type="file" id="fenykep" name="fenykep"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"  id="insert"/></td>
        </tr>
    </table>
    <br>
</form>
</div>

<a href=index.php?d=5>Vissza</a>
</body>
</html>