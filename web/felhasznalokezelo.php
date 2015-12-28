<?php
function kapcsolat(){
    // phpmyadminban rft néven kell megcsinálni az adatbázist
     $kapcsolat = new PDO('mysql:dbname=rft;host=localhost','root','');
     $kapcsolat->exec("set names utf8");
     return $kapcsolat;
     
}

function kapcsolatLezar($kapcsolat){
    $kapcsolat = null;
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
    
?>

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
        </tr>
    </thead>
    <tbody>
        <?php
            $felhasznalok = FelhasznalokLekerdez();
            $felhasznalokDb = count($felhasznalok);
            for($i = 0; $i < $felhasznalokDb;$i++){
                echo '<tr>
                        <td>'.$felhasznalok[$i]['id'].'</td>
                        <td>'.$felhasznalok[$i]['nev'].'</td>
                        <td>'.$felhasznalok[$i]['telefon'].'</td>
                        <td>'.$felhasznalok[$i]['email'].'</td>
                        <td><button type="submit" name="torol" value="'.$felhasznalok[$i]['id'].'">Törlés</button></td>   
                     </tr>';
            }
        
        ?>
    </tbody>
</table>
</form>
