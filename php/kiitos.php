<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kiitos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
.keskella{
text-align: center;
}
body {
  background-image: url("menukuvat/black.jpg");
  background-color: rgb(41, 41, 41);
  background-repeat: repeat;
      }
      h2{
      color: rgb(249, 250, 248);
      text-align: center;
      margin-top:40px;
      }

</style>
</head>
<body>
<h2>Kiitos yhteydenotostasi</h2>
<div class="keskella">
      <a href="../php/lueviestit.php" >Lue viestit</a>
      <a href="kirjauduulos.php" style="color:rgb(207, 3, 3);">Kirjaudu ulos</a>
      </div>
<?php
//session_start();
//if (!isset($_SESSION["user_ok"])) {
//    $_SESSION["paluuosoite"]="kiitos.php";
//   header("location:kirjaudu.php");
//  exit;}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>