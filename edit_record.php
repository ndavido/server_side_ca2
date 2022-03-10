<?php

// Get the record data
$offer_id = filter_input(INPUT_POST, 'offer_id', FILTER_VALIDATE_INT);
$job_id = filter_input(INPUT_POST, 'job_id', FILTER_VALIDATE_INT);
$job_position = filter_input(INPUT_POST, 'job_position');
$yearly_salary = filter_input(INPUT_POST, 'yearly_salary', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($offer_id == NULL || $offer_id == FALSE || $job_id == NULL ||
$job_id == FALSE || empty($job_position) ||
$yearly_salary == NULL || $yearly_salary == FALSE) {
$error = "Invalid record data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['images']['job_position'];
$tmp_dir = $_FILES['images']['tmp_name'];
$imgSize = $_FILES['images']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'image_uploads/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the record in the database
require_once('database.php');

$query = 'UPDATE joboffers
SET job_id = :job_id,
job_position = :job_position,
images = :images
WHERE offer_id = :offer_id';
$statement = $db->prepare($query);
$statement->bindValue(':job_id', $job_id);
$statement->bindValue(':job_position', $job_position);
$statement->bindValue(':price', $yearly_salary);
$statement->bindValue(':images', $image);
$statement->bindValue(':offer_id', $record_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>