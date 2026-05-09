<h2>Beérkezett üzenetek</h2>
<?php if(isset($hiba)) { echo "<p style='color:red;'>$hiba</p>"; } ?>

<table border="1" width="100%" style="border-collapse: collapse; margin-top: 15px;">
    <thead style="background-color: #2e7d32; color: white;">
        <tr>
            <th style="padding: 10px;">Beküldés ideje</th>
            <th style="padding: 10px;">Küldő neve</th>
            <th style="padding: 10px;">Üzenet tartalma</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($uzenetLista)) { ?>
            <?php foreach($uzenetLista as $uz) { ?>
                <tr style="background-color: #f1f8e9; border-bottom: 1px solid #c8e6c9;">
                    <td style="padding: 10px;"><?= $uz['datum'] ?></td>
                    <td style="padding: 10px; font-weight: bold;"><?= htmlspecialchars($uz['kuldo_neve']) ?></td>
                    <td style="padding: 10px;"><?= nl2br(htmlspecialchars($uz['uzenet'])) ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr><td colspan="3" style="padding: 10px; text-align:center;">Még nincs egyetlen üzenet sem az adatbázisban.</td></tr>
        <?php } ?>
    </tbody>
</table>