<!-- the head section -->

<head>
    <title>Job Application</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Job Application</h1>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="add_record_form.php">Add Record</a>
            <a href="category_list.php">Manage Categories</a>
            <div class="dropdown">
                <button class="dropbtn">Categories
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <?php foreach ($categories as $category) : ?>
                        <a href=".?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </header>