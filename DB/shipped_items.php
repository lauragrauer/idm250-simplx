<?php
require_once dirname(__DIR__) . '/.env.php';

function insert_shipped_items($order_id, $order_number, $items, $shipped_at) {
    global $connection;
    $stmt = $connection->prepare(
        "INSERT INTO cms_shipped_items (order_id, order_number, unit_id, sku, sku_description, shipped_at)
         VALUES (?, ?, ?, ?, ?, ?)"
    );

    foreach ($items as $item) {
        $stmt->bind_param('isssss', $order_id, $order_number, $item['unit_id'], $item['sku'], $item['description'], $shipped_at);
        $stmt->execute();
    }
}

function get_shipped_items($order_id) {
    global $connection;
    $stmt = $connection->prepare(
        "SELECT * FROM cms_shipped_items WHERE order_id = ?"
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
?>
