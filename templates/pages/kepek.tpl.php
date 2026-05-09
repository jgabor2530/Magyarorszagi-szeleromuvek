<h2>Képgaléria</h2>

<?php if (!empty($uzenetek)) { ?>
    <div style="background: #c8e6c9; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
        <?php foreach($uzenetek as $uzenet) echo "<p>$uzenet</p>"; ?>
    </div>
<?php } ?>

<div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 30px;">
    <?php if(!empty($kepek)) { ?>
        <?php foreach($kepek as $kep) { ?>
            <div style="border: 2px solid #2e7d32; padding: 5px; border-radius: 8px;">
                <img src="<?= $kep ?>" alt="Galéria kép" style="height: 150px; border-radius: 4px;">
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>Még nincsenek feltöltött képek.</p>
    <?php } ?>
</div>

<hr style="border: 1px solid #c8e6c9;">

<?php if(isset($_SESSION['login'])) { ?>
    <h3>Új kép feltöltése</h3>
    <form action="?kepek" method="POST" enctype="multipart/form-data">
        <label>Válasszon képet (JPG, PNG):</label>
        <input type="file" name="kep" accept="image/jpeg, image/png" required>
        <br><br>
        <input type="submit" name="kuld" value="Feltöltés">
    </form>
<?php } else { ?>
    <p style="color: #d32f2f; font-weight: bold;">Képfeltöltéshez kérjük, jelentkezzen be!</p>
<?php } ?>