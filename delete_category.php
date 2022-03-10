<?php
// Get ID
$job_id = filter_input(INPUT_POST, 'job_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($job_id == null || $job_id == false) {
    $error = "Invalid job ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM job 
              WHERE job_id = :job_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':job_id', $job_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>
