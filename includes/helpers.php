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
function getCurrentContact($conn, $contactId) {
    $query = "SELECT * FROM contacts WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $contactId);
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
function getFilterRequest($conn, $filterType) {
    // Implement logic to filter contacts based on filterType
    if (is_string($filterType)) {
        // If $filterType is a string, filter by type
        $query = "SELECT * FROM contacts WHERE type = :filterType";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':filterType', $filterType);
    } else {
        // If $filterType is not a string, assume it's an ID and filter by assigned_to field
        $query = "SELECT * FROM contacts WHERE assigned_to = :filterId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':filterId', $filterType);
    }

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
function assignToMe($conn, $user_id, $contact_id){
    var_dump($user_id, $contact_id);
    $query = "UPDATE contacts SET assigned_to = :user_id WHERE id = :contact_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);
    $stmt->execute();
}

// Function to switch role to sales lead
function switchRole($conn, $id, $role){
    // Implement logic to update type field in the contact row
    // Switch to sales lead role
    // Placeholder logic, you need to replace this with actual logic
    $query = "UPDATE contacts SET type = :role WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':role', $role);
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


function getCreatorName($conn, $created_by_user_id) {
    $query = "SELECT u.firstname, u.lastname
                FROM users u
                JOIN contacts c ON u.id = c.created_by
                WHERE c.id = :created_by_user_id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindValue('created_by_user_id', (int)$created_by_user_id, PDO::PARAM_INT); // use bindValue instead of bindParam
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $user;
}

function getAssignedTo($conn, $assigned_to_user_id) {
    $query = "SELECT u.firstname, u.lastname
                FROM users u
                JOIN contacts c ON u.id = c.assigned_to
                WHERE c.id = :assigned_to_user_id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindValue('assigned_to_user_id', (int)$assigned_to_user_id, PDO::PARAM_INT); // use bindValue instead of bindParam
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $user;
}

function updateContact($conn, $contact_id) {
    // Update the `updated_at` field for the specified contact ID
    $updateQuery = "UPDATE contacts SET updated_at = NOW() WHERE id = :contact_id";
    
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bindValue(':contact_id', (int)$contact_id, PDO::PARAM_INT);
    $updateStmt->execute();
}


?>



