<html>
<head>
	<meta charset="UTF-8">
	<title>webapi</title>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="kinezet.css"/>
</head>
<body>
<div id="fejlec">
 <h1>Regisztráció!</h1>
</div>

<div id="regisztracio">
<form action="chp2.php" enctype="multipart/form-data" method="post">
<input type='hidden' name='elozo' value="regisztracio">
<table id ="tabla" border="0" align="center" color="white"cellspacing="20">
    <tr>
        <td>Felhasználó név:</td>
        <td align="left"><input type="text" id="nev" name="nev" size="20"></td>
    </tr>
    <tr>
        <td>E-mail cím:</td>
        <td align="left"><input type="text" id="email" name="email"></td>
    </tr>
	<tr>
        <td>Telefonszám:</td>
        <td align="left"><input type="text" id="telefon" name="telefon"></td>
    </tr>
    <tr>
        <td>Jelszó</td>
        <td align="left"><input type="password" name="jelszo1"></td>
    </tr>
    <tr>
        <td>Jelszó megerősítése: </td>
        <td align="left"><input type="password" id="jelszo2" name="jelszo2" >
     <tr>
         <td>Érvényesítő kód:</td><td><img src="chp.php"><br></td> <!-- A captcha kép -->
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="captcha_code" value="" maxlength="6"></td><!-- A captcha input -->
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Regisztráció" id="reg" name="send"/></td>
    </tr>
</table><br>
</form>
</div>
<a href=bejelentkezes.php?d=5>Vissza</a>
</body>
</html>