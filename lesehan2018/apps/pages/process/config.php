<?Php
///////// Database Details change here  ////
$dbhost_name = "localhost";
$database = "dapps_joker_pertamina_lesehan2018";
$username = "dapps";
$password = "l1m4d1g1t";
//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage();
die();
}
?>