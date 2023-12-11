<?php
$contactName = $_GET['contactId'] ?? null;
$currentContact = getCurrentContact($conn, $contactName);

?>

<main>
    <div class="dashboard-header">
        <h2>Contact Details</h2>
        <div>
            <button class="btn-primary to-me">Assign to me</button>
            <button class="btn-primary to-sales-lead">Switch to sales lead</button>
        </div>
        <!-- header goes here -->
        <!-- do not change the dashboard-header styles -->
        <!-- change the content within the dashboard-header -->
        
    </div>
    <div class="container-main">
        <p><?php echo $currentContact['id']?></p>
        <!-- content goes here -->
    </div>
    <div class="container-main">
        <form action="../includes/process-new-note.php" method="post">
            <div class="row-6-span-2">
                <label for="add-note"><?php echo "Add a note about " . $getCurrentContact['firstname']; ?></label>
                <textarea name="add-note" id="add-note" cols="30" rows="10"></textarea>
            </div>
                <div class="grid-item row-6-span-2">
                <button type="submit" class="save-button">Save</button>
            </div>
        </form>

    </div>
</main>
