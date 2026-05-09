<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ablakcim['cim'] . (isset($fejlec['motto']) ? ' | ' . $fejlec['motto'] : '') ?></title>
    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <header>
            <div style="display: flex; align-items: center;">
                <img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
                <div>
                    <h1><?= $fejlec['cim'] ?></h1>
                    <?php if (isset($fejlec['motto'])) { ?><i><?= $fejlec['motto'] ?></i><?php } ?>
                </div>
            </div>
            <?php if(isset($_SESSION['login'])) { ?>
                <div class="login-info">Bejelentkezett: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong></div>
            <?php } ?>
        </header>
        
        <nav>
            <ul>
                <?php foreach ($oldalak as $url => $oldal) { ?>
                    <?php if((!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1])) { ?>
                        <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                        <a href="<?= ($url == '/') ? '.' : '?'.$url ?>"><?= $oldal['szoveg'] ?></a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </nav>
        
        <div id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
        
        <footer>
            <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
            <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
        </footer>
    </div>
</body>
</html>