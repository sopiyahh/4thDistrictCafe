<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>4th District Cafe</title>
    <link rel="icon" href=".\images\logo.png" type="image/icon type">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
<!-- 
<?php
include('php/db.php');

?> -->


    <!-- header section starts  -->

    <header class="header">
        <section class="flex">
            <div class="logo-container">
                <a href="#" class="logo">
                    <img src=".\images\logo.png" alt="">
                </a>
                <span class="cafe-name">4th District Cafe</span>
            </div>
            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#menu">menu</a>
                <a href="#products">products</a>
                <a href="#review">reviews</a>
                <a href="#login">account</a>
                <a href="#blogs">blogs</a>
            </nav>
                <div class="icons">
                    <?php if (isset($_SESSION["username"]) || !empty($_SESSION["username"])) { ?>
                        <div class="fas fa-user" id="user-btn"></div>
                        <div class="fas fa-shopping-cart" id="cart-btn"></div>
                    
                    <?php } ?>
                    <div class="fas fa-bars" id="menu-btn"></div>
                </div>
            <!-- 
            <div class="search-form">
                <input type="search" id="search-box" placeholder="Search here">
                <label for="search-box" class="fas fa-search"></label>
            </div> -->
        </section>

        <div id="container-menu">
            <div id="sidebar">
                <a href="#profile">Profile</a>
                <a href="#cart">Cart</a>
                <a href="#orders">Orders</a>
                <a href="#history">Order History</a>
            </div>
            <div id="content-menu">
                <section id="profile">
                    <h2>Profile</h2>
                    <h3>Personal Information</h3>
                    <h4>Customize your profile here by filling up the form below. Then click on the "Save Changes" button to change your profile informations.</h4>
                    <form method="POST" action="php/update_profile.php">
                        <div>
                            <label for="fullname">Fullname:</label>
                            <input type="text" id="fname" name="fullname" value="" required>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="" required>
                        </div>
                        <div>
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" value="" required>
                        </div>
                        <div style="grid-column: 1/-1;">
                            <label for="address">Address:</label>
                            <input type="text" id="addr" name="address" value="" required>
                        </div>
                        <div>
                            <label for="username">Username:</label>
                            <input type="text" id="uname" name="username" value="" readonly>
                        </div>
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" id="pass" name="password" value="" required>
                        </div>
                        <div>
                            <label for="confirm-password">Confirm Password:</label>
                            <input type="password" id="confirm-password" name="confirm-password" value="" required>
                        </div>
                        <div style="grid-column: 1/-1;display: block;">
                            <button class="btn save" type="button" onclick="updateAcct_click(event)">Save Changes</button>
                        </div>
                    </form>
                    <h3>Account Management</h3>
                    <h4>From here you can manage your account.</h4>
                    <div class="acct-mgt">
                        <div>
                            <h4>Logout from your account</h4>
                            <button class="btn" id="logout-acct" onclick="logout_click(event)">Logout</button>
                        </div>
                        <div>
                            <h4>Delete your account</h4>
                            <button class="btn" id="delete-acct" onclick="deleteAcct_click(event)">Delete</button>
                        </div>
                    </div>
                </section>

                <section id="cart">
                    <h2>Cart</h2>
                    <h4>Here are the items you have added to your cart.</h4>
                    <!-- Cart items list -->
                    <div class="body-contents">
                        <div id="cart-list"></div>
                        <div class="total-price">Total: ₱0.00</div>
                        <button class="btn" onclick="checkoutCart_click(event)">checkout now</button>
                    </div>
                </section>

                <section id="orders">
                    <h2>Orders on Delivery</h2>
                    <h4>Here are the items on delivery.</h4>
                    <div id="orders-list"></div>
                </section>

                <section id="history">
                    <h2>Received Order History</h2>
                    <h4>Here are the items you have ordered and received.</h4>
                    <div id="orders-list"></div>
                </section>
            </div>
        </div>
<!-- 

        <div class="cart-items-container">
            <div class="body-contents">
                <div class="total-price">Total: ₱0.00</div>
                <a href="#" class="btn">checkout now</a>
            </div>
        </div> -->
    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <div class="home-container">

        <section class="home" id="home">

            <div class="content">
                <h3>Brewed to Perfection in the 4th District</h3>
                <p>Come join us for a flavorful journey that will ignite your senses and warm your soul.</p>
                <a href="#menu" class="btn">get yours now</a>
            </div>

        </section>

    </div>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src=".\images\about-img.jpg_large" alt="">
            </div>

            <div class="content">
                <h3>what makes our coffee special?</h3>
                <p>At 4th District Cafe, we take pride in serving coffee that is truly exceptional. What sets our coffee
                    apart is the meticulous selection of premium beans sourced from renowned coffee-growing regions
                    around the world. Each batch of beans undergoes a precise and dedicated roasting process to unlock
                    the full potential of their flavors.</p>
                <p>Our skilled baristas craft each cup with passion and expertise, ensuring that every sip delivers a
                    rich, nuanced taste experience. Every cup of coffee at 4th District Cafe is a testament to our
                    commitment to quality and excellence. Experience the difference for yourself and savor the
                    extraordinary flavors that make our coffee truly special.</p>
                <a href="#" class="btn">learn more</a>
            </div>

        </div>

    </section>

    

    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="menu" id="menu">
        <h1 class="heading"> our <span>menu</span> </h1>
        <div class="box-container">

        </div>
    </section>

    <!-- menu section ends -->

    <!-- products section starts -->

    <section class="products" id="products">
        <h1 class="heading"> more <span>products</span> </h1>
        <div class="box-container">

        </div>

    </section>
    <!-- products section ends -->

    
    <?php
    if (isset($_SESSION["username"]) || !empty($_SESSION["username"])) {
        ?>
    
        <section class="favorites" id="favorites">
            <h1 class="heading">your <span>favorites</span> </h1>
            <div class="box-container">
            </div>
        </section>
    
        <?php
    }
    ?>

    <!-- login section starts  -->

    <!-- html body for login form -->
    <div class="account" id="account">
  
    </div>
    

    <!-- login section ends -->


    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> customer <span>reviews</span> </h1>

        <div class="box-container">

            <div class="box empty">
                <img src=".\images\quote-img.png" alt="" class="quote">
                <p>Natikman ko na lahat ng coffee shops sa EMA Town pero dito ako bumabalik-balik kasi yung aroma tsaka
                    lasa ng kape obvious na mamahaling ingredients ang ginamit💛💛. MapagMAHAL din barista nila dito😂😂
                </p>
                <img src=".\images\pic-1.png" class="user" alt="">
                <h3>Eralyn Jane Mañosca</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="box empty">
                <img src=".\images\quote-img.png" alt="" class="quote">
                <p>Maliit yung lugar, didn't expect it was a coffee shop. Just got curious at the signage. Anyway, I
                    ordered their Matcha Latte and it is good. I will return to buy another one.</p>
                <img src=".\images\pic-2.png" class="user" alt="">
                <h3>Harpy Setrof</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>



        </div>

    </section>

    <!-- review section ends -->
    <!-- blogs section starts  -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> our <span>blogs</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <a href="https://www.facebook.com/4thDistrictCafe/posts/127752826883868" target="_blank">
                        <img src=".\images\blog-1.png" alt="">
                    </a>
                </div>
                <div class="content">
                    <a href="https://www.facebook.com/4thDistrictCafe/posts/127752826883868" target="_blank"
                        class="title">Coffee Session with the Masters</a>
                    <span>17th February, 2023</span>
                    <p>Coffee session with the masters is always a great time. Learning from their years of experience
                        and knowledge is an opportunity that we're always grateful for.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <a href="https://www.facebook.com/4thDistrictCafe/posts/128923873433430" target="_blank">
                        <img src=".\images\blog-2.png" alt="">
                    </a>
                </div>
                <div class="content">
                    <a href="https://www.facebook.com/4thDistrictCafe/posts/128923873433430" target="_blank"
                        class="title">A Great Way to Spend a Sunday</a>
                    <span>19th February, 2023</span>
                    <p>Coffee and relaxation time is always a good combination.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <a href="https://www.facebook.com/4thDistrictCafe/posts/160748133584337" target="_blank">
                        <img src=".\images\blog-3.png" alt="">
                    </a>
                </div>
                <div class="content">
                    <a href="https://www.facebook.com/4thDistrictCafe/posts/160748133584337" target="_blank"
                        class="title">The Perfect Companion</a>
                    <span>6th April, 2023</span>
                    <p>A good cup of coffee is the perfect companion for any journey. Whether it's a long commute or a
                        holiday road trip, make sure to grab one on the way!</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

    </section>

    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="share">
            <a href="https://www.facebook.com/4thDistrictCafe" target="_blank" class="fab fa-facebook-f"></a>
            <a href="https://www.instagram.com/4thdistrictcafe/" target="_blank" class="fab fa-instagram"></a>
        </div>

        <div class="links">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#products">products</a>
            <a href="#review">reviews</a>
            <a href="#login">account</a>
            <a href="#blogs">blogs</a>
        </div>

        <div class="credit">created by <span>4th District Cafe</span> | all rights reserved</div>

    </section>

    <!-- footer section ends -->

    <!-- custom js file link  -->
    
    <script>
        // Use Fetch API to include PHP file
        loggedIn = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
        is_login = loggedIn == "" ? true : false;

    </script>
    <script src="js/script.js"></script>
</body>

</html>