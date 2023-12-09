<?php
$users = getAllUsers($conn);
$user = $users[0]['firstname'];
// dd($user);
?>

<main>
    <h2>New Contact</h2>
    <div class="success-message">
        <?php if ($success ?? null && $success === true) : ?>
            <p>Contact created successfully!</p>
        <?php endif; ?>
    </div>
    <div class="contact-container">
    <form action="../includes/process-new-contact.php" method="post" class="grid-form">
        <div class="grid-item row-1-span-2">
            <label for="Title">Title</label>
            <select id="Title" name="Title">
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
            </select>
        </div>

        <div class="grid-item">
            <label for="FirstName">First Name</label>
            <input type="text" id="FirstName" name="FirstName" required placeholder="John">
        </div>

        <div class="grid-item">
            <label for="LastName">Last Name</label>
            <input type="text" id="LastName" name="LastName" required placeholder="Doe">
        </div>

        <div class="grid-item">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="john.doe@example.com">
        </div>

        <div class="grid-item">
            <label for="number">Telephone</label>
            <input type="tel" id="number" name="number" required placeholder="(123) 456-7890">
        </div>

        <div class="grid-item">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" required placeholder="ABC Corporation">
        </div>

        <div class="grid-item">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option value="Saleslead">Sales lead</option>
                <option value="support">Support</option>
            </select>
        </div>

        <div class="grid-item">
            <label for="assign-to">Assign to</label>
            <select id="assign-to" name="assign-to">
                <option value="<?php echo $user; ?>"><?php echo $user; ?></option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="grid-item row-6-span-2">
            <button type="submit" class="save-button">Save</button>
        </div>
    </form>
    </div>
</main>


