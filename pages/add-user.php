<main>
    <?php if ($success ?? null && $success === true) : ?>
        <div id="success-message">
            <i class="material-icons" >check_circle</i>
            <p>User successfully added!</p>
            <i id="close-message" class="material-icons" >close</i>
        </div>
    <?php endif; ?>
    <h2>Add New User</h2>
    <div class="container-main">
        <form action="../includes/process-new-user.php" method="post" class="grid-form">

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
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="grid-item">
                <label for="role">Type</label>
                <select id="role" name="role">
                    <option value="Admin">Admin</option>
                    <option value="Member">Member</option>
                </select>
            </div>
            <div class="grid-item row-6-span-2">
                <button type="submit" class="save-button">Save</button>
            </div>
        </form>
        </div>
</main>
