<?php
/** 
 * @var informasi untuk koneksi database 
 */
$dbhost = 'localhost';
$dbuser = 'dapps';
$dbpass = 'l1m4d1g1t';
$dbname = 'dapps_joker_pertamina_lesehan2018';

mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);
 
/** koneksi ke database */
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 
// check koneksi
if ($db->connect_error) {
    die('Oops!! Terjadi error : ' . $db->connect_error);
}

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);