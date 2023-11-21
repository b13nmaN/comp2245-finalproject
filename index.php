<?php
require 'config/config.php';
require 'includes/helpers.php';
?>
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<?php include 'pages/' . filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . '.php'; ?>

<?php
// You could also have used $_SERVER['REQUEST_URI'] to help
// to check the url and match it to a set of
// predefined routes. See below.

// Get requested URI
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Define routes
// $routes = [
//     '/' => 'pages/index.php',
//     '/about' => 'pages/about.php',
//     '/contact' => 'pages/contact.php'
// ];

// check if uri is in the list of routes and include
// corresponding page
// if not then display a 404 message
// if (array_key_exists($uri, $routes)) {
//     require $routes[$uri];
// } else {
//     http_response_code(404);
//     echo 'Sorry. Page Not Found!';
//     die();
// }

?>

<?php include 'templates/footer.php'; ?>