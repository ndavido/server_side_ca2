<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Record List</h1>

    <section>
        <!-- display a table of records -->
        <h2><?php echo $category_name; ?></h2>
        <div>
            <?php foreach ($records as $record) : ?>
                <div>
                    <p><img src="image_uploads/<?php echo $record['image']; ?>" width="100px" height="100px" /></p>
                    <p><?php echo $record['name']; ?></p>
                    <p class="right"><?php echo $record['price']; ?></p>
                    <button>
                        <form action="delete_record.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </button>
                    <button>
                        <form action="edit_record_form.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

        <?php foreach ($records as $record) : ?>
            <section>
                <div class="row row-sm row-40 row-md-50">
                    <div class="col-sm-6 col-md-12 wow fadeInRight">
                        <!-- Product Big-->
                        <article class="product-big">
                            <div class="unit flex-column flex-md-row align-items-md-stretch">
                                <div class="unit-left"><a class="product-big-figure" href="#"><img src="image_uploads/<?php echo $record['image']; ?>" alt="" width=" 600" height="366" /></a></div>
                                <div class="unit-body">
                                    <div class="product-big-body">
                                        <h5 class="product-big-title"><?php echo $record['name']; ?></h5>

                                        <p class="product-big-text">Benidorm is a buzzing resort with a big reputation for beach holidays. Situated in sunny Costa Blanca, the town is one of the original Spanish beach resorts...</p>

                                        <div class="button button-black-outline button-ujarak">
                                            <button>
                                                <form action="delete_record.php" method="post" id="delete_record_form">
                                                    <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                                                    <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                                                    <input type="submit" value="Delete">
                                                </form>
                                            </button>
                                            <button>
                                                <form action="edit_record_form.php" method="post" id="delete_record_form">
                                                    <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                                                    <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                                                    <input type="submit" value="Edit">
                                                </form>
                                            </button>
                                        </div>

                                        <div class="product-big-price-wrap"><span class="product-big-price"><?php echo $record['price']; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>



    </section>
    <?php
    include('includes/footer.php');
    ?>