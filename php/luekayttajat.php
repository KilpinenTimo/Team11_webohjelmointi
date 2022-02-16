<?php
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


$tulos=mysqli_query($yhteys, "select tunnus, nimi from vieraskirja");

print "<table border='2px'>";

print "<th>tunnus <th>nimi ";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<tr><th>$rivi->tunnus <th align=right>$rivi->nimi";
}
print "</table>";
//Suljetaan tietokantayhteys
mysqli_close($yhteys);

?>
<p>
<form action="../html/rekisteroidy.html">
<input type="submit" value="rekisteroidy" />
 </form>