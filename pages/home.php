
<?php
// get filter type
$currentUserId = $userData['id'];
$filterType = $_GET['filterType'] ?? null;
var_dump($filterType);
$sanitizedInput = sanitize($filterType);


$contactsAssignedToMe = getContactsByUserId($conn, $currentUserId);


$filteredArr = getFilterRequest($conn, $sanitizedInput);

// get all contacts
$allContacts = getAllContacts($conn);


if(!isset($_SESSION['user'])) {
    header("Location: /comp2245-finalproject/login.php");
}
?>




<main>
    
    <div class="dashboard-header">
        <h2>Dashboard</h2>
        <button class="add-contact btn-primary">Add Contact</button>
    </div>
    <div class="container-main">
        <div class="filters">
            <p><span><i id="filter-icon" class="icon" data-feather="filter"></i></span>Filter by:</p>
            <p data-filter-type="all" class="active-filter" id="all">All</p>
            <p data-filter-type="sales-lead" class="active-filter" id="sales-lead">Sales Lead</p>
            <p data-filter-type="support" class="active-filter" id="support">Support</p>
            <p data-filter-type="assigned-to-me" class="active-filter" id="assigned-to-me">Assigned to me</p>
        </div>
        <div class="table">

        <?php
function generateTable($contacts) {
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th colspan="2">Type</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $contact['firstname'] ?></td>
                <td><?= $contact['email'] ?></td>
                <td><?= $contact['company'] ?></td>
                <td>
                    <p style="<?= $contact['type'] == 'support' 
                        ? 'background-color: var(--color-purple); padding: 5px 10px; color: #fff; border-radius: 5px; text-align: center;' 
                        : ($contact['type'] == 'sales-lead' 
                            ? 'background-color: var(--color-yellow); padding: 5px 10px; color: #000; border-radius: 5px; text-align: center;' 
                            : ''); ?>">
                        <?= $contact['type'] ?>
                    </p>
                </td>
                <td><p class="view-button"  data-contact-id="<?= $contact['id'] ?>">View</p></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
}

// Usage example:

if ($filterType == 'sales-lead' || $filterType == 'support') {
    generateTable($filteredArr);
}elseif ($filterType == 'assigned-to-me') {
    generateTable($contactsAssignedToMe);
} 
elseif ($filterType == 'all') {
    generateTable($allContacts);
} else {
    generateTable($allContacts);
}
?>

        </div>
    </div>
</main>

