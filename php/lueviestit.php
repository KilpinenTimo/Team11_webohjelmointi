<?php
session_start();
if (!isset($_SESSION["kayttaja"])) {
    $_SESSION["paluuosoite"]="lueviestit.php";
   header("location:kirjaudu.php");
  exit;}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lue viestit</title>
<link href="../css/allcss.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
      body {
  background-image: url("menukuvat/black.jpg");
  background-color: rgb(41, 41, 41);
  background-repeat: repeat;
      }
   .vaalea{
    color: rgb(249, 250, 248);
    font: 14px;
    margin:auto;
   margin-top:30px;
   margin-left:40%;
    }
    .keskella{
   text-align: center;
       border:1;
       background-color:rgb(167, 154, 154);
       padding:15px;
       }
</style>
</head>
<body>


<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $yhteys=mysqli_connect("db","root","password","yhteydenotto");
} catch (Exception $e) {
    header("location:../html/Yhteysvirhe.html");
    exit;
}
$tulos=mysqli_query($yhteys, "select * from yhteydenotto");
 
?>
<div class="vaalea">
<?php
print"<ol>";
while ($rivi=mysqli_fetch_object($tulos)) {
   print"<li>$rivi->nimi $rivi->email $rivi->puhelinnumero $rivi->viesti";
}
print "</ol>";
mysqli_close($yhteys);
?>

</div>
<div class="keskella">
 <a href="../php/viesti.php" >Kirjoita viesti</a>
 <a href="../php/kirjauduulos.php" style="color:rgb(207, 3, 3);" >Kirjaudu ulos</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>