<?php
require_once dirname(__DIR__) . '/.env.php';

function get_inventory($location = null) {
    global $connection;
    $sql = "SELECT i.*, s.sku, s.description, s.uom_primary
            FROM cms_inventory i
            JOIN cms_skus s ON i.sku_id = s.id";

    if ($location) {
        $sql .= " WHERE i.location = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $location);
    } else {
        $stmt = $connection->prepare($sql);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $units = [];
    while ($row = $result->fetch_assoc()) {
        $units[] = $row;
    }
    return $units;
}

function update_inventory($unit_id, $location) {
    global $connection;
    $stmt = $connection->prepare("UPDATE cms_inventory SET location = ? WHERE unit_id = ?");
    $stmt->bind_param('ss', $location, $unit_id);
    $stmt->execute();
}

function delete_inventory_unit($unit_id) {
    global $connection;
    $stmt = $connection->prepare("DELETE FROM cms_inventory WHERE unit_id = ?");
    $stmt->bind_param('s', $unit_id);
    $stmt->execute();
}
?>
