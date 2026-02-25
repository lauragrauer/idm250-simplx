<?php
require_once dirname(__DIR__) . '/.env.php';

function get_order_items($order_id) {
    global $connection;
    $stmt = $connection->prepare(
        "SELECT oi.*, s.description
         FROM cms_order_items oi
         LEFT JOIN cms_skus s ON oi.sku = s.sku
         WHERE oi.order_id = ?"
    );
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    return $items;
}

function insert_order_item($order_id, $unit_id, $sku) {
    global $connection;
    $stmt = $connection->prepare("INSERT INTO cms_order_items (order_id, unit_id, sku) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $order_id, $unit_id, $sku);
    $stmt->execute();
}
?>
