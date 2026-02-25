<?php
require_once dirname(__DIR__) . '/.env.php';

function get_mpls() {
    global $connection;
    $sql = "SELECT * FROM cms_mpls ORDER BY created_at DESC";
    $result = $connection->query($sql);
    $mpls = [];
    while ($row = $result->fetch_assoc()) {
        $mpls[] = $row;
    }
    return $mpls;
}

function get_mpl($id) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM cms_mpls WHERE id = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function get_mpl_by_reference($reference_number) {
    global $connection;
    $stmt = $connection->prepare("SELECT * FROM cms_mpls WHERE reference_number = ? LIMIT 1");
    $stmt->bind_param('s', $reference_number);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function insert_mpl($data) {
    global $connection;
    $stmt = $connection->prepare(
        "INSERT INTO cms_mpls (reference_number, trailer_number, expected_arrival, status)
         VALUES (?, ?, ?, 'draft')"
    );
    $stmt->bind_param('sss', $data['reference_number'], $data['trailer_number'], $data['expected_arrival']);
    $stmt->execute();
    return $connection->insert_id;
}

function update_mpl_status($id, $status) {
    global $connection;
    $stmt = $connection->prepare("UPDATE cms_mpls SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $status, $id);
    $stmt->execute();
}
?>
