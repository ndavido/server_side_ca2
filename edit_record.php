<?php

// Get the record data
$offer_id = filter_input(INPUT_POST, 'offer_id', FILTER_VALIDATE_INT);
$job_id = filter_input(INPUT_POST, 'job_id', FILTER_VALIDATE_INT);
$job_position = filter_input(INPUT_POST, 'job_position');
$job_description = filter_input(INPUT_POST, 'job_description');
$company = filter_input(INPUT_POST, 'company');
$location = filter_input(INPUT_POST, 'location');
$yearly_salary = filter_input(INPUT_POST, 'yearly_salary');

// Validate inputs
if (
    $offer_id == null || $offer_id == false || $job_id == null || $job_id == false ||
    $job_position == null || $yearly_salary == null || 
    $company == null || $location == null || $job_description == null
) {
    $error = "Invalid record data. Check all fields and try again.";
    include('error.php');
} else {

    /**************************** Image upload ****************************/

    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
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
image = :image,
job_position = :job_position,
job_description = :job_description,
company = :company,
location = :location,
yearly_salary = :yearly_salary
WHERE offer_id = :offer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':job_id', $job_id);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':job_position', $job_position);
    $statement->bindValue(':job_description', $job_description);
    $statement->bindValue(':company', $company);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':yearly_salary', $yearly_salary);
    $statement->bindValue(':offer_id', $offer_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}