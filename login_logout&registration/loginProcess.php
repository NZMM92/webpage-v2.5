<?php
session_start();
session_regenerate_id();
// php file that contains the common database connection code
include "../db_stuff/db.php";
//include "../db_stuff/test_db.php";

$entered_username = $_POST['username'];
$entered_password = hash('sha256', $_POST['password']);
$msg = "";
$stmt = $conn->prepare("SELECT * FROM users
           WHERE user_name=(:eu)
           AND password = (:ep)");
$stmt->bindParam(":eu", $entered_username, PDO::PARAM_STR);
$stmt->bindParam(":ep", $entered_password, PDO::PARAM_STR);
$stmt->execute();
$img = "../images/Red-Cross-Mark-Download-PNG.png";

if ($stmt) {
    $rows = $stmt->fetchAll();
    foreach ($rows as $row) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        header("Location: ../Grocery_store_app.php");
    }
} else {
    $msg = "<p>Please try again username or password is wrong</p>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/registration.css" rel="stylesheet" type="text/css" />
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <link href="../css/master.css" rel="stylesheet" type="text/css" />
    <title>Grocery shop</title>
    <link rel="icon" href="images/fu.ico" type="images/x-icon" />
</head>

<body>
    <br />
    <br />
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" id="img" src="<?php echo $img; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Login Failed</p>
            </h5>
            <p class="card-text">Please try again username or password is wrong</p>
            <a href="../index.php" class="btn btn-dark">Back To Login Page</a>
        </div>
    </div>
</body>

</html>