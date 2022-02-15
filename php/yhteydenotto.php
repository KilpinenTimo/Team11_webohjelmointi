<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$nimi=isset($_POST["nimi"]) ? $_POST["nimi"]: "";
$email=isset($_POST["email"]) ? $_POST["email"]:"";
$puhelinnumero=isset($_POST["puhelinnumero"]) ? $_POST["puhelinnumero"]:"";
$viesti=isset($_POST["viesti"]) ? $_POST["viesti"]:"";

if (empty($nimi) ||empty($email) || empty($puhelinnumero) || empty($viesti) ) {
    header("location:../html/kirjaudu.html");
    exit;
}

try {
    $yhteys=mysqli_connect("db","root","password","yhteydenotto");
}
catch (Exception $e){
    header("location:../html/Yhteysvirhe.html");
    exit;
}

$sql="insert into yhteydenotto (nimi, email, puhelinnumero, viesti) values(?, ?, ?, ?)";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'ssss', $nimi, $email,$puhelinnumero,$viesti);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
?>
<?php 
header("location:../html/kiitos.html");

?>