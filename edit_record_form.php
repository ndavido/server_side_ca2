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
       <div class="contact1">
              <div class="container-contact1">
                     <div class="contact1-pic js-tilt" data-tilt>
                            <?php if ($offers['image'] != "") { ?>
                                   <img src="image_uploads/<?php echo $offers['image']; ?>" alt="IMG">
                            <?php } ?>
                     </div>
                     <form class="contact1-form validate-form" action="edit_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
                            <span class="contact1-form-title">
                                   Edit Job Offer
                            </span>
                            <input type="hidden" name="original_image" value="<?php echo $offers['image']; ?>" />
                            <input type="hidden" name="offer_id" value="<?php echo $offers['offer_id']; ?>">
                            <input type="hidden" name="job_id" value="<?php echo $offers['job_id']; ?>">
                            <div class="wrap-input1 validate-input" data-validate="Job Position is required">
                                   <input class="input1" type="text" name="job_position" placeholder="Job Position" value="<?php echo $offers['job_position']; ?>">
                                   <span class="shadow-input1"></span>
                            </div>

                            <br>

                            <div class="wrap-input1 validate-input" data-validate="Company is required">
                                   <input class="input1" type="text" name="company" placeholder="Company" value="<?php echo $offers['company']; ?>">
                                   <span class="shadow-input1"></span>
                            </div>

                            <br>

                            <div class="wrap-input1 validate-input" data-validate="Location is required">
                                   <input class="input1" type="text" name="location" placeholder="Location" value="<?php echo $offers['location']; ?>">
                                   <span class="shadow-input1"></span>
                            </div>

                            <br>

                            <div class="wrap-input1 validate-input" data-validate="Yearly Salary is required">
                                   <input class="input1" type="text" name="yearly_salary" placeholder="Yearly Salary" value="<?php echo $offers['yearly_salary']; ?>">
                                   <span class="shadow-input1"></span>
                            </div>

                            <br>

                            <div class="wrap-input1 validate-input" data-validate="Job Description is required">
                                   <input class="input1" name="job_description" placeholder="Job Description" value="<?php echo $offers['job_description']; ?>">
                                   <span class="shadow-input1"></span>
                            </div>

                            <br>

                            <div class="wrap-input1 validate-input" data-validate="Yearly Salary is required">
                                   <input type="file" name="image" accept="image/*" />
                                   <span class="shadow-input1"></span>
                            </div>

                            <br>

                            <div class="container-contact1-form-btn">
                                   <input class="contact1-form-btn" type="submit" value="Save Changes"></input>
                            </div>
                     </form>
              </div>
       </div>
       <?php
       include('includes/footer.php');
       ?>