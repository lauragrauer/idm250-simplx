<?php
require_once dirname(__DIR__) . '/DB/inventory.php';

function fetch_internal_inventory() {
    return get_inventory('internal');
}

function fetch_warehouse_inventory() {
    return get_inventory('warehouse');
}
?>
