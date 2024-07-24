<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM tours";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Tours</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <h2>Available Tours</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row["name"]. "</h3>";
            echo "<p>" . $row["description"]. "</p>";
            echo "<p>Price: $" . $row["price"]. "</p>";
            echo "<a href='book.php?tour_id=" . $row["tour_id"] . "'>Book Now</a>";
            echo "</div>";
        }
    } else {
        echo "No tours available";
    }
    ?>
    <a href="logout.php">Logout</a>
</body>
</html>
