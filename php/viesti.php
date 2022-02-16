<?php session_start();
if (!isset($_SESSION["kayttaja"])) {
   $_SESSION["paluuosoite"]="viesti.php";
   header("location:../html/kirjaudusisaan.html");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Kirjoita viesti</title>
<link href="../css/allcss.css" rel="stylesheet" type="text/css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <style>
      body {
  background-image: url("menukuvat/black.jpg");
  background-color: rgb(41, 41, 41);
  background-repeat: repeat;
      }
      h2 {
        color: rgb(34, 34, 34);
      }
      .mb-3{
     color: rgb(34, 34, 34);
      }
       .col-4{
       max-height: 500px; max-width: 400px;
       margin:auto;
       width:60%;
       margin-top:20px;
       }
      a{
       color: rgb(249, 250, 248);
       align:center;
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

<div class="container">
    <div class="row">
 <div class="col-4 justify-content-center">                                         
        <h2>Ota meihin yhteyttä</h2>
        <br>
        <form action='../php/yhteydenotto.php' method='post'>
        <div class="mb-3">
          <label for="name" class="form-label">Nimi</label><br>
          <input type="text" class="form-controll" name="nimi" placeholder="Matti Meikäläinen">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Sähköposti</label>
            <input type="email" class="form-control" name="email" placeholder="nimi@esimerkki.fi">
          </div>
          <div class="mb-3">
          <label for="number" class="form-label">Puhelinnumero</label>
          <input type="tel" class="form-control" name="puhelinnumero" placeholder="1234567890">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Viesti</label>
            <textarea class="form-control" name="viesti" placeholder="Kirjoita tähän" rows="3"></textarea>
          </div>
          <input type="submit" name=´ok´ value="Lähetä viesti">
      </div>
      </form>
      </div>
      </div>
      </div> 
      <br>
      <div class="keskella">
      <a href="../php/lueviestit.php" >Lue viestit</a>
      &nbsp;&nbsp
      <a href="../php/kirjauduulos.php" style="color:rgb(207, 3, 3);" >Kirjaudu ulos</a>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>