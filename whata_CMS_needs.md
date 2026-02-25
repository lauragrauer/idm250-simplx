# What CMS (us) NEEDS from WMS
## Values for our .env.php:

'WMS_API_URL' => '???'    // we need their endpoint URL
'WMS_API_KEY' => '???'    // we need their API key to send with our requests

That's it. Just their URL and their key.

<!-- -o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o- -->
<!-- -o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o- -->

## When they confirm an MPL, we expect this in our $data:

$data['action'] === 'confirm'
$data['reference_number']

THEY NEED TO SEND "action": "confirm" EXACTLY!! Otherwise it gets an error. 

<!-- -o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o- -->
<!-- -o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o-o- -->

## When they ship an order, we expect this in our $data:

$data['action'] === 'ship'
$data['order_number']
$data['shipped_at']

THEY NEED TO SEND "action": "ship" EXACTLY!! Otherwise it gets an error.