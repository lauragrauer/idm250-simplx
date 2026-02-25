<!-- #### Connection Info -->

Our endpoint URL: https://digmstudents.westphal.drexel.edu/~lg845/cms/functions/update_inventory.php
Our API key: cms-key-456
Every request they send us must be POST with headers Content-Type: application/json and X-API-KEY: cms-key-456

<!-- Fields that arrive when we send them an MPL -->

$data['action'] → 'receive_mpl'
$data['reference_number']
$data['trailer_number']
$data['expected_arrival']
$data['items'] → array, each item has:

['unit_id']
['sku']
['sku_details'] → ALL THE SKU DETAILS CONTAIN...:

['ficha']
['sku']
['description']
['uom_primary']
['piece_count']
['length_inches']
['width_inches']
['height_inches']
['weight_lbs']
['assembly']
['rate']




% Fields that arrive when we send them an order

$data['action'] → 'receive_order'
$data['order_number']
$data['ship_to_company']
$data['ship_to_street']
$data['ship_to_city']
$data['ship_to_state']
$data['ship_to_zip']
$data['items'] → array, each item only has:

['unit_id']



% What they send us when they confirm an MPL

'action' → must be exactly 'confirm'
'reference_number' → must match what we originally sent them

% What they send us when they ship an order

'action' → must be exactly 'ship'
'order_number' → must match what we originally sent them
'shipped_at' → date string like '2025-03-20' (optional, defaults to today)