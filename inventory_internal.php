<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
require_once __DIR__ . '/functions/get_inventory.php';

$units = fetch_internal_inventory();
?>
<!DOCTYPE html>
<html>
<head><title>CMS - Internal Inventory</title></head>
<body>
    <h1>Internal Inventory</h1>
    <p><a href="index.php">Back to Dashboard</a></p>

    <h2>Units at Production Facility (<?= count($units) ?>)</h2>
    <?php if (empty($units)): ?>
        <p>No internal inventory.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Unit ID</th>
                <th>SKU</th>
                <th>Description</th>
                <th>UOM</th>
                <th>Location</th>
            </tr>
            <?php foreach ($units as $u): ?>
            <tr>
                <td><?= $u['unit_id'] ?></td>
                <td><?= $u['sku'] ?></td>
                <td><?= $u['description'] ?></td>
                <td><?= $u['uom_primary'] ?></td>
                <td><?= $u['location'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>