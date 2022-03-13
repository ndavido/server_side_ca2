<?php
require_once('database.php');

// Get category ID
if (!isset($job_id)) {
    $job_id = filter_input(
        INPUT_GET,
        'job_id',
        FILTER_VALIDATE_INT
    );
    if ($job_id == NULL || $job_id == FALSE) {
        $job_id = 1;
    }
}

// Get name for current category
$queryJob = "SELECT * FROM job
WHERE job_id = :job_id";
$statement1 = $db->prepare($queryJob);
$statement1->bindValue(':job_id', $job_id);
$statement1->execute();
$job = $statement1->fetch();
$statement1->closeCursor();
$job_name = $job['job_name'];

// Get all categories
$queryAllJobs = 'SELECT * FROM job
ORDER BY job_id';
$statement2 = $db->prepare($queryAllJobs);
$statement2->execute();
$jobs = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryOffers = "SELECT * FROM joboffers
WHERE job_id = :job_id
ORDER BY offer_id";
$statement3 = $db->prepare($queryOffers);
$statement3->bindValue(':job_id', $job_id);
$statement3->execute();
$offers = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <!--Displaying Data-->
    <?php foreach ($offers as $offer) : ?>
        <section class="section section-sm bg-default">
            <div class="row row-sm row-40 row-md-50">
                <div class="col-sm-6 col-md-12 wow fadeInRight">
                    <!-- Product Big-->
                    <article class="product-big">
                        <div class="unit flex-column flex-md-row align-items-md-stretch">
                            <div class="unit-left"><a class="product-big-figure" href="#"><img src="image_uploads/<?php echo $offer['image']; ?>" alt="" width="300" height="366" /></a></div>
                            <div class="unit-body">
                                <div class="product-big-body">
                                    <h5 class="product-big-title"><?php echo $offer['job_position']; ?></h5>
                                    <div class="group-sm group-middle justify-content-start">
                                        <p class="product-big-reviews"><i class="fa fa-home"> <?php echo $offer['company']; ?></i></p>
                                        <br>
                                        <p class="product-big-reviews"><i class="fa fa-map-marker"> <?php echo $offer['location']; ?></i></p>
                                    </div>
                                    <br>
                                    <p class="product-big-text"><?php echo $offer['job_description']; ?></p>

                                    <form action="delete_record.php" method="post" id="delete_record_form">
                                        <input type="hidden" name="offer_id" value="<?php echo $offer['offer_id']; ?>">
                                        <input type="hidden" name="job_id" value="<?php echo $offer['job_id']; ?>">
                                        <input class="button" type="submit" value="Delete">
                                    </form>
                                    <form action="edit_record_form.php" method="post" id="delete_record_form">
                                        <input type="hidden" name="offer_id" value="<?php echo $offer['offer_id']; ?>">
                                        <input type="hidden" name="job_id" value="<?php echo $offer['job_id']; ?>">
                                        <input class="button" type="submit" value="Edit">
                                    </form>

                                    <div class="product-big-price-wrap"><span class="product-big-price"><?php echo $offer['yearly_salary']; ?></span></div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <br />
    <?php endforeach; ?>

    <?php
    include('includes/footer.php');
    ?>