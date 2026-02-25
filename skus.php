<?php
require_once __DIR__ . '/includes/auth.php';
require_login();
require_once __DIR__ . '/DB/skus.php'; 

$skus = get_skus();
?>
<!DOCTYPE html>
<html>
<head><title>CMS - SKUs</title></head>
<body>
    <h1>SKU Management</h1>
    <p><a href="index.php">Back to Dashboard</a></p>

    <h2>All SKUs (<?= count($skus) ?>)</h2>
    <?php if (empty($skus)): ?>
        <p>No SKUs found.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Ficha</th>
                <th>SKU</th>
                <th>Description</th>
                <th>UOM</th>
                <th>Pieces</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Assembly</th>
                <th>Rate</th>
            </tr>
            <?php foreach ($skus as $s): ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><?= htmlspecialchars($s['ficha']) ?></td>
                <td><?= htmlspecialchars($s['sku']) ?></td>
                <td><?= htmlspecialchars($s['description']) ?></td>
                <td><?= htmlspecialchars($s['uom_primary']) ?></td>
                <td><?= $s['piece_count'] ?></td>
                <td><?= $s['length_inches'] ?></td>
                <td><?= $s['width_inches'] ?></td>
                <td><?= $s['height_inches'] ?></td>
                <td><?= $s['weight_lbs'] ?></td>
                <td><?= htmlspecialchars($s['assembly']) ?></td>
                <td><?= $s['rate'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
