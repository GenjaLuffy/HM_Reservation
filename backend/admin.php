<?php
session_start();

include_once './db-connect.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Establish a database connection
$con = new mysqli($server, $user, $password, $db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['booking_delete'])) {


        $id = $_POST['booking_id'];

        $b_query = "DELETE FROM bookings WHERE id = $id";
        $b_result = mysqli_query($con, $b_query);
        if ($b_result) {
            echo '<script>alert("The booking deleted successfully.")</script>';
        }
    }
}

// Retrieve rooms
$rooms = array();
$query = "SELECT id, room_type, quantity FROM rooms";
$result = mysqli_query($con, $query);

// Check if the query executed successfully
if ($result) {
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error executing query: " . mysqli_error($con);
}

// Retrieve booked rooms
$booked_rooms = array();
$book_query = "SELECT * FROM bookings";
$book_result = mysqli_query($con, $book_query);

// Check if the query executed successfully
if ($book_result) {
    $booked_rooms = mysqli_fetch_all($book_result, MYSQLI_ASSOC);
} else {
    echo "Error executing query: " . mysqli_error($con);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
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
                    <?php
                    // session_start();
                    if (isset($_SESSION['user_id'])) {
                        // Check if admin
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                            echo '<a class="btn btn-outline-light me-2" href="../backend/admin.php">Dashboard</a>';
                        }
                        echo '<a class="btn btn-outline-light me-2" href="../backend/logout.php">Logout</a>';
                    } else {
                        echo '<button type="button" class="btn btn-outline-light me-2"><a href="../backend/login.php">Login</a></button>';
                        echo '<button type="button" class="btn btn-warning"><a href="../backend/signup.php">Sign-up</a></button>';
                    }

                    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                        // Redirect to login page or display an error message
                        header('Location: ../backend/index.php');
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <div class="container-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <?php if ($_SESSION['role'] === 'admin') : ?>
                    <h1>Admin Panel</h1>

                    <!-- Rooms Table -->
                    <h2>Rooms</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Room ID</th>
                                    <th>Room Name</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rooms as $room) : ?>
                                <tr>
                                    <td>
                                        <? $room['id']; ?>
                                    </td>
                                    <td>
                                        <? $room['room_type']; ?>
                                    </td>
                                    <td>
                                        <? $room['quantity']; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm edit-btn"
                                            data-toggle="modal" data-target="#editModal"
                                            data-room-id="<?= $room['id']; ?>">Edit</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Booked Rooms Table -->
                    <h2>Booked Rooms</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>User First Name</th>
                                <th>User Last Name</th>
                                <th>Room Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($booked_rooms as $room) :

                                    $stmt = $con->prepare("SELECT * FROM dbms_userinfo WHERE ID = ?");
                                    $stmt->bind_param('i', $room['user']);
                                    if ($stmt->execute()) {
                                        $result = $stmt->get_result();

                                        $user = $result->fetch_array(MYSQLI_ASSOC);
                                    }



                                    $u_stmt = $con->prepare("SELECT * FROM rooms WHERE id = ?");
                                    $u_stmt->bind_param('i', $room['room']);
                                    $u_stmt->execute();
                                    $u_result = $u_stmt->get_result();

                                    $room_info = $u_result->fetch_array(MYSQLI_ASSOC);

                                ?>
                            <tr>
                                <td><?= $room['id']; ?></td>
                                <td><?= $user['firstname']; ?></td>
                                <td><?= $user['lastname']; ?></td>
                                <td><?= $room_info['room_type'] . ' x ' . $room['qty']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="booking_id" value="<?php echo $room['id']; ?>">
                                        <button type="submit" name="booking_delete"
                                            class="btn btn-danger btn-sm edit-btn">Delete</button>

                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p>You are not authorized to view this page.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="p-3 text-center text-white bg-dark fixed-bottom">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>