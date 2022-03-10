<?php
require('database.php');

$offer_id = filter_input(INPUT_POST, 'offer_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM joboffers
          WHERE offer_id = :offer_id';
$statement = $db->prepare($query);
$statement->bindValue(':offer_id', $offer_id);
$statement->execute();
$offers = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Offer</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $offers['images']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $offers['offer_id']; ?>">

            <label>Job ID:</label>
            <input type="job_id" name="job_id"
                   value="<?php echo $offers['job_id']; ?>">
            <br>

            <label>Job Position:</label>
            <input type="input" name="job_position"
                   value="<?php echo $offers['job_position']; ?>">
            <br>

            <label>Job Description:</label>
            <input type="input" name="job_description"
                   value="<?php echo $offers['job_description']; ?>">
            <br>
            
            <label>Company:</label>
            <input type="input" name="company"
                   value="<?php echo $offers['company']; ?>">
            <br>

            <label>Location:</label>
            <input type="input" name="location"
                   value="<?php echo $offers['location']; ?>">
            <br>

            <label>Yearly Salary:</label>
            <input type="input" name="yearly_salary"
                   value="<?php echo $offers['yearly_salary']; ?>">
            <br>

            <label>Image:</label>
            <input type="file" name="images" accept="image/*" />
            <br>            
            <?php if ($offers['images'] != "") { ?>
            <p><img src="image_uploads/<?php echo $offers['images']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>