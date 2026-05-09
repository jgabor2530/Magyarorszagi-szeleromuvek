<?php
$MAPPA = './uploads/';
$TIPUSOK = array ('.jpg', '.png');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$uzenetek = array();

if (isset($_POST['kuld']) && isset($_SESSION['login'])) {
    foreach($_FILES as $fajl) {
        if ($fajl['error'] == 4) continue; // Nem választott fájlt
        
        if ($fajl['error'] == 1 || $fajl['error'] == 2) {
            $uzenetek[] = " Túl nagy fájl: " . $fajl['name'];
        } elseif (!in_array($fajl['type'], $MEDIATIPUSOK)) {
            $uzenetek[] = " Nem megfelelő típus: " . $fajl['name'];
        } else {
            $vegsohely = $MAPPA . strtolower($fajl['name']);
            if (file_exists($vegsohely)) {
                $uzenetek[] = " Már létezik ilyen nevű fájl: " . $fajl['name'];
            } else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenetek[] = " Sikeres feltöltés: " . $fajl['name'];
            }
        }
    }
}

$kepek = array();
if (is_dir($MAPPA)) {
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA . $fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[] = $MAPPA . $fajl;
            }
        }
    }
    closedir($olvaso);
}
?>