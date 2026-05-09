<?php if($action == 'list'): ?>
    <h2 style="text-align: center;">CRUD OPERATIONS (Megyék)</h2>
    <a href="?crud&action=add" class="btn btn-primary" style="margin-bottom: 15px;">Add Megye</a>
    
    <table class="crud-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Név</th>
                <th>Régió</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($megyek as $m): ?>
                <tr>
                    <td style="font-weight: bold;"><?= $m['id'] ?></td>
                    <td style="font-weight: bold;"><?= htmlspecialchars($m['nev']) ?></td>
                    <td><?= htmlspecialchars($m['regio']) ?></td>
                    <td>
                        <a href="?crud&action=edit&id=<?= $m['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="?crud&action=delete&id=<?= $m['id'] ?>" class="btn btn-danger" onclick="return confirm('Biztosan törli?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php elseif($action == 'add' || $action == 'edit'): ?>

    <h2><?= ($action == 'add') ? 'Új megye hozzáadása' : 'Megye szerkesztése' ?></h2>
    
    <form action="?crud&action=save" method="POST" style="max-width: 500px;">
        <input type="hidden" name="id" value="<?= $megyeData['id'] ?>">
        
        <label>Megye neve:</label>
        <input type="text" name="nev" value="<?= htmlspecialchars($megyeData['nev']) ?>" required>
        
        <label>Régió:</label>
        <input type="text" name="regio" value="<?= htmlspecialchars($megyeData['regio']) ?>" required>
        
        <br>
        <input type="submit" name="mentes" class="btn btn-primary" value="Mentés">
        <a href="?crud" class="btn btn-danger" style="margin-left: 10px;">Mégse</a>
    </form>
<?php endif; ?>