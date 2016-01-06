<html>
<head>
	<meta charset="UTF-8">
	<title>webapi</title>
    <link rel="stylesheet" type="text/css" href="kinezet.css"/>
</head>

<body>
<div id="fejlec">
 <h1>Belépés!</h1>
</div>

</div>
<div id="regisztracio">
<form method="post" action="chp2.php">
<input type='hidden' name='elozo' value="login">
<table id ="tabla" border="0" align="center" color="white"cellspacing="20">
    <tr>
        <td>Felhasználó név:</td><td align="left"><input type="text" id="nev" name="nev" size="20"></td>
    </tr>
    <tr>
        <td>Jelszó</td><td align="left"><input type="password" id="jelszo" name="jelszo"></td>
    </tr>
     <tr>
         <td>Érvényesítő kód:</td><td><img src="chp.php"><br></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="captcha_code" value="" maxlength="6"></td>
    </tr>
    <tr>    
        <td colspan="2"><input type="submit" value="BELÉPÉS" name="send"></td>
    </tr>
    <tr>
        <td colspan="2"><p>Még nem regisztráltál? Kattints <a href=regisztracio.php?d=7><strong>ide!</strong></a></p></td>
    </tr>
    
</table><br>
<br>

</form>
</div>
</body>
</html>