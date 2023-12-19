<?php
$contactName = $_GET['contactId'] ?? null;
$currentContact = getCurrentContact($conn, $contactName);
$contact_id = $currentContact['id'];
$notes = loadNotes($conn, $contact_id);
$contact_id = $currentContact['id'];
$notes = loadNotes($conn, $contact_id);
?>

<?php include 'includes/process-new-note.php'; ?>

<main>

    
    <div class="dashboard-header">
        <div class="dashboard-header-left">
            <div class="dashboard-header-title">
                <p><?php echo $currentContact['title'] . ". " . $currentContact['firstname'] . " " . $currentContact['lastname']; ?></p>
                <p style="color: #666666;"><?php echo "Created on " . date("F j, Y", strtotime($currentContact['created_at'])) . " by " . $currentContact['created_by']; ?></p>
                <p style="color: #666666;"><?php echo "Updated on " . date("F j, Y", strtotime($currentContact['updated_at'])); ?></p>
            </div>
        </div>
        
        <div class="dashboard-header-right">
            <button class="btn-primary to-me">Assign to me</button>
            <button class="btn-primary to-sales-lead">Switch to sales lead</button>
        </div>
    </div>

    <div id="section-1" class="container-main">
    <div class="contact-info-container">
        <div class="info-section">
            <p class="info-heading" style="color: #666666;">Email</p>
            <p class="info-content"><?= $currentContact['email']; ?></p>
        </div>

        <div class="info-section">
            <p class="info-heading" style="color: #666666;">Telephone</p>
            <p class="info-content"><?= $currentContact['telephone']; ?></p>
        </div>

        <div class="info-section">
            <p class="info-heading" style="color: #666666;">Company</p>
            <p class="info-content"><?= $currentContact['company']; ?></p>
        </div>

        <div class="info-section">
            <p class="info-heading" style="color: #666666;">Assigned to</p>
            <p class="info-content"><?= $currentContact['assigned_to']; ?></p>
        </div>
    </div>
    </div>
    <div id="section-2" class="container-main">
        <div class="note-icon">
            <p> Notes </p>
        </div>
        <div class="notes-container"> 
            <?php foreach ($notes as $note): 
                $dateTime = new DateTime($note['created_at']);
                $formattedDate = $dateTime->format("F j, Y \a\\t g:ia");
            ?>
                <div class="note"> 
                    <p style="margin-bottom: 5px;"><strong><?= $note['created_by']; ?></strong></p>
                    <p style="margin-bottom: 5px; color: #666666;"><?= $note['comment']; ?></p>
                    <p style="margin-bottom: 5px; color: #666666;"><?= $formattedDate; ?></p>
                </div>
            <?php endforeach ?>  
        </div>
        <form action="../includes/process-new-note.php" method="post" id="note-form">
            <input type="hidden" name="contact_id" value="<?php echo $currentContact['id']; ?>">
            <input type="hidden" name="created_by" value="<?php echo $currentContact['firstname']; ?>">
            <input type="hidden" name="contact_id" value="<?php echo $currentContact['id']; ?>">
            <input type="hidden" name="created_by" value="<?php echo $currentContact['firstname']; ?>">
            <div class="grid-item row-6-span-2" style="margin-bottom: 20px;"> <!-- Added margin-bottom for space -->
                <label for="comment"><p><?php echo "Add a note about " . $currentContact['firstname']; ?></p></label>
                <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
            </div>
            <div class="grid-item row-6-span-2">
                <button type="submit" class="save-button">Add Note</button>
            </div>
        </form>
    </div>
</main>
