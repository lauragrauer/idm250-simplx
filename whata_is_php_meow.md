# DEFINITIONS

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Variable ❤︎ $something
* labeled box that holds a value
* make sure it has that $
* Example - $groundhog = "Phil"; A box labeled "groundhog" is Phil
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## String ❤︎ "obama"
* Just text. Anything wrapped in quotes
* Example - "Phil the groundhog" or 'Phil'
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Integer ❤︎ (int)
* Whole number, no decimals
* Example - 1, 2, 3
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Array ❤︎ ["object1", "object2", "object3"]
* A list of values stored in one variable
* Like a box, can hold multiple
* Example : $genshincharacters = ["diluc", "kaeya", "amber"];
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Associative Array ❤︎ $variable = ["key" => value, "key" => value];
* A list where each item has a label (called a "key") instead of a number

* Like a dictionary - you look things up by NAME, not position

* PRETTY MUCH always has a => somewhere
```
 $product = [
    "name" => "Snail Mucin Essence",
    "brand" => "COSRX",
    "size" => "96ml",
    "price" => 13.99,
    "fungal_safe" => true
    ];
```
* CAN BE ALIGNED HORIZONTALLY TOO... SAME PRINCIPAL
```
$product = ["name" => "Snail Mucin Essence", "brand" => "COSRX"];
echo "{$product['name']} is by {$product['brand']}";
```
* USE SINGLE QUOTES IN DOUBLE QUOTES for that format. The { } wraps the [ ] in
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Function ❤︎ function eatlottasoup() { echo "...";
* Reusable block of code that does one specific job (or multiple if you want)
* You can name it whatever you want, then you run it
```
function eatlottasoup() {
    echo "omg i don't feel so good";
}
```
* YOU CAN TECHNICALLY JUST KEEP ECHOing in that example, but if you ever
wanted to change that specific message, you would have to change it in all
50 spots it was in...

* Want to change the message? Just edit it once in the function

* <b>They are also a lot more useful because they can do more than just print text</b>
```
function calculateSOUPtotal($price, $quantity) {
    return $price * $quantity * 99999999;
}

echo calculateSOUPtotal(123, 2);
```
* During this example, the soup would be the original price ($123) times the quantity ($2) and the number I made up (tax maybe idk lol, 99999999)
* That would echo 24,599,999,754 (123 x 2 x 99999999)
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Parameter/Argument ❤︎
* Parameter - a blank slot where you're creating a function ($soup, $groundhog, $salesmen)
* Argument - the actual value you plug in when you run it ("tomato", "phil", "michael")
```
function introduction($soup, $groundhog, $salesmen) {
    echo "<div class='story'>";
    echo "<h1>The $soup Incident</h1>";
    echo "<p>$groundhog the groundhog sold $soup soup to $salesmen the salesman.</p>";
    echo "</div>";
}
```
```
introduction("tomato", "phil", "michael");
```
* "tomato" → $soup
* "phil" → $groundhog
* "michael" → $salesmen
* THIS IS WHAT IT OUTPUTS BASICALLY :
```
<div class='story'>
    <h1>The tomato Incident</h1>
    <p>phil the groundhog sold tomato soup to michael the salesman.</p>
</div>
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Return ❤︎
* What a function gives BACK to you after its done
```
function = moneyLeft($wallet, $price); {
    return $wallet - $price;
}

$remaining = moneyLeft(50, 13.99);
```
* The $remaining would be 36.01 in this instance
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## If Statement ❤︎
* Checks a condition and decides what to do
* vv jumping from the return section notes to make sense
```
if ($remaining >= 0) {
    echo "You can afford it!";
} else {
    echo "Too expensive!";
}
```
* In this example, PHP does the math and dictates wheter you have enough money (in actually, if the number is > or <)
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Global ❤︎
* Key word that lets a function use a variable created OUTSIDE of the specific file.
* Unless variable is set to "global" functions cannot see outside variables
```
global $groundhog;
```
* let me use the database groundhog from outside the function itself. Here are examples below:
```
$groundhog = "Phil";  // created outside the function vvvvv

function sayHi() {
    global $groundhog;  // now I can use it in here :D
    echo "Hi $groundhog";
}

sayHi();  // Hi Phil
```
* For the example below, the function cannot see the $groundhog
```
$groundhog = "Phil";

function sayHi() {
    echo "Hi $groundhog";  // ❌ doesn't know what $groundhog is.
}
```
* global only matters inside the function. To pull from other files, you use include or require
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## REQUIRE_ONCE & REQUIRED ❤︎
* Loads a PHP file into the current one
* Once = wont load again if it was already loaded
* "Bring me soup.php, but only if I don't have it..."
```
require "soup.php";        // loads file, gives an ERROR and STOPS if missing
require_once "soup.php";   // same but won't load it twice
```
* But why would I need this? Say the db.php as an example. Every php in that would NEED the db to connect to the database. 
### WITHOUT REQUIRED vvv
```
// groundhog.php — paste all this
$db = new PDO("mysql:host=localhost;dbname=soup_shop", "root", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// ... maybe more setup

// soup.php — paste all this AGAIN
$db = new PDO("mysql:host=localhost;dbname=soup_shop", "root", "password");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// ... same stuff again
```
###  WITH REQUIRED vvvv
```
// groundhog.php
require_once "db.php";

// soup.php
require_once "db.php";
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->



<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## ECHO ❤︎
* Takes whatever you give it and pits it on a page
* Can echo variables, htmls, numbers, and a combo of those
* Can echo a function, but usually it can echo on its own usually
```
function sayHi() {
    echo "Hi!";
}

sayHi();       // ✅ prints: Hi!
echo sayHi();  // ❌ weird — it echoes "Hi!" and then echoes nothing
```
* You CANNOT echo an array, objects (Ex. ❌ $person = new stdClass();), nulls, false
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## FOREACH ❤︎
* Goes through an array and does something you want it to do for each item. One at a time.
```
$products = ["Snail Mucin", "Sunscreen", "Toner"];

foreach ($products as $product) {
    echo $product;
}

// prints:
// Snail Mucin
// Sunscreen
// Toner
```
### Here is what is hapening for that specific example above ^^^ 
* $products = the array you're looping through
* as = just a keyword that means "call each one..."
* $product = a temporary name for the current item when using foreach
```
$potatoes = ["Russet", "Red", "Gold"];

foreach ($potatoes as $potato) {
    echo $potato;
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Concatenation ❤︎ ( . and .= ) 
* Gluing strings together
### . is gluing two strings together
```
echo "Hi " . "Obama";           // Hi Obama
echo "I love " . "COSRX";      // I love COSRX
echo "Price: $" . 13.99;       // Price: $13.99
```
### BUT .= adds onto the end of a variable
```
$sql = "SELECT *";

VERSUS

$sql .= " FROM inventory";  ← $sql is now "SELECT * FROM inventory"
```
* It also makes things more readable sometimes
```
$html = "<div class='card'><img src='snail.jpg'><h2>Snail Mucin</h2><p>by COSRX</p><p>$13.99</p></div>";

VERSUS

$html = "<div class='card'>";
$html .= "<img src='snail.jpg'>";
$html .= "<h2>Snail Mucin</h2>";
$html .= "<p>by COSRX</p>";
$html .= "<p>$13.99</p>";
$html .= "</div>";
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## NULL ❤︎
* Means nothing or empty. Like an empty box. A variable exists, but there is no value in it
* Useful when you need to check if the data exists
```
$michael = null;  // user didn't input michael

if ($phone == null) {
    echo "WHERE DID MY BOYFRIEND GO??";
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## BOOLEAN (bool) ❤︎
* Value is either true or false
```
$in_stock = true;
$on_sale = false;
$charlie_is_a_good_dog = false;
$charlie_pooped_in_the_kitchen = true;
```
* Now that you have the boolean, you can use them:
```
if ($charlie_is_a_good_dog) {
    echo "YAAAAA GOOD BOY CHARLIE!";
} else {
    echo "I'm kicking you out of the room today";
}

if ($charlie_pooped_in_the_kitchen) {
    echo "I just took you out...";
} else {
    echo "*pat *pat *pat";
}
``` 
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## JSON ❤︎
* Format for organizing data that both PHP + Javascript can understand
### Looks like:
```
{"name": "Laura", "age": 21}
```
* json_encode() = turns PHP data INTO JSON text
* json_decode() = turns JSON text INTO PHP data
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

---

# NEW DEFINITIONS (from vocab reference)

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Null Coalescing Operator ❤︎ ??
* Means "use this value, BUT if it doesn't exist or is null, use the backup instead"
* Think of it as a safety net
```
$tonight_dinner = $fridge_leftovers ?? "instant ramen";
```
* If $fridge_leftovers exists, you eat that. If not, instant ramen it is.
```
$username = $_POST['username'] ?? "mysterious stranger";
echo "Welcome, $username!";
```
* If the user typed their name in the form, use it. Otherwise they're "mysterious stranger"
```
$shipped_date = $data['shipped_at'] ?? date('Y-m-d');
```
* Use the shipped date if it exists, otherwise just use today's date
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## PHP Tags ❤︎ <?php ?> and <?= ?>
* `<?php ?>` opens and closes a PHP block inside HTML. It's how your HTML file knows "hey, this part is PHP code, not regular text"
* `<?= ?>` is the lazy shortcut version of `<?php echo ?>`. It just prints something directly into your HTML
```
<h1>Welcome to the Soup Shop</h1>
<p>Today's special: <?= $soup_of_the_day ?></p>
```
* That's the same as writing:
```
<p>Today's special: <?php echo $soup_of_the_day; ?></p>
```
* Use `<?= ?>` when you just need to spit out ONE value into your HTML. Use `<?php ?>` when you need to do actual logic (if statements, loops, etc.)
```
<ul>
<?php foreach ($soups as $soup): ?>
    <li><?= $soup ?></li>
<?php endforeach; ?>
</ul>
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Alternative Syntax ❤︎ : and endif; / endforeach;
* When you're mixing PHP with HTML, curly braces `{ }` get confusing fast
* So PHP has a cleaner way: replace `{` with `:` and `}` with `endif;` or `endforeach;`
### Normal way (curly braces):
```
<?php if ($charlie_is_good) { ?>
    <p>Good boy!</p>
<?php } else { ?>
    <p>Bad boy!</p>
<?php } ?>
```
### Cleaner way (colon syntax):
```
<?php if ($charlie_is_good): ?>
    <p>Good boy!</p>
<?php else: ?>
    <p>Bad boy!</p>
<?php endif; ?>
```
* Same thing for foreach:
```
<?php foreach ($geckos as $gecko): ?>
    <div class="gecko-card">
        <h2><?= $gecko['name'] ?></h2>
        <p>Morph: <?= $gecko['morph'] ?></p>
    </div>
<?php endforeach; ?>
```
* Both ways work identically. The colon style is just easier to read when you have a LOT of HTML mixed in
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->



<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Exit ❤︎
* Stops the entire script IMMEDIATELY. Nothing after it runs. Done. Over. Gone.
* Like slamming a door shut on the rest of your code
```
$logged_in = false;

if (!$logged_in) {
    echo "You are NOT supposed to be here!!";
    exit;
}

echo "Welcome to the secret soup recipe";  // this NEVER runs if not logged in
```
* Often used with `header()` to redirect someone and then STOP the page:
```
if (!$logged_in) {
    header('Location: login.php');
    exit;  // without this, PHP keeps running the rest of the page!!
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Comments ❤︎ // and /* */
* Notes to yourself (or future you) that PHP completely ignores
* `//` is for a single line comment
* `/* */` wraps a multi-line comment
```
// this is a single line comment. PHP doesn't care about this line

$gecko = "Mochi";  // you can put them at the end of a line too

/*
    This is a multi-line comment.
    I can write a whole paragraph here
    and PHP will ignore ALL of it.
    Dear future me: don't delete this function.
*/
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Error Suppression ❤︎ @
* Put @ before a function to tell PHP "if this fails, shhhh. Don't show a warning."
* It hides error messages
```
$data = @file_get_contents("https://some-api.com/data");
```
* If that URL doesn't work, PHP won't scream about it. It'll just quietly give you `false`
* Use carefully — sometimes you WANT to know when something breaks!
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Line Break in Headers ❤︎ \r\n
* Carriage return + newline. This is how HTTP headers separate themselves from each other.
* You mostly see this when building custom HTTP requests
```
$headers = "Content-Type: application/json\r\n" .
           "X-API-KEY: abc123\r\n";
```
* Each header needs to end with `\r\n` so the receiving server knows where one header ends and the next one begins. Think of it as pressing Enter between lines in a very strict format
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Superglobals ❤︎ $_POST, $_SERVER, $_SESSION
* Special built-in PHP variables that are available EVERYWHERE — no `global` keyword needed
* They hold info about the user, the request, the form data, etc.

### $_POST
* Contains all the data someone submitted through an HTML form (when the form uses method="POST")
```
<!-- HTML form -->
<form method="POST" action="order.php">
    <input type="text" name="soup_flavor">
    <button type="submit">Order Soup</button>
</form>
```
```
// order.php
$flavor = $_POST['soup_flavor'];
echo "You ordered $flavor soup!";
```
* Whatever the user typed into that input box shows up in `$_POST['soup_flavor']`
* The name="" in the HTML matches the key in $_POST. They HAVE to match.

### $_SERVER
* Contains info about the current page request — like how the user got here
```
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Someone submitted a form!";
} else {
    echo "Someone just loaded the page normally.";
}
```
* `$_SERVER['REQUEST_METHOD']` — was it a GET (just loading the page) or POST (submitting a form)?
* `$_SERVER['CONTENT_TYPE']` — what kind of data was sent? (like 'application/json')

### $_SESSION
* Stores data that follows the user around from page to page. Like a wristband at a theme park — proves who you are as you move around
```
session_start();  // you MUST call this first on every page that uses sessions

$_SESSION['user_id'] = 42;
$_SESSION['username'] = "soupmaster_phil";

// now on ANY other page:
echo "Welcome back, " . $_SESSION['username'];  // Welcome back, soupmaster_phil
```
* Without sessions, every page load is a blank slate — PHP forgets who you are
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## isset() ❤︎
* Checks: "Does this thing exist AND is it NOT null?"
* Returns true or false
```
$gecko_name = "Mochi";
$gecko_color = null;

isset($gecko_name);   // ✅ true — it exists and has a value
isset($gecko_color);  // ❌ false — it exists but it's null
isset($gecko_age);    // ❌ false — doesn't exist at all
```
* Super useful for checking if a form field was actually submitted:
```
if (isset($_POST['soup_flavor'])) {
    echo "You picked: " . $_POST['soup_flavor'];
} else {
    echo "You didn't pick a soup flavor!";
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## empty() ❤︎
* Checks if something is "empty" — which in PHP means: null, empty string "", empty array [], 0, false, or doesn't exist at all
* It's like isset() but stricter — even if the variable exists, if it's blank or zero, it counts as empty
```
$cart = [];

if (empty($cart)) {
    echo "Your cart is empty! Go buy some snail mucin!";
} else {
    echo "You have " . count($cart) . " items in your cart.";
}
```
```
$search = "";

if (empty($search)) {
    echo "You didn't type anything in the search bar...";
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## count() ❤︎
* Counts how many items are in an array. That's it. Simple queen.
```
$skincare_routine = ["cleanser", "toner", "serum", "moisturizer", "sunscreen"];

echo count($skincare_routine);  // 5

echo "You have " . count($skincare_routine) . " steps in your routine!";
// You have 5 steps in your routine!
```
```
$geckos = ["Mochi", "Tofu", "Sesame"];

if (count($geckos) > 2) {
    echo "That's a LOT of geckos...";
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## htmlspecialchars() ❤︎
* Converts special characters into safe HTML text so nobody can inject evil code into your page
* Prevents XSS attacks (Cross-Site Scripting) — when someone types actual HTML or JavaScript into a form trying to hack your site
```
$user_input = "<script>alert('HACKED!!')</script>";

echo $user_input;
// ❌ BAD — this would actually run that script on your page!!

echo htmlspecialchars($user_input);
// ✅ SAFE — outputs the text literally: <script>alert('HACKED!!')</script>
// it shows the text but doesn't EXECUTE it
```
* USE THIS whenever you're displaying data that came from a user (form inputs, database values, etc.)
```
<p>Product: <?= htmlspecialchars($product['name']) ?></p>
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## intval() ❤︎
* Converts something to an integer (whole number). Makes sure it's DEFINITELY a number and not sneaky text
```
$price_input = "13";       // this is a STRING, not a number
$price = intval($price_input);  // now it's the INTEGER 13

$nonsense = "abc";
echo intval($nonsense);    // 0 — can't make a number out of "abc"

$messy = "42dragons";
echo intval($messy);       // 42 — grabs the number from the front and ignores the rest
```
* Useful for form data, because EVERYTHING from a form comes in as a string:
```
$quantity = intval($_POST['quantity']);
// now you can safely do math with it
$total = $quantity * 13.99;
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## header() ❤︎
* Sends an HTTP header to the browser. Most commonly used for REDIRECTING someone to another page, or telling the browser what kind of data you're sending
### Redirecting:
```
// if not logged in, kick them to the login page
if (!$logged_in) {
    header('Location: login.php');
    exit;  // ALWAYS put exit after a redirect!! otherwise PHP keeps going
}
```
### Setting content type:
```
header('Content-Type: application/json');
echo json_encode(["status" => "success", "soup" => "tomato"]);
```
* This tells the browser "hey, I'm sending you JSON data, not a webpage"
* YOU CANNOT call header() after you've already printed/echoed ANYTHING. Headers have to be sent BEFORE any output.
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## date() ❤︎
* Returns the current date and/or time in whatever format you want
```
echo date('Y-m-d');        // 2026-02-25
echo date('m/d/Y');        // 02/25/2026
echo date('l');            // Wednesday (full day name)
echo date('g:i A');        // 3:45 PM
```
### Common format letters:
* Y = full year (2026), m = month (02), d = day (25)
* H = 24-hour (15), g = 12-hour (3), i = minutes (45), A = AM/PM
* l = full day name (Wednesday), F = full month name (February)
```
$today = date('Y-m-d');
echo "Shipped on: $today";  // Shipped on: 2026-02-25
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->



<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## file_get_contents() ❤︎
* Reads the ENTIRE contents of a file or URL and gives it to you as a string
* Can read local files OR fetch data from the internet
### Reading a file:
```
$recipe = file_get_contents("secret_soup_recipe.txt");
echo $recipe;
```
### Reading incoming data (API/webhook):
```
$incoming_json = file_get_contents('php://input');
$data = json_decode($incoming_json, true);
```
* `php://input` is a special thing that reads whatever raw data was sent TO your PHP file (like when an API sends you JSON)

### Fetching from a URL:
```
$response = file_get_contents("https://some-api.com/soups");
$soups = json_decode($response, true);
```
* For fancier requests (with headers, POST data, etc.) you pair it with `stream_context_create()`
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## stream_context_create() ❤︎
* Builds the "settings" for an HTTP request — like what method to use, what headers to send, and what data to include
* You use it WITH `file_get_contents()` to send fancy requests (not just simple GETs)
```
$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n" .
                     "X-API-KEY: my-secret-key-123\r\n",
        'content' => json_encode([
            "soup" => "tomato",
            "quantity" => 3
        ])
    ]
]);

$response = file_get_contents("https://soup-api.com/order", false, $context);
```
* Think of it like packing a box before you ship it: you put the method, headers, and body inside, and THEN `file_get_contents()` actually sends it
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## getallheaders() ❤︎
* Returns ALL the HTTP headers that were sent with the current request, as an associative array
* Useful when you need to check for API keys or content types
```
$headers = getallheaders();
// $headers might look like:
// ["Content-Type" => "application/json", "X-API-KEY" => "abc123", ...]

$api_key = $headers['X-API-KEY'];

if ($api_key != "my-secret-key") {
    echo "WHO ARE YOU. GET OUT.";
    exit;
}
```
* Often paired with `array_change_key_case()` to avoid case sensitivity issues
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## array_change_key_case() ❤︎
* Changes all the keys in an array to either uppercase or lowercase
* Useful because HTTP headers can be sent in any case — "X-API-KEY" and "x-api-key" are technically the same thing but PHP treats them as different array keys
```
$headers = ["X-API-KEY" => "abc123", "Content-Type" => "application/json"];
$headers = array_change_key_case($headers, CASE_LOWER);

// now it's: ["x-api-key" => "abc123", "content-type" => "application/json"]
// so you can always check with lowercase and not worry about how it was sent
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## http_response_code() ❤︎
* Sets the HTTP status code you send back. It's how you tell the browser or API "here's how things went"
* Common codes:
    * 200 = OK, everything's fine
    * 401 = Unauthorized (you're not logged in / bad API key)
    * 403 = Forbidden (you're logged in but not allowed)
    * 404 = Not Found (that page/thing doesn't exist)
    * 500 = Server Error (something broke on our end)
```
// checking an API key
$api_key = $headers['x-api-key'] ?? '';

if ($api_key != "super-secret-soup-key") {
    http_response_code(401);
    echo json_encode(["error" => "Invalid API key. No soup for you!"]);
    exit;
}
```
```
// trying to find a product
if (empty($product)) {
    http_response_code(404);
    echo json_encode(["error" => "Soup not found :("]);
    exit;
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## password_verify() ❤︎
* Checks if a plain text password matches a hashed (encrypted) password
* You NEVER store passwords as plain text in a database. You store a hashed version. This function compares them securely
```
$typed_password = "soupLover99";
$hashed_password = "$2y$10$xJKLz...";  // this is what's stored in the database

if (password_verify($typed_password, $hashed_password)) {
    echo "Welcome back, soup lover!";
} else {
    echo "WRONG PASSWORD. No soup for you.";
}
```
* It returns true if they match, false if they don't
* The partner function is `password_hash()` — that's what you use to HASH a password before saving it:
```
$hashed = password_hash("soupLover99", PASSWORD_DEFAULT);
// save $hashed to the database
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Sessions ❤︎ session_start(), session_destroy(), session_status()
* Sessions are how PHP remembers who someone is across pages. Without them, every page load is a total stranger

### session_start()
* MUST be called at the top of every page that uses `$_SESSION`. It either starts a new session or resumes an existing one
```
session_start();
$_SESSION['username'] = "gecko_queen";
```
* If you forget `session_start()`, `$_SESSION` just won't work. No error, just... empty.

### session_destroy()
* Kills the session. Logs the user out. Poof, gone
```
session_start();  // gotta start it before you can destroy it lol
session_destroy();
echo "You've been logged out! Bye!";
```

### session_status()
* Checks if a session is already running. Returns a number:
    * 0 = sessions are disabled
    * 1 = sessions are enabled but none is active
    * 2 = a session is active right now
```
if (session_status() == 1) {
    session_start();  // only start if one isn't already going
}
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Prepared Statements & ? Placeholders ❤︎
* The safe way to put user data into SQL queries. The `?` is a placeholder that gets filled in later
* This prevents SQL injection — where someone types evil SQL into your form to mess up your database
### WITHOUT prepared statements (DANGEROUS ❌):
```
// if someone types:  ' OR 1=1 --  into the search box... your database is COOKED
$sql = "SELECT * FROM soups WHERE flavor = '$user_input'";
```
### WITH prepared statements (SAFE ✅):
```
$sql = "SELECT * FROM soups WHERE flavor = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param('s', $flavor);  // 's' means string
$stmt->execute();
$result = $stmt->get_result();
```
* The `?` gets safely replaced by whatever $flavor is, with no way to inject evil code
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## Database Connection ❤︎ $connection
* The database connection object. It's how PHP talks to MySQL
* Usually created once in a config/env file using `new mysqli()`
```
$connection = new mysqli("localhost", "root", "password", "soup_shop_db");
```
* Every database function uses this $connection. It's like having the key to the database door — you create it once and then use it everywhere with `global $connection;` in your functions
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## $connection->prepare() ❤︎
* Takes a SQL query with `?` placeholders and gets it ready to be run safely
* Returns a statement object (usually called $stmt)
```
$sql = "SELECT * FROM products WHERE brand = ? AND price < ?";
$stmt = $connection->prepare($sql);
```
* The query is ready, but the `?`s aren't filled in yet — that's what bind_param does next
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## $stmt->bind_param() ❤︎
* Fills in the `?` placeholders with actual values
* The first argument is a string of TYPE CHARACTERS — one letter per `?`:
    * `'s'` = string
    * `'i'` = integer
    * `'d'` = double (decimal number)
```
$brand = "COSRX";
$max_price = 20;

$stmt->bind_param('si', $brand, $max_price);
// 's' for $brand (string), 'i' for $max_price (integer)
// first ? becomes "COSRX", second ? becomes 20
```
* The letters and the values must be in the SAME ORDER as the `?`s in your query
```
// query:      WHERE name = ?    AND quantity > ?    AND status = ?
// bind_param: 'sis',            $name,              $qty,           $status
//              s=string          i=integer           s=string
```
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## $stmt->execute() ❤︎
* Actually RUNS the prepared statement. After prepare and bind_param, this is the "GO!" button
```
$stmt->execute();  // runs the query against the database
```
* For SELECT queries, you then use `get_result()` to grab the data
* For INSERT/UPDATE/DELETE, the changes happen immediately when execute runs
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## $stmt->get_result() and $result->fetch_assoc() ❤︎
* After running a SELECT query, these grab the actual data

### get_result()
* Gets the result set (all the rows that matched your query)
```
$result = $stmt->get_result();
```

### fetch_assoc()
* Grabs ONE row at a time as an associative array (key => value pairs)
```
$row = $result->fetch_assoc();
// $row might be: ["id" => 1, "name" => "Snail Mucin", "brand" => "COSRX", "price" => 13.99]

echo $row['name'];   // Snail Mucin
echo $row['price'];  // 13.99
```
* Want ALL rows? Loop through them:
```
while ($row = $result->fetch_assoc()) {
    echo $row['name'] . " - $" . $row['price'] . "<br>";
}
// Snail Mucin - $13.99
// Sunscreen - $15.00
// Toner - $18.50
```
* Each time `fetch_assoc()` runs, it grabs the NEXT row. When there are no more rows, it returns null and the loop stops
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## $connection->query() ❤︎
* Runs a simple SQL query directly WITHOUT prepared statements
* Only safe to use when there's NO user input in the query
```
$result = $connection->query("SELECT * FROM soups ORDER BY name");

while ($row = $result->fetch_assoc()) {
    echo $row['name'] . "<br>";
}
```
* If there IS user input, ALWAYS use prepare + bind_param instead. `query()` is for hard-coded queries only
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->

<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->
## $connection->insert_id ❤︎
* After an INSERT query, this gives you the auto-increment ID of the row that was just created
* Super useful when you insert something and immediately need to know its ID
```
$sql = "INSERT INTO orders (customer, soup, quantity) VALUES (?, ?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param('ssi', $customer, $soup, $qty);
$stmt->execute();

$new_order_id = $connection->insert_id;
echo "Your order #$new_order_id has been placed!";
// Your order #47 has been placed!
```
* The database auto-assigns the ID (auto-increment), and `insert_id` tells you what it picked
<!-- ❀❀❀❀❀❀❀❀❀❀❀❀ -->