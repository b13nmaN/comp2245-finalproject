

<main>
    <div class="contact-container">
        <div class="contact-header">
            <h1>New Contact</h1>
        </div>
        <form action="process-new-contact.php" method="post">
            <select id="Title" name="Title">
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
            </select><br>
            <label for="FirstName">First Name</label>
            <input type="text" id="FirstName" name="FirstName" required><br>
            <label for="LastName">Last Name</label>
            <input type="text" id="LastName" name="LastName" required><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required><br>

            <label for="number">Telephone</label>
            <input type="tel" id="number" name="number" required><br>

            <label for="company">Company</label>
            <input type="text" id="company" name="company" required><br>
            <select id="type" name="type">
                <option value="Saleslead">Sales lead</option>
                <option value="support">support</option>
            </select><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</main>


