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

function VasarlasokLekerdez($id){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("SELECT id, user, termek, darab, datum
                                       FROM vasarlasok 
                                       WHERE id = :id");
    $lekerdezes->bindParam(':id',$id);
    $lekerdezes->execute();
    $vasarlasok = $lekerdezes->fetch();
    var_dump($vasarlasok);
    kapcsolatLezar($kapcsolat);
    return $vasarlasok;
}

function VasarlasTorol($termekId){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("DELETE FROM vasarlasok WHERE id = :id");
    $lekerdezes->bindParam(':id',$termekId);
    $sikeres = $lekerdezes->execute();
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}

function VasarlasLekerdez(){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("SELECT id, uset, termek, darab, datum FROM vasarlasok");
    $lekerdezes->execute();
    $vasarlasok = $lekerdezes->fetchAll();
    kapcsolatLezar($kapcsolat);
    return $vasarlasok;
}
function OsszVasarlasokTorol(){
    $kapcsolat = kapcsolat();
    $lekerdezes = $kapcsolat->prepare("DELETE FROM vasarlasok");
    $sikeres = $lekerdezes->execute();
    kapcsolatLezar($kapcsolat);
    return $sikeres;
}
    if(array_key_exists('torol', $_POST)){
        $vasarlasId = $_POST['torol'];
        if(FelhasznaloTorol($vasarlasId)){
            echo "A választott vásárlás sikeresen törlésre került!";
        }
        else{
            echo "A választott vásárlás törlése sikertelen!";
        }
    }
    
?>

<form action="" method="POST">
<table border="2">
    <thead>
        <tr>
            <td>Id</td>
            <td>Név</td>
            <td>Termék</td>
            <td>Darab</td>
            <td>Dátum</td>
            <td>Törlés</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $vasarlasok = VasarlasokLekerdez();
            $vasarlasokDb = count($vasarlasok);
            for($i = 0; $i < $vasarlasokDb;$i++){
                echo '<tr>
                        <td>'.$vasarlasok[$i]['id'].'</td>
                        <td>'.$vasarlasok[$i]['user'].'</td>
                        <td>'.$vasarlasok[$i]['termek'].'</td>
                        <td>'.$vasarlasok[$i]['darab'].'</td>
                        <td>'.$vasarlasok[$i]['datum'].'</td>
                        <td><button type="submit" name="torol" value="'.$vasarlasok[$i]['id'].'">Törlés</button></td>   
                     </tr>';
            }
        
        ?>
    </tbody>
</table>
</form>
