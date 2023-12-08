
<?php
// get filter type
$filterType = $_GET['filterType'] ?? null;
// var_dump($filterType);
// $sanitizedInput = vailate_sanitize($filterType);
// $filteredArr = getFilterRequest($sanitizedInput);

// get all all contacts
$allContacts = getAllContacts($conn);
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
        <?php if ($filterType == 'sales-lead'):
            var_dump($filterType);
        ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                </tr>
                <tr>
                <?php foreach ($allContacts as $contact): ?>
                    <?php foreach ($contact as $key => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php if ($filterType == 'support'):
            var_dump($filterType);
                ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                </tr>
                <tr>
                <?php foreach ($allContacts as $contact): ?>
                    <?php foreach ($contact as $key => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else:
            var_dump($filterType);
        ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                </tr>
                <tr>
                <?php foreach ($allContacts as $contact): ?>
                    <?php foreach ($contact as $key => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <?php endif; ?>

    </div>
</main>

