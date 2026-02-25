<?php
require_once dirname(__DIR__) . '/DB/orders.php';
require_once dirname(__DIR__) . '/DB/order_items.php';
require_once dirname(__DIR__) . '/DB/inventory.php';

function create_order($data, $unit_ids) {
    $order_id = insert_order($data);

    $units = get_inventory('warehouse');
    $sku_map = [];
    foreach ($units as $u) {
        $sku_map[$u['unit_id']] = $u['sku'];
    }

    foreach ($unit_ids as $unit_id) {
        $sku = $sku_map[$unit_id] ?? '';
        insert_order_item($order_id, $unit_id, $sku);
    }

    return $order_id;
}
?>
