
<?php
// get filter type
$currentUserId = $userData['id'];
$filterType = $_GET['filterType'] ?? null;
$sanitizedInput = sanitize($filterType);
if ($filterType == 'sales-lead' || $filterType == 'support' ) {
    $filteredArr = getFilterRequest($conn, $sanitizedInput);
} else {
    $filteredArr = getContactsByUserId($conn, $currentUserId);
}
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
            <p class="active-filter" id="all">All</p>
            <p class="active-filter" id="sales-lead">Sales Lead</p>
            <p class="active-filter" id="support">Support</p>
            <p class="active-filter" id="assigned-to-me">Assigned to me</p>
        </div>
        <div class="table">

        <?php if ($filterType == 'sales-lead' || $filterType == 'support'): 
        ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th colspan="2">Type</th>
                </tr>
                <?php foreach ($filteredArr as $contact): ?>
                    <tr>
                        <td><?= $contact['firstname'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['company'] ?></td>
                        <td>
                            <p style="<?= $contact['type'] == 'support' 
                            ? 
                            'background-color: var(--color-purple); 
                            padding: 5px 10px;
                            color: #fff; 
                            border-radius: 5px; 
                            text-align: center;' 
                            : ($contact['type'] == 'sales-lead' 
                            ? 
                            'background-color: var(--color-yellow); 
                            padding: 5px 10px; 
                            color: #000; 
                            border-radius: 5px; 
                            text-align: center;' 
                            : ''); ?>">
                            <?= $contact['type'] ?>
                            </p>
                        </td>
                        <td><p class="view-button">View</p></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php elseif ($filterType == 'all'): ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th colspan="2">Type</th>
                </tr>
                <?php foreach ($allContacts as $contact): ?>
                    <tr>
                        <td><?= $contact['firstname'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['company'] ?></td>
                        <td>
                            <p style="<?= $contact['type'] == 'support' 
                            ? 
                            'background-color: var(--color-purple); 
                            padding: 5px 10px;
                            color: #fff; 
                            border-radius: 5px; 
                            text-align: center;' 
                            : ($contact['type'] == 'sales-lead' 
                            ? 
                            'background-color: var(--color-yellow); 
                            padding: 5px 10px; 
                            color: #000; 
                            border-radius: 5px; 
                            text-align: center;' 
                            : ''); ?>">
                            <?= $contact['type'] ?>
                            </p>
                        </td>
                        <td><p class="view-button"  data-contact-id="<?= $contact['id'] ?>">View</p></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th colspan="2">Type</th>
                </tr>
                <?php foreach ($allContacts as $contact): ?>
                    <tr>
                        <td><?= $contact['firstname'] ?></td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['company'] ?></td>
                        <td>
                            <p style="<?= $contact['type'] == 'support' 
                            ? 
                            'background-color: var(--color-purple); 
                            padding: 5px 10px;
                            color: #fff; 
                            border-radius: 5px; 
                            text-align: center;' 
                            : ($contact['type'] == 'sales-lead' 
                            ? 
                            'background-color: var(--color-yellow); 
                            padding: 5px 10px; 
                            color: #000; 
                            border-radius: 5px; 
                            text-align: center;' 
                            : ''); ?>">
                            <?= $contact['type'] ?>
                            </p>
                        </td>
                        <td><p class="view-button"  data-contact-id="<?= $contact['id'] ?>">View</p></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        </div>
    </div>
</main>

