<?php
$hiba = "";
$sikeres = false;

if(isset($_POST['kuld'])) {
    $nev = $_POST['nev'];
    $uzenet = $_POST['uzenet'];
    if(trim($nev) === "" || trim($uzenet) === "") {
        $hiba = "Szerveroldali hiba: Minden mező kitöltése kötelező!";
    } else {
        require_once 'config.php';
        try {
            $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password,
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $kuldo = (isset($_SESSION['login'])) ? $nev : "Vendég";
            $sqlInsert = "INSERT INTO uzenetek (kuldo_neve, uzenet) VALUES (:kuldo, :uzenet)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':kuldo' => $kuldo, ':uzenet' => $uzenet));
            $sikeres = true;
        } catch(PDOException $e) {
            $hiba = "Hiba az adatbázis kapcsolatban: " . $e->getMessage();
        }
    }
}
?>