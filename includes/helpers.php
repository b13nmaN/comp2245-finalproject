<?php

// Any helper methods you may need to use across 
// pages.

function dd($var) {
  echo'<pre>';
  var_dump($var); 
  echo '</pre>';
  die(); 
}

// get databse table


// Function for validation and sanitization
function validate_sanitize($input){
    // Implement your validation and sanitization logic here
    // For simplicity, let's assume basic validation for demonstration
    return htmlspecialchars(trim($input));
}

// Function for user login
function login($conn, $email, $password){
    // Example of using validate_sanitize function
    $sanitizedEmail = validate_sanitize($email);
    $sanitizedPassword = validate_sanitize($password);

    // Your login logic here
    // Placeholder logic, you need to replace this with actual login logic
    $query = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $sanitizedEmail);
    $stmt->bindParam(':password', $sanitizedPassword);
    $stmt->execute();

    // Check if login is successful
    if ($stmt->rowCount() > 0) {
        // Log in successful
        // Use sessions to store user information
        $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);
        return true;
    } else {
        // Login failed
        return false;
    }
}

// Function for user logout
function logout(){
    // Implement logout logic here
    // Navigate to the login page
    // Placeholder logic, you need to replace this with actual logout logic
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirect to login page
    exit();
}

// Function to add a new user
function newUser($conn, $userName, $password, $role){
    // Example of using validate_sanitize function
    $sanitizedUserName = validate_sanitize($userName);
    $sanitizedPassword = validate_sanitize($password);
    $sanitizedRole = validate_sanitize($role);

    // Your new user logic here
    // Placeholder logic, you need to replace this with actual user creation logic
    $hashedPassword = password_hash($sanitizedPassword, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $sanitizedUserName);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':role', $sanitizedRole);
    $stmt->execute();

    // Check if user creation is successful
    return $stmt->rowCount() > 0;
}

// Function to get all users
function getAllUsers($conn, $role){
    // Example of using validate_sanitize function
    $sanitizedRole = validate_sanitize($role);

    // Your get all users logic here
    // Placeholder logic, you need to replace this with actual logic
    $query = "SELECT name, email, role, created_at FROM users WHERE role = :role";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':role', $sanitizedRole);
    $stmt->execute();

    // Fetch all users
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// Function to add a new contact
function addNewContact($conn, $userid, $title, $fname, $lname, $email, $telephone, $company, $type, $assigned_to){
    // Example of using validate_sanitize function
    $sanitizedTitle = validate_sanitize($title);
    $sanitizedFname = validate_sanitize($fname);
    $sanitizedLname = validate_sanitize($lname);
    $sanitizedEmail = validate_sanitize($email);
    $sanitizedTelephone = validate_sanitize($telephone);
    $sanitizedCompany = validate_sanitize($company);
    $sanitizedType = validate_sanitize($type);
    $sanitizedAssignedTo = validate_sanitize($assigned_to);

    // Your add new contact logic here
    // Placeholder logic, you need to replace this with actual logic
    $query = "INSERT INTO contacts (userid, title, fname, lname, email, telephone, company, type, assigned_to, created_at, updated_at) VALUES (:userid, :title, :fname, :lname, :email, :telephone, :company, :type, :assigned_to, NOW(), NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':title', $sanitizedTitle);
    $stmt->bindParam(':fname', $sanitizedFname);
    $stmt->bindParam(':lname', $sanitizedLname);
    $stmt->bindParam(':email', $sanitizedEmail);
    $stmt->bindParam(':telephone', $sanitizedTelephone);
    $stmt->bindParam(':company', $sanitizedCompany);
    $stmt->bindParam(':type', $sanitizedType);
    $stmt->bindParam(':assigned_to', $sanitizedAssignedTo);
    $stmt->execute();

    // Check if contact creation is successful
    return $stmt->rowCount() > 0;
}

// Function to filter contacts
function getFilterRequest($conn, $filterType){
    // Implement logic to filter contacts based on filterType
    // Placeholder logic, you need to replace this with actual logic
    $query = "SELECT * FROM contacts WHERE type = :filterType";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':filterType', $filterType);
    $stmt->execute();

    // Fetch filtered data
    $filteredData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $filteredData;
}

// Function to load contact details
function loadDetails($conn, $id){
    // Implement logic to load contact details based on id
    // Placeholder logic, you need to replace this with actual logic
    $query = "SELECT * FROM contacts WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch contact details
    $contactDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    return $contactDetails;
}

// Function to assign contact to self
function assignToMe($conn, $id){
    // Implement logic to update assign_to field in the contact row
    // Assign the contact to self
    // Placeholder logic, you need to replace this with actual logic
    session_start();
    $userId = $_SESSION['user']['id'];

    $query = "UPDATE contacts SET assigned_to = :userId WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Function to switch role to sales lead
function switchMeToSalesLead($conn, $id){
    // Implement logic to update type field in the contact row
    // Switch to sales lead role
    // Placeholder logic, you need to replace this with actual logic
    $query = "UPDATE contacts SET type = 'sales lead' WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Function to add a note to a contact
function addNote($conn, $note, $id){
    // Implement logic to add a note to the notes table
    // Use join to filter based on id in the contacts table
    // Placeholder logic, you need to replace this with actual logic
    $query = "INSERT INTO notes (contact_id, note, created_at) VALUES (:id, :note, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':note', $note);
    $stmt->execute();
}

// Function to load notes for a contact
function loadNotes($conn, $id){
    // Implement logic to load notes from the notes table
    // Use join to join and filter the table
    // Placeholder logic, you need to replace this with actual logic
    $query = "SELECT * FROM notes WHERE contact_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch notes
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $notes;
}


// Create functions to valite different form inputs

?>



