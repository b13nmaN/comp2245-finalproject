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
function sanitize($input){
    return htmlspecialchars(trim($input));
}

// Function for user login
function login($conn, $email, $password) {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            // var_dump($user);
            
            return $user;
        }
    }
    // Login failed
    return false;
}


// Function for user logout
function logout(){
    session_destroy();
    header("Location: /comp2245-finalproject/login.php"); // Redirect to login page
    exit();
}

// Function to add a new user
function newUser($conn, $firstName, $lastname, $email, $password, $role){

    // Your new user logic here
    $query = "INSERT INTO users (firstname,lastname,email,password, role , created_at) VALUES (:firstname, :lastname, :email, :password, :role, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':firstname', $firstName);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    $stmt->execute();

    // Check if user creation is successful
    return $stmt->rowCount() > 0;
}

// Function to get all users
function getAllUsers($conn){
    // Your retrieve all contacts logic here
    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch all contacts as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// Function to get a specific contact by name
function getCurrentContact($conn, $contactName) {
    $query = "SELECT * FROM contacts WHERE firstname = :firstname";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':firstname', $contactName);
    $stmt->execute();
    $currentContact = $stmt->fetch(PDO::FETCH_ASSOC);
    return $currentContact;
}


// Function to add a new contact
function addNewContact($conn, $title, $fname, $lname, $email, $telephone, $company, $type, $assigned_to, $created_by){
    // Placeholder logic, you need to replace this with actual logic
    $query = "INSERT INTO contacts ( title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at,  updated_at) VALUES ( :title, :fname, :lname, :email, :telephone, :company, :type, :assigned_to, :created_by, NOW(), NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':assigned_to', $assigned_to);
    $stmt->bindParam(':created_by', $created_by);
    $stmt->execute();

    // Check if contact creation is successful
    return $stmt->rowCount() > 0;
}

function getAllContacts($conn) {
    // Your retrieve all contacts logic here
    $query = "SELECT * FROM contacts";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch all contacts as an associative array
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $contacts;
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
function addNote($conn, $contact_id, $comment, $created_by){
    $query = "INSERT INTO notes (contact_id, comment, created_by, created_at) VALUES (:contact_id, :comment,:created_by, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':created_by', $created_by, PDO::PARAM_STR);
    $stmt->execute();
}

// Function to load notes for a contact
function loadNotes($conn, $contact_id){
    $query = "SELECT comment, created_at, created_by FROM notes WHERE contact_id = :contact_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch notes
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $notes;
}


// Create functions to valite email and telephone number

?>



