<?php

// Get the product data
$job_id = filter_input(INPUT_POST, 'job_id', FILTER_VALIDATE_INT);
$job_position = filter_input(INPUT_POST, 'job_position');
$yearly_salary = filter_input(INPUT_POST, 'yearly_salary');
$location = filter_input(INPUT_POST, 'location');
$job_desciption = filter_input(INPUT_POST, 'job_description');
$company = filter_input(INPUT_POST, 'company');

// Validate inputs
if ($job_id == null || $job_id == false ||
    $job_position == null || $yearly_salary == null || 
    $yearly_salary == null || $location == null || $company == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {

    /**************************** Image upload ****************************/

    error_reporting(~E_NOTICE); 

// avoid notice

    $imgFile = $_FILES['images']['name'];
    $tmp_dir = $_FILES['images']['tmp_name'];
    echo $_FILES['images']['tmp_name'];
    $imgSize = $_FILES['images']['size'];

    if (empty($imgFile)) {
        $image = "";
    } else {
        $upload_dir = 'image_uploads/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        // rename uploading image
        $image = rand(1000, 1000000) . "." . $imgExt;
        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
            if ($imgSize < 5000000) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $image)) {
                    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    $error =  "Sorry, there was an error uploading your file.";
                    include('error.php');
                    exit();
                }
            } else {
                $error = "Sorry, your file is too large.";
                include('error.php');
                exit();
            }
        } else {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            include('error.php');
            exit();
        }
    }

    /************************** End Image upload **************************/
    
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO joboffers
                 (job_id,images,job_position,job_description,company,location,yearly_salary)
              VALUES
                 (:job_id,:images,:job_position,:job_description,:company,:location,:yearly_salary)";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':image', $image);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}