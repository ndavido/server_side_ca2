<?php
require_once('database.php');

// Get IDs
$offer_id = filter_input(INPUT_POST, 'offer_id', FILTER_VALIDATE_INT);
$job_id = filter_input(INPUT_POST, 'job_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($offer_id != false && $job_id != false) {
    $query = "DELETE FROM joboffers
              WHERE offer_id = :offer_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':offer_id', $offer_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>