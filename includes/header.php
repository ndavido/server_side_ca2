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


    <!-- <header class="section page-header">
         Navbar
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
              <div class="rd-navbar-aside">
                 RD Navbar Panel
                <div class="rd-navbar-panel">
                   RD Navbar Toggle
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                   RD Navbar Brand
                  <div class="rd-navbar-brand">
                    Branda class="brand" href="index.html"><img src="images/logo-default-450x37.png" alt="" width="225" height="18"/></a>
                  </div>
                </div>
                <div class="rd-navbar-aside-right rd-navbar-collapse">
                  <ul class="rd-navbar-corporate-contacts">
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                        <div class="unit-body">
                          <p>09:00<span>am</span> — 05:00<span>pm</span></p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                        <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                      </div>
                    </li>
                  </ul><a class="button button-md button-default-outline-2 button-ujarak" href="#">Get a Free Quote</a>
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                 Add Search Bar Here Instead
                  <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                  </ul> 
                
                   RD Navbar Nav
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">Add Record</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Manage Categories</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Categories</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header> -->