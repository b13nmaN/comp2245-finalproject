
<!-- <?php include 'pages/' . filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '.php'; ?> -->

<?php
// You could also have used $_SERVER['REQUEST_URI'] to help
// to check the url and match it to a set of
// predefined routes. See below.

// Get requested URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// dd($uri);

// Define routes
$routes = [
    '/comp2245-finalproject/index.php/home' => 'pages/home.php',
    '/comp2245-finalproject/index.php/users' => 'pages/users.php',
    '/comp2245-finalproject/index.php/new-contact' => 'pages/new-contact.php',
    '/comp2245-finalproject/index.php/login' => 'pages/login.php',
    '/comp2245-finalproject/index.php/contact-details' => 'pages/contact-details.php',
    '/comp2245-finalproject/index.php/add-user' => 'pages/add-user.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri]; // if url exist, then load the page
} else {
    http_response_code(404);
    echo 'Sorry. Page Not Found!'; // otherwise, show 404 page
    die();
}


?>
