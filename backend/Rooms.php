<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rooms</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!-- start of nav bar -->
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../backend/index.php" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Contact</a></li>
                    <li><a href="../backend/Rooms.php" class="nav-link px-2 text-white">Rooms</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>
                <div class="text-end">
                    <?php if (isset($_SESSION['user_id'])) {
                    ?>
                    <a class="btn btn-outline-light me-2" href="../backend/logout.php">Logout</a>


                    <?php } else {
                    ?>
                    <button type="button" class="btn btn-outline-light me-2">
                        <a href="../backend/login.php">Login</a>
                    </button>
                    <button type="button" class="btn btn-warning"> <a href="../backend/signup.php">Sign-up</a></button>

                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </header>
    <!--End of nav bar-->
    <!-- start of content -->

    <div class="container-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <h1>Rooms</h1>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="assets/img/singleroom.webp" alt="" class="card-img-top" />
                                <div class="card-body">
                                    <h5>Single</h5>
                                    <p class="card-text">
                                        A room assigned to one person. May have one or more beds.
                                        The room size or area of Single Rooms are generally
                                        between 37 m² to 45 m².
                                    </p>
                                    Status:
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <form action="">
                                                <input type="number" name="quantity" min="0" max="15" id="" value="0" />
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-success me-2">
                                                <a href="#">Book</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="assets/img/Double-Room.webp" alt="" class="card-img-top" />

                                <div class="card-body">
                                    <h5>Double</h5>
                                    <p class="card-text">
                                        A room assigned to two people. May have one or more beds.
                                        The room size or area of Double Rooms are generally
                                        between 40 m² to 45 m².
                                    </p>
                                    Status:
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <form action="">
                                                <input type="number" name="quantity" min="0" max="15" id="" value="0" />
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-success me-2">
                                                <a href="#">Book</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="assets/img/Queen-Room.webp" alt="" class="card-img-top" />
                                <div class="card-body">
                                    <h5>Queen</h5>
                                    <p class="card-text">
                                        A room with a queen-sized bed. May be occupied by one or
                                        more people. The room size or area of Queen Rooms are
                                        generally between 32 m² to 50 m².
                                    </p>
                                    Status:
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <form action="">
                                                <input type="number" name="quantity" min="0" max="15" id="" value="0" />
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-success me-2">
                                                <a href="#">Book</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="assets/img/King-Room.webp" alt="" class="card-img-top" />
                                <div class="card-body">
                                    <h5>King</h5>
                                    <p class="card-text">
                                        A room with a king-sized bed. May be occupied by one or
                                        more people. The room size or area of King Rooms are
                                        generally between 32 m² to 50 m².
                                    </p>
                                    Status:
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <form action="">
                                                <input type="number" name="quantity" min="0" max="15" id="" value="0" />
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-success me-2">
                                                <a href="#">Book</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="assets/img/Twin-Room.webp" alt="" class="card-img-top" />
                                <div class="card-body">
                                    <h5>Twin</h5>
                                    <p class="card-text">
                                        A room with two twin beds. May be occupied by one or more
                                        people. The room size or area of Twin Rooms are generally
                                        between 32 m² to 40 m².
                                    </p>
                                    Status:
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <form action="">
                                                <input type="number" name="quantity" min="0" max="15" id="" value="0" />
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-success me-2">
                                                <a href="#">Book</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="assets/img/Quad-Room.webp" alt="" class="card-img-top" />
                                <div class="card-body">
                                    <h5>Quad</h5>
                                    <p class="card-text">
                                        A room assigned to four people. May have two or more beds.
                                        The room size or area of Quad Rooms are generally between
                                        70 m² to 85 m².
                                    </p>
                                    Status:
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <form action="">
                                                <input type="number" name="quantity" min="0" max="15" id="" value="0" />
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-success me-2">
                                                <a href="#">Book</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end of content -->



    <!-- start of footer -->
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">About</a>
                </li>
            </ul>
            <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
        </footer>
    </div>
    <!-- end of footer -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>