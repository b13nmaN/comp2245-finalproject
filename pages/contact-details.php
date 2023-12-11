<?php
$contactName = $_GET['contactId'] ?? null;
$currentContact = getCurrentContact($conn, $contactName);
$contact_id = $currentContact['id'];
$notes = loadNotes($conn, $contact_id);
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
        <!-- content goes here -->
    </div>
    <div class="container-main">
        <div class="notes-container">
            <?php foreach ($notes as $note): 
                $dateTime = new DateTime($note['created_at']);
                $formattedDate = $dateTime->format("F j, Y \a\\t g:ia");
                ?>
                <div class="note">
                    <p><?= $note['created_by']; ?></p>
                    <p><?= $note['comment']; ?></p>
                    <p><?= $formattedDate; ?></p>
                </div>
            <?php endforeach ?>  
        </div>
        <form action="../includes/process-new-note.php" method="post" id="note-form">
            <input type="hidden" name="contact_id" value="<?php echo $currentContact['id']; ?>">
            <input type="hidden" name="created_by" value="<?php echo $currentContact['firstname']; ?>">
            <div class="grid-item row-6-span-2">
                <label for="comment"><?php echo "Add a note about " . $currentContact['firstname']; ?></label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
                <div class="grid-item row-6-span-2">
                <button type="submit" class="save-button">Add Note</button>
            </div>
        </form>

    </div>
</main>
