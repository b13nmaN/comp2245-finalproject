<?php
$users = getAllUsers($conn);
$user = $users;

// dd($user);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $title = $_POST["Title"];
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST["email"];
    $telephone = $_POST["number"];
    $company = $_POST["company"];
    $type = $_POST["type"];
    $assigned_to = $_POST["assign-to"];
    $created_by = $_POST["created_by"];

    echo $assigned_to;

    // Validate form inputs
    $errors = [];

    if (empty($firstName)) {
        $errors['fname'] = "First Name is required.";
    }

    if (empty($lastName)) {
        $errors['lname'] = "Last Name is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['inval_email'] = "Invalid email format.";
    }

    // Add more validation rules as needed for other fields

    if (!empty($errors)) {
        // Sanitize input
        $titleSanitized = sanitize($title);
        $firstNameSanitized = sanitize($firstName);
        $lastNameSanitized = sanitize($lastName);
        $emailSanitized = sanitize($email);
        $telephoneSanitized = sanitize($telephone);
        $companySanitized = sanitize($company);
        $typeSanitized = sanitize($type);
        $assigned_toSanitized = sanitize($assigned_to);
        $created_bySanitized = sanitize($created_by);

        // Call the addNewContact function
        // $success = addNewContact(
        //     $conn, 
        //     $titleSanitized, 
        //     $firstNameSanitized, 
        //     $lastNameSanitized, 
        //     $emailSanitized, 
        //     $telephoneSanitized, 
        //     $companySanitized, 
        //     $typeSanitized, 
        //     $assigned_toSanitized,
        //     $created_bySanitized
        // );

    }
}

?>

<main>
    <div id="success-message" >
        <i class="material-icons" >check_circle</i>
        <p>User successfully added!</p>
        <i id="close-message" class="material-icons" >close</i>
    </div>
    <?php if (isset($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p><?php echo $error; ?></p>
    <?php endforeach; ?>
    <?php endif; ?>
    <h2>New Contact</h2>

    <div class="container-main">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="grid-form">
        <div class="grid-item row-1-span-2">
            <label for="Title">Title</label>
            <select id="Title" name="Title">
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
            </select>
        </div>

        <div class="grid-item">
            <label for="FirstName">First Name</label>
            <input type="text" id="FirstName" name="FirstName"  placeholder="John">
        </div>
        <?php
        if (isset($errors['fname'])): {
            echo '<p class="error">' . $errors['fname'] . '</p>';
        }
        ?>
        <?php endif;?>

        <div class="grid-item">
            <label for="LastName">Last Name</label>
            <input type="text" id="LastName" name="LastName"  placeholder="Doe">
        </div>
        
        <?php if (isset($errors['lname'])): {
            echo '<p class="error">' . $errors['lname'] . '</p>';
        }?>
        <?php endif;?>
        <div class="grid-item">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"  placeholder="john.doe@example.com">
        </div>
        <?php if (isset($errors['email'])): {
            echo '<p class="error">' . $errors['email'] . '</p>';
        }?>
        <?php elseif (isset($errors['inval_email'])): {
            echo '<p class="error">' . $errors['inval_email'] . '</p>';
        }?>
        <?php endif;?>
        <div class="grid-item">
            <label for="number">Telephone</label>
            <input type="tel" id="number" name="number"  placeholder="(123) 456-7890">
        </div>

        <div class="grid-item">
            <label for="company">Company</label>
            <input type="text" id="company" name="company"  placeholder="ABC Corporation">
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
                <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user['firstname']. ' ' .$user['lastname'] ; ?>">
                    <?php echo $user['firstname']. ' ' .$user['lastname']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="created_by" value="<?php echo $userData['firstname']. ' ' .$userData['lastname']; ?>">

        <div class="grid-item row-6-span-2">
            <button type="submit" class="save-button">Save</button>
        </div>
    </form>
    </div> 
</main>


