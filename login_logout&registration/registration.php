<?php
include "../db_stuff/db.php";
//include "../db_stuff/test_db.php";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$username = stripslashes($username);
$username = htmlspecialchars($username);
$sqlQuery = $conn->prepare("SELECT * FROM users WHERE user_name = (:user)");
$sqlQuery->bindParam(":user", $username);
$sqlQuery->execute();
$results = $sqlQuery-> rowCount();
if ($results == 1) {
    $message = "The selected username '$username' already exist please try again with another username";
    $message1 = "Account not Created";
    $img = "../images/Red-Cross-Mark-Download-PNG.png";
} else {
    $query = $conn->prepare("INSERT INTO users(user_name, password) VALUES (:userInsert, :passwordInsert)");
    $query->bindParam(":userInsert", $username);
    $query->bindParam(":passwordInsert", $password);
    $status = $query->execute();
    if ($status) {
        $message = "\n Successful Account Creation";
        $message1 = "Account Created Successfully";
        $img = "../images/check-mark-green-tick-mark-symbol-recycling-symbol-text-logo-transparent-png-1725288.png";
    } else {
        $message = "\n The selected username $username already exist please select another one";
    }
}
mysqli_close($link);
?>
<!DOCTYPE HTML>
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
    <title>doRegister page</title>
</head>

<body>
    <br />
    <br />
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" id="img" src="<?php echo $img; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $message1 ?></p>
            </h5>
            <p class="card-text"><?php echo $message ?></p>
            <a href="../index.php" class="btn btn-dark">Back To Login Page</a>
        </div>
    </div>
</body>

</html>