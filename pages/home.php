
<?php
// get filter type
$filterType = $_GET['filterType'] ?? null;
$sanitizedInput = sanitize($filterType);
$filteredArr = getFilterRequest($conn, $sanitizedInput);
// get all all contacts
$allContacts = getAllContacts($conn);


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

        <?php
        if ($filterType == 'sales-lead' || $filterType == 'support' || $filterType == 'assigned-to-me'):
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
                        <td><?= $contact['type'] ?></td>
                        <td><p class="view-button">View</p></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else:
            // Show all contacts if no specific filter is selected
            ?>
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
                        <td><?= $contact['type'] ?></td>
                        <td><p class="view-button"  data-contact-id="<?= $contact['firstname'] ?>">View</p></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        </div>
    </div>
</main>

