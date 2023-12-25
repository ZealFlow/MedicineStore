<?php
    $User = $_SESSION['User'] ?? null;
?>

<header>
    <div class="p-3 text-center bg-white border-bottom">
        <div class="container">
            <div class="row gy-3">
                <!-- Left elements -->
                <div class="col-lg-2 col-sm-4 col-4">
                    <a href="HomeController.php" target="_blank" class="float-start">
                        <img src="https://www.onlinelogomaker.com/blog/wp-content/uploads/2017/12/medical-logo-design-1024x819.jpg" height="50" />
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                    <div class="d-flex float-end">
                        <a href="CartController.php" class="border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                            <i class="fas fa-shopping-cart m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">My cart</p>
                        </a>
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                            <i class="fas fa-heart m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Wishlist</p>
                        </a>
                        <?php if ($User == null): ?>
                            <a href="LoginController.php" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                                <i class="fas fa-user-alt m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">Sign in</p>
                            </a>
                            <a href="RegisterController.php" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                                <i class="fas fa-user-alt m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">Sign up</p>
                            </a>
                        <?php endif; ?>
                        <?php if ($User != null): ?>
                            <div class="dropdown">
                                <a href="#" id="userLink" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-alt m-1 me-md-2"></i>
                                    <p class="d-none d-md-block mb-0 text-truncate" style="max-width: 150px;">
                                        <?= $User->getFullName(); ?>
                                    </p>
                                </a>
                                
                                <ul class="dropdown-menu" aria-labelledby="userLink">
                                    <li>
                                        <form action="HomeController.php?ac=sign-out" method="post">
                                            <button class="dropdown-item" name="ac" value="sign-out">Sign Out</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="home" method="post">
                                            <button class="dropdown-item">Customize Profile</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Center elements -->

                <!-- Right elements -->
                <div class="col-lg-5 col-md-12 col-12">
                    <form class="form-inline d-flex" action="ProductsController.php" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="q">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <!-- Right elements -->
            </div>
        </div>
    </div>
    <!-- Jumbotron -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <!-- Container wrapper -->
        <div class="container justify-content-center justify-content-md-between">
            <!-- Toggle button -->
            <button class="navbar-toggler border py-2 text-dark" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarLeftAlignExample" aria-controls="navbarLeftAlignExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>