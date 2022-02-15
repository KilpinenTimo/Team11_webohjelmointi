<?php
// TARKISTAA ONKO KENTAT TAYTETTY - MITEN TARKISTETAAN VAIN OSA...
$json=isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user=tarkistaJson($json))){
    print "Kentät täytettävä";
    exit;
}

// JOS KENTÄT ON KUN KUNNOSSA, TARKISTAAN KANTAYHTEYS

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "vieraskirja");
}
catch(Exception $e){
    print "Yhteysvirhe";
    exit;
}

//sql-lause, jossa kysymysmerkeilla osoitetaan paikat
//joihin laitetaan muuttujien arvoja.
$sql="insert into kayttaja (tunnus, salasana, nimi, sposti, osoite, kaupunki, puhelin) values(?, SHA2(?, 256), ?,?,?,?,?)";//sama kuin SHA2(?, 0)

try{
    $stmt=mysqli_prepare($yhteys, $sql);
    //tarkisteteen tunnus ja salasana. vai pitääkö tässä olla kaikki tiedot. 
   
    mysqli_stmt_bind_param($stmt, 'ss', $user->tunnus, $user->salasana);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    print $json;

    include "../html/kiitos.html";
   

}
catch(Exception $e){
    print "Tunnus jo olemassa tai muu virhe!";
}

?>


<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $user=json_decode($json, false);
    if (empty($user->tunnus) || empty($user->salasana)){
        return false;
    }
    return $user;
}
?>