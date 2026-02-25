<?php
require_once dirname(__DIR__) . '/DB/inventory.php';
require_once dirname(__DIR__) . '/DB/mpls.php';
require_once dirname(__DIR__) . '/DB/mpl_items.php';
require_once dirname(__DIR__) . '/DB/orders.php';
require_once dirname(__DIR__) . '/DB/order_items.php';
require_once dirname(__DIR__) . '/DB/shipped_items.php';

// Handle incoming JSON POST from WMS
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
    header('Content-Type: application/json');

    $env = require dirname(__DIR__) . '/.env.php';

    $headers = getallheaders();
    $headers = array_change_key_case($headers, CASE_LOWER);
    $api_key = $headers['x-api-key'] ?? '';

    if ($api_key !== $env['X-API-KEY']) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if ($data['action'] === 'confirm' && isset($data['reference_number'])) {
        $mpl = get_mpl_by_reference($data['reference_number']);
        if ($mpl) {
            update_mpl_status($mpl['id'], 'confirmed');
            $items = get_mpl_items($mpl['id']);
            foreach ($items as $item) {
                update_inventory($item['unit_id'], 'warehouse');
            }
            echo json_encode(['success' => true, 'message' => 'MPL confirmed']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'MPL not found']);
        }
        exit;
    }

    if ($data['action'] === 'ship' && isset($data['order_number'])) {
        $order = get_order_by_number($data['order_number']);
        if ($order) {
            $shipped_at = $data['shipped_at'] ?? date('Y-m-d');
            update_order_status($order['id'], 'shipped', $shipped_at);
            $items = get_order_items($order['id']);
            insert_shipped_items($order['id'], $order['order_number'], $items, $shipped_at);
            foreach ($items as $item) {
                delete_inventory_unit($item['unit_id']);
            }
            echo json_encode(['success' => true, 'message' => 'Order ship confirmed']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Order not found']);
        }
        exit;
    }

    http_response_code(400);
    echo json_encode(['error' => 'Unknown action']);
    exit;
}

function send_mpl_to_wms($mpl, $items) {
    $env = require dirname(__DIR__) . '/.env.php';

    $url = $env['WMS_API_URL'];
    $api_key = $env['WMS_API_KEY'];

    $payload = [
        'action' => 'receive_mpl',
        'reference_number' => $mpl['reference_number'],
        'trailer_number' => $mpl['trailer_number'],
        'expected_arrival' => $mpl['expected_arrival'],
        'items' => $items
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n" .
                        "X-API-KEY: " . $api_key . "\r\n",
            'content' => json_encode($payload),
            'ignore_errors' => true
        ]
    ];

    $context = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);
    return json_decode($response, true);
}

function send_order_to_wms($order, $items) {
    $env = require dirname(__DIR__) . '/.env.php';

    $url = $env['WMS_API_URL'];
    $api_key = $env['WMS_API_KEY'];

    $payload = [
        'action' => 'receive_order',
        'order_number' => $order['order_number'],
        'ship_to_company' => $order['ship_to_company'],
        'ship_to_street' => $order['ship_to_street'],
        'ship_to_city' => $order['ship_to_city'],
        'ship_to_state' => $order['ship_to_state'],
        'ship_to_zip' => $order['ship_to_zip'],
        'items' => $items
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n" .
                        "X-API-KEY: " . $api_key . "\r\n",
            'content' => json_encode($payload),
            'ignore_errors' => true
        ]
    ];

    $context = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);
    return json_decode($response, true);
}
?>
