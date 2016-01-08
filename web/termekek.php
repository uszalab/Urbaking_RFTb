<?php
function kapcsolat(){
    // phpmyadminban rft néven kell megcsinálni az adatbázist vagy át kell irni az rftt
     $kapcsolat = new PDO('mysql:dbname=rft;host=localhost','root','');
     $kapcsolat->exec("set names utf8");
     return $kapcsolat;
     
}

function kapcsolatLezar($kapcsolat){
    $kapcsolat = null;
}

function TermekekLekerdez($id){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("SELECT id, nev, tipus, leiras, ar, darabszam
                                       FROM termekek 
                                       WHERE id = :id");
    $lekerdezes->bindParam(':id',$id);
    $lekerdezes->execute();
    $termekek = $lekerdezes->fetch();
    var_dump($termekek);
    kapcsolatLezar($kapcsolat);
    return $termekek;
}

function TermekTorol($termekId){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("DELETE FROM termekek WHERE id = :id");
    $lekerdezes->bindParam(':id',$termekId);
    $sikeres = $lekerdezes->execute();
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}

function TermekLekerdez(){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("SELECT id, nev, tipus, leiras, ar, darabszam FROM termekek");
    $lekerdezes->execute();
    $termekek = $lekerdezes->fetchAll();
    kapcsolatLezar($kapcsolat);
    return $termekek;
}
function OsszTermekekTorol(){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("DELETE FROM termekek");
    $sikeres = $lekerdezes->execute();
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}
    if(array_key_exists('torol', $_POST)){
        $termekId = $_POST['torol'];
        if(FelhasznaloTorol($termekId)){
            echo "A választott termék sikeresen törlésre került!";
        }
        else{
            echo "A választott termék törlése sikertelen!";
        }
    }
    
?>

<form action="" method="POST">
<table border="2">
    <thead>
        <tr>
            <td>Id</td>
            <td>Név</td>
            <td>Tipus</td>
            <td>Leírás</td>
            <td>Ár</td>
            <td>Darabszám</td>
            <td>Törlés</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $termekek = TermekekLekerdez();
            $termekekDb = count($termekek);
            for($i = 0; $i < $termekekDb;$i++){
                echo '<tr>
                        <td>'.$termekek[$i]['id'].'</td>
                        <td>'.$termekek[$i]['nev'].'</td>
                        <td>'.$termekek[$i]['tipus'].'</td>
                        <td>'.$termekek[$i]['leiras'].'</td>
                        <td>'.$termekek[$i]['ar'].'</td>
                        <td>'.$termekek[$i]['darabszam'].'</td>
                        <td><button type="submit" name="torol" value="'.$termekek[$i]['id'].'">Törlés</button></td>   
                     </tr>';
            }
        
        ?>
    </tbody>
</table>
</form>
