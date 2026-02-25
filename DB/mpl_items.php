<?php
require_once dirname(__DIR__) . '/.env.php';

function get_mpl_items($mpl_id) {
    global $connection;
    $stmt = $connection->prepare(
        "SELECT mi.*, s.description
         FROM cms_mpl_items mi
         LEFT JOIN cms_skus s ON mi.sku = s.sku
         WHERE mi.mpl_id = ?"
    );
    $stmt->bind_param('i', $mpl_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}

function insert_mpl_item($mpl_id, $unit_id, $sku) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO cms_mpl_items (mpl_id, unit_id, sku) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $mpl_id, $unit_id, $sku);
    $stmt->execute();
}
?>
