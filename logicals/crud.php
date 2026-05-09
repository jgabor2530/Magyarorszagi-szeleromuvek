<?php

require_once 'config.php';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
} catch(PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$megyeData = ['id' => '', 'nev' => '', 'regio' => ''];

switch($action) {
    case 'delete':
        $id = $_GET['id'];
        try {
            $stmt = $dbh->prepare("DELETE FROM megye WHERE id = :id");
            $stmt->execute([':id' => $id]);
            header("Location: ?crud");
            exit;
        } catch(PDOException $e) {
            if($e->getCode() == 23000) {
                die("<div style='background:#f8d7da; color:#842029; padding:20px; border-radius:8px; max-width:600px; margin:50px auto; font-family:sans-serif;'>
                        <h3>Nem törölhető ez a megye!</h3>
                        <p>Ehhez a megyéhez még tartoznak települések az adatbázisban. Kérjük, először törölje a kapcsolódó településeket (helyszíneket) és tornyokat!</p>
                        <a href='?crud' style='background:#0d6efd; color:white; padding:10px 15px; text-decoration:none; border-radius:4px;'>Vissza a listához</a>
                     </div>");
            } else {
                die("Kritikus Adatbázis hiba: " . $e->getMessage());
            }
        }

    case 'edit':
        $id = $_GET['id'];
        $stmt = $dbh->prepare("SELECT * FROM megye WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $megyeData = $stmt->fetch(PDO::FETCH_ASSOC);
        break;

    case 'save':
        if(isset($_POST['mentes'])) {
            $id = $_POST['id'];
            $nev = $_POST['nev'];
            $regio = $_POST['regio'];

            if($id == '') {
                $stmt = $dbh->prepare("INSERT INTO megye (nev, regio) VALUES (:nev, :regio)");
                $stmt->execute([':nev' => $nev, ':regio' => $regio]);
            } else {
                $stmt = $dbh->prepare("UPDATE megye SET nev = :nev, regio = :regio WHERE id = :id");
                $stmt->execute([':nev' => $nev, ':regio' => $regio, ':id' => $id]);
            }
            header("Location: ?crud");
            exit;
        }
        break;

    case 'list':
    default:
        $stmt = $dbh->query("SELECT * FROM megye ORDER BY id ASC");
        $megyek = $stmt->fetchAll(PDO::FETCH_ASSOC);
        break;
}
?>