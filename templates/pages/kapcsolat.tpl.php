<?php if(isset($sikeres) && $sikeres) { ?>
    <h2>Köszönjük az üzenetet!</h2>
    <div style="background: #e8f5e9; padding: 15px; border-left: 5px solid #2e7d32; border-radius: 4px;">
        <p><strong>Elküldött név:</strong> <?= htmlspecialchars($_POST['nev']) ?></p>
        <p><strong>Elküldött üzenet:</strong><br><?= nl2br(htmlspecialchars($_POST['uzenet'])) ?></p>
    </div>
<?php } else { ?>

    <h2>Lépjen velünk kapcsolatba!</h2>
    <?php if(isset($hiba) && $hiba != "") { echo "<p style='color:red; font-weight:bold;'>$hiba</p>"; } ?>
    
    <form name="kapcsolatForm" action="?kapcsolat" method="POST" onsubmit="return jsEllenorzes();">
        <label for="nev">Név:</label>
        <input type="text" name="nev" id="nev" value="<?= isset($_SESSION['login']) ? $_SESSION['csn'].' '.$_SESSION['un'] : '' ?>">

        <label for="uzenet">Üzenet:</label>
        <textarea name="uzenet" id="uzenet" rows="5"></textarea>

        <input type="submit" name="kuld" value="Üzenet küldése">
    </form>

    <script>
        function jsEllenorzes() {
            let nev = document.getElementById("nev").value;
            let uzenet = document.getElementById("uzenet").value;
            
            if(nev.trim() === "") { 
                alert("Kliensoldali ellenőrzés: A név megadása kötelező!"); 
                return false; 
            }
            if(uzenet.trim() === "") { 
                alert("Kliensoldali ellenőrzés: Az üzenet megadása kötelező!"); 
                return false; 
            }
            return true;
        }
    </script>
<?php } ?>