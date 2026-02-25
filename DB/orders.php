<?php
require_once dirname(__DIR__) . '/.env.php';

function get_orders() {
    global $connection;
    $sql = "SELECT * FROM cms_orders ORDER BY created_at DESC";
    $result = $connection->query($sql);
    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    return $orders;
}

function get_order($id) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM cms_orders WHERE id = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function get_order_by_number($order_number) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM cms_orders WHERE order_number = ? LIMIT 1");
    $stmt->bind_param('s', $order_number);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function insert_order($data) {
    global $connection;
    $stmt = $connection->prepare(
        "INSERT INTO cms_orders (order_number, ship_to_company, ship_to_street, ship_to_city, ship_to_state, ship_to_zip, status)
         VALUES (?, ?, ?, ?, ?, ?, 'draft')"
    );
    $stmt->bind_param('ssssss',
        $data['order_number'],
        $data['ship_to_company'],
        $data['ship_to_street'],
        $data['ship_to_city'],
        $data['ship_to_state'],
        $data['ship_to_zip']
    );
    $stmt->execute();
    return $connection->insert_id;
}

function update_order_status($id, $status, $shipped_at = null) {
    global $connection;
    if ($shipped_at) {
        $stmt = $connection->prepare("UPDATE cms_orders SET status = ?, shipped_at = ? WHERE id = ?");
        $stmt->bind_param('ssi', $status, $shipped_at, $id);
    } else {
        $stmt = $connection->prepare("UPDATE cms_orders SET status = ? WHERE id = ?");
        $stmt->bind_param('si', $status, $id);
    }
    $stmt->execute();
}
?>
