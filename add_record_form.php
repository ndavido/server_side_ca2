<?php
require('database.php');
$query = 'SELECT *
          FROM job
          ORDER BY job_id';
$statement = $db->prepare($query);
$statement->execute();
$jobs = $statement->fetchAll();
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
                <input type="file" name="image" accept="image/*" />
                <span class="shadow-input1"></span>
            </div>
            <form class="contact1-form validate-form" action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
                <span class="contact1-form-title">
                    Add Job Offer
                </span>

                <div class="wrap-input1 validate-input" data-validate="Job Position is required">
                    <label>Category:</label>
                    <select name="job_id">
                        <?php foreach ($jobs as $job) : ?>
                            <option value="<?php echo $job['job_id']; ?>">
                                <?php echo $job['job_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Job Position is required">
                    <input class="input1" type="input" name="job_position" placeholder="Job Position">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Company is required">
                    <input class="input1" type="input" name="company" placeholder="Company">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Location is required">
                    <input class="input1" type="input" name="location" placeholder="Location">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Yearly Salary is required">
                    <input class="input1" type="input" name="yearly_salary" placeholder="Yearly Salary">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Job Description is required">
                    <input class="input1" type="input" name="job_description" placeholder="Job Description">
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