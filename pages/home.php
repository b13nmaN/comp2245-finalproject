
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
        <p><span><img src="../assets/images/filter.svg" alt="filter-icon"></span>Filter by:</p>
        <p id="all">All</p>
        <p id="sales-lead">Sales Lead</p>
        <p id="support">Support</p>
        <p id="assigned-to-me">Assigned to me</p>
       </div>
    </div>
</main>

