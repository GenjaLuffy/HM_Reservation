<?php include_once './db-connect.php';

function book_room($room_id, $user_id, $qty)
{
    global $con;

    $stmt = $con->prepare('SELECT * FROM bookings WHERE user = ? AND room = ?');
    $stmt->bind_param('ii', $user_id, $room_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $con->prepare('UPDATE bookings SET qty = qty + ? WHERE user = ? AND room = ?');
        $stmt->bind_param('iii', $qty, $user_id, $room_id);
        if ($stmt->execute()) {
            echo '<script>alert("Your booking is updated.")</script>';
        }
        return;
    }

    $stmt = $con->prepare('INSERT INTO bookings(user, room, qty) VALUES(?,?,?)');
    $stmt->bind_param('iii', $user_id, $room_id, $qty);
    if ($stmt->execute()) {
        echo '<script>alert("You have successfully booked room.")</script>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['room_book'])) {
        session_start();

        $qty = $_POST['quantity'];
        $id = $_POST['room_id'];
        $user_id = $_POST['user_id'];


        book_room($id, $user_id, $qty);
        session_abort();
    }
}

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
    <!-- start of header -->
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
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        // Check if admin
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                            echo '<a class="btn btn-outline-light me-2" href="../backend/admin.php">Dashboard</a>';
                        }
                        echo '<a class="btn btn-outline-light me-2" href="../backend/logout.php">Logout</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->


    <!-- start of content -->

    <div class="container-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <h1>Rooms</h1>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php

                        $stmt = $con->prepare('SELECT * FROM rooms');
                        $stmt->execute();

                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $rooms = $result->fetch_all(MYSQLI_ASSOC);
                        }

                        $roomTypeImageDir = 'assets/img/';  // Define the image directory path

                        foreach ($rooms as $room) {
                        ?>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="<?= $roomTypeImageDir . $room['image']; ?>" alt="" class="card-img-top" />
                                    <div class="card-body">
                                        <h5><?= $room['room_type']; ?></h5>
                                        <p class="card-text">
                                            <?= $room['description']; ?>
                                        </p>
                                        Status:
                                        <form method="post">
                                            <div class="row align-items-center mt-3">
                                                <div class="col-6">
                                                    <input type="number" name="quantity" min="0" max="<?php echo $room["quantity"]; ?>" id="" value="1" />
                                                    <input type="hidden" name="room_id" value="<?php echo $room['id']; ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" name="room_book" class="btn btn-outline-success me-2 book-btn">Book</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }


                        ?>


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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>