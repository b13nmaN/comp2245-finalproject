
<?php
$filterType = $_GET['filterType'] ?? null;
var_dump($filterType);
// $sanitizedInput = vailate_sanitize($filterType);
// $filteredArr = getFilterRequest($sanitizedInput);

?>




<main>
    <div class="dashboard">
        <div class="dashboard-header">
            <h2>Dashboard</h2>
            <button id="add-contact">add contact</button>
        </div>
        <div class="dashboard-main">
            <button id="sales-lead">saleslead</button>
            <button id="support">support</button>
            <div class="filter">
                
                <?php if ($filterType == 'sales-lead'):
                var_dump($filterType);
                ?>
                
                <table>
                    <tr>
                        <th>sales lead</th>
                    </tr>
                </table>
            <?php else: ?>
                <?php if ($filterType == 'support'):
                    var_dump($filterType);
                     ?>
                <table>
                    <tr>
                        <th>support</th>
                    </tr>
                </table>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="type"></div>
</main>

