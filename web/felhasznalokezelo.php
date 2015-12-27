<?php
function kapcsolat(){
    // még nincs meg az adatbázis neve
     $kapcsolat = new PDO('mysql:dbname=;host=localhost','root','');
     $kapcsolat->exec("set names utf8");
     return $kapcsolat;
     
}

function kapcsolatLezar($kapcsolat){
    $kapcsolat = null;
}

function ParameterekElokeszit($parameterek){
    $sqlParameterek = [];
    foreach($parameterek as $kulcs => $ertek){
        $sqlParameterek[':'.$kulcs] = $ertek;
    }
    return $sqlParameterek;
}
function FelhasznaloLekerdez($id){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("SELECT id, nev, email, telefon
                                       FROM felhasznalok 
                                       WHERE id = :id");
    $lekerdezes->bindParam(':id',$id);
    $lekerdezes->execute();
    $felhasznalok = $lekerdezes->fetch();
    var_dump($felhasznalok);
    kapcsolatLezar($kapcsolat);
    return $felhasznalok;
}

function FelhasznaloTorol($felhasznaloId){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("DELETE FROM felhasznalo WHERE id = :id");
    $lekerdezes->bindParam(':id',$felhasznaloId);
    $sikeres = $lekerdezes->execute();
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}

function FelhasznaloRogzit($parameterek){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("INSERT INTO felhasznalo (nev, jelszo, email, telefon)
                                          VALUES(:nev, :email, :telefon)");
   
    $sqlParametek = ParameterekElokeszit($parameterek);
    $sikeres = $lekerdezes->execute($sqlParametek);
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}

function FelhasznalokLekerdez(){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("SELECT id, nev, email, telefon FROM felhasznalok");
    $lekerdezes->execute();
    $felhasznalok = $lekerdezes->fetchAll();
    kapcsolatLezar($kapcsolat);
    return $felhasznalok;
}
function OsszFelhasznaloTorol(){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("DELETE FROM felhasznalok");
    $sikeres = $lekerdezes->execute();
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}
    if(array_key_exists('torol', $_POST)){
        $felhasznaloId = $_POST['torol'];
        if(FelhasznaloTorol($felhasznaloId)){
            echo "A választott felhasználó sikeresen törlésre került!";
        }
        else{
            echo "A választott felhasználó törlése sikertelen!";
        }
    }
    
    if(array_key_exists('ujFelhasznalo', $_POST)){
        $parameterek = [
            'nev'   =>  $_POST['nev'],
            'jelszo'  => $_POST['jelszo'],
            'email'   => $_POST['email'],
            'telefon'     => $_POST['telefon']            
        ];
        
        if(FelhasznaloRogzit($parameterek)){
            echo "Sikeres felhasznaló rögzítés!";
        }
        else{
            echo "Sikertelen rögzítés!";
        }
    }
    
    
?>
<form action="" method="POST">
    <label for="nev">Név:</label>
    <input type="text" name="nev" value=""/><br/>
    
    <label for="szulhely">Jelszó</label>
    <input type="password" name="jelszo" value=""/><br/>
    
    <label for="email">E-mail:</label>
    <input type="text" name="email" value=""/><br/>
    
    <label for="email">Telefon:</label>
    <input type="tel" name="telefon" value=""/><br/>
    <button type="submit" name="ujTag">Mentés</button>
    <button type="reset" name="reset">Alaphelyzetbe állít</button>
</form>

<form action="" method="POST">
    <button type="submit" name="ossztorol">Összes rekord törlése</button>
</form>
<?php
    if(array_key_exists('ossztorol', $_POST)){
        if(OsszFelhasznaloTorol()){
            echo "Sikeres törlés";
        }
        else{
            echo "Sikertelen törlés";
        }
    }
?>


<form action="" method="POST">
<table border="2">
    <thead>
        <tr>
            <td>Id</td>
            <td>Név</td>
            <td>E-mail</td>
            <td>Telefon</td>
            <td>Felhasználó törlése</td>
            <td>Felhasználó módosítása</td>
        </tr>
    </thead>
    <tbody>
        <?php
//        még nem pontosak a oszlopnevek
            $felhasznalok = FelhasznalokLekerdez();
            $felhasznalokDb = count($felhasznalok);
            for($i = 0; $i < $felhasznalokDb;$i++){
                echo '<tr>
                        <td>'.$felhasznalok[$i]['id'].'</td>
                        <td>'.$felhasznalok[$i]['nev'].'</td>
                        <td>'.$felhasznalok[$i]['telefon'].'</td>
                        <td>'.$felhasznalok[$i]['email'].'</td>
                        <td><button type="submit" name="torol" value="'.$felhasznalok[$i]['id'].'">Törlés</button></td>
                        <td><button type="submit" name="modosit" value="'.$felhasznalok[$i]['id'].'">Modosít</button></td>    
                     </tr>';
            }
        
        ?>
    </tbody>
</table>
</form>
