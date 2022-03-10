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
        <h1>Add Record</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="job_id">
            <?php foreach ($jobs as $job) : ?>
                <option value="<?php echo $job['job_id']; ?>">
                    <?php echo $job['job_name']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Job Position:</label>
            <input type="input" name="job_position" Required>
            <br>

            <label>Job Description:</label>
            <input type="input" name="job_description">
            <br>        

            <label>Company:</label>
            <input type="input" name="company">
            <br>   

            <label>Location:</label>
            <input type="input" name="location">
            <br>   

            <label>Yearly Salary:</label>
            <input type="input" name="yearly_salary">
            <br>   
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Record">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>