<?php
if(!isset($_SESSION['login'])) {
    header("Location: ?belepes");
    exit;
}

$uzenetLista = [];
require_once 'config.php';
try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password,
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    $sql = "SELECT kuldo_neve, uzenet, datum FROM uzenetek ORDER BY datum DESC";
    $stmt = $dbh->query($sql);
    $uzenetLista = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>