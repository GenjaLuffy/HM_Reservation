<?php
include 'db-connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $mobile = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $emailquery = "SELECT * FROM dbms_userinfo WHERE email='$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount > 0) {
        echo '<script> alert("Email already exists")</script>';
    } else {
        $insertquery = "INSERT INTO dbms_userinfo(firstname, lastname, phoneno, email, password)VALUES('$firstname', '$lastname', '$mobile', '$email', '$password')";
        $iquery = mysqli_query($con, $insertquery);
        if ($iquery) {
            echo '<script>alert("Account create Successfully")</script>';
        } else {
            echo '<script>alert("Account Doesnot Create")</script>';
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-up</title>
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
                    <li><a href="#" class="nav-link px-2 text-white">Rooms</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">
                        <a href="../backend/login.php">Login</a>
                    </button>
                    <button type="button" class="btn btn-warning"> <a href="../backend/signup.php">Sign-up</a></button>
                </div>
            </div>
        </div>
    </header>
    <!--End of nav bar-->

    <!-- start of signin  -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form class="login-hm" method="Post">
                    <h1 class="h3 mb-3 fw-normal">Please Sign-Up</h1>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Firstname" name="fname" required />
                        <label for="floatingInput">Firstname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Lastname" name="lname" required />
                        <label for="floatingInput">Lastname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="number" name="phone" required />
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required />
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required />
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me" /> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">
                        Sign-Up
                    </button>
                </form>
            </div>
        </div>
    </div>

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