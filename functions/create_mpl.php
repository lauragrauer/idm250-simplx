<?php
require_once dirname(__DIR__) . '/DB/mpls.php';
require_once dirname(__DIR__) . '/DB/mpl_items.php';
require_once dirname(__DIR__) . '/DB/inventory.php';

function create_mpl($data, $unit_ids) {
    $mpl_id = insert_mpl($data);

    $units = get_inventory('internal');
    $sku_map = [];
    foreach ($units as $u) {
        $sku_map[$u['unit_id']] = $u['sku'];
    }

    foreach ($unit_ids as $unit_id) {
        $sku = $sku_map[$unit_id] ?? '';
        insert_mpl_item($mpl_id, $unit_id, $sku);
    }

    return $mpl_id;
}
?>
