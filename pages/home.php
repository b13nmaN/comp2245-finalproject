
<?php
$filterType = $_GET['filterType'] ?? null;
var_dump($filterType);
// $sanitizedInput = vailate_sanitize($filterType);
// $filteredArr = getFilterRequest($sanitizedInput);

?>




<main>
    <div class="dashboard-header">
        <h2>Dashboard</h2>
        <button class="add-contact">Add Contact</button>
    </div>
    <div class="dashboard-main">
       <div class="filters">
        <p>Filters</p>
        <button id="all">All</button>
        <button id="sales-lead">Sales Lead</button>
        <button id="support">Support</button>
        <button id="assigned-to-me">Assigned to me</button>
       </div>
    </div>
</main>

