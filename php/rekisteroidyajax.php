<?php
// TARKISTAA ONKO KENTAT TAYTETTY - MITEN TARKISTETAAN VAIN OSA...
$json=isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user=tarkistaJson($json))){
    print "Pakollinen tieto puuttuu";
    exit;
}

// JOS KENTÄT ON KUN KUNNOSSA, TARKISTAAN KANTAYHTEYS

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
   $initials=parse_ini_file("../.ht.asetukset.ini");
   $yhteys=mysqli_connect($initials["databaseserver"], $initials["username"], $initials["password"], $initials["database"]);
   // $yhteys=mysqli_connect("db", "root", "password", "vieraskirja");
    // "localhost", "TRTKP21A3_11", "WTv6R5ge", "wp_TRTKP21A3_11");

}
catch(Exception $e){
    print "Yhteysvirhe";
    exit;
}

//sql-lause, jossa kysymysmerkeilla osoitetaan paikat
//joihin laitetaan muuttujien arvoja.
$sql="insert into vieraskirja (tunnus, salasana, nimi, sposti, osoite, kaupunki, puhelin) values(?, SHA2(?, 256),?,?,?,?,?)";

try{
    $stmt=mysqli_prepare($yhteys, $sql);
    //tarkisteteen tunnus ja salasana. vai pitääkö tässä olla kaikki tiedot. 
   
    mysqli_stmt_bind_param($stmt, 'sssssss', $user->tunnus, $user->salasana, $user->nimi, $user->sposti, $user->osoite, $user->kaupunki, $user->puhelin);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    //print $json;   
    //include "../html/sisaan.html";
    print "ohjataan kirjautusmissivulle";
    
   
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
   if (empty($user->tunnus) || empty($user->salasana) || empty($user->sposti)){
        return false;
    }
    return $user;
}
?>