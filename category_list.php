<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM job
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
    <h1>Job List</h1>
    <br>
    <div class="jobList">
        <?php foreach ($jobs as $job) : ?>
            <div class="firstBox">
                <div class="secondBox">
                <?php echo $job['job_name']; ?>
                <form action="delete_category.php" method="post" id="delete_product_form">
                    <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>

    <h2>Add New Job Category</h2>
    <form action="add_category.php" method="post" id="add_category_form">

        <label>Name:</label>
        <input type="input" name="job_name">
        <input id="add_category_button" type="submit" value="Add">
    </form>
    <br>

    <?php
    include('includes/footer.php');
    ?>