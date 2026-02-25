<?php
require_once dirname(__DIR__) . '/.env.php';

function get_skus() {
    global $connection;
    $sql = "SELECT * FROM cms_skus ORDER BY sku";
    $result = $connection->query($sql);
    $skus = [];
    while ($row = $result->fetch_assoc()) {
        $skus[] = $row;
    }
    return $skus;
}

function get_sku_by_code($sku_code) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM cms_skus WHERE sku = ? LIMIT 1");
    $stmt->bind_param('s', $sku_code);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>
