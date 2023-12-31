<?php
$users = getAllUsers($conn);
$user = $users;


include 'includes/process-new-contact.php';

?>

<main>
    <div id="success-message" >
        <i class="material-icons" >check_circle</i>
        <p>User successfully added!</p>
        <i id="close-message" class="material-icons" >close</i>
    </div>
    <h2>New Contact</h2>

    <div class="container-main">
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
            <input type="text" id="FirstName" name="FirstName"  placeholder="John">
            <?php if (isset($errors['fname'])):?>
            <p class="error"><?=$errors['fname']?> </p>
            <?php endif;?>
        </div>
        

        <div class="grid-item">
            <label for="LastName">Last Name</label>
            <input type="text" id="LastName" name="LastName"  placeholder="Doe">
            <?php if (isset($errors['fname'])):?>
            <p class="error"><?=$errors['fname']?> </p>
            <?php endif;?>
        </div>
        
        <div class="grid-item">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"  placeholder="john.doe@example.com">
            <?php if (isset($errors['fname'])):?>
            <p class="error"><?=$errors['fname']?> </p>
            <?php elseif (isset($errors['inval_email'])):?>
            <p class="error"><?=$errors['inval_email']?> </p>
            <?php endif;?>
        </div>
        <div class="grid-item">
            <label for="number">Telephone</label>
            <input type="tel" id="number" name="number"  placeholder="(123) 456-7890">
        </div>

        <div class="grid-item">
            <label for="company">Company</label>
            <input type="text" id="company" name="company"  placeholder="ABC Corporation">
            <?php if (isset($errors['company'])):?>
            <p class="error"><?=$errors['company']?> </p>
            <?php endif;?>
        </div>

        <div class="grid-item">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option value="sales-lead">Sales lead</option>
                <option value="support">Support</option>
            </select>
        </div>

        <div class="grid-item">
            <label for="assign-to">Assign to</label>
            <select id="assign-to" name="assign-to">
                <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user['id'] ; ?>">
                    <?php echo $user['firstname']. ' ' .$user['lastname']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="created_by" value="<?php echo $userData['id']; ?>">

        <div class="grid-item row-6-span-2">
            <button type="submit" class="save-button">Save</button>
        </div>
    </form>
    </div> 
</main>


