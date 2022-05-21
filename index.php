<!DOCTYPE html>
<!--
Allows user to login or register. You can choose to have a separate registration page.
This page is deliberately left blank.

-->
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script href="js/jquery-3.6.0.min.js" rel="stylesheet" type="text/javascript"></script>
    <script href="js/bootstrap.min.js" rel="stylesheet" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="css/master.css" rel="stylesheet" type="text/css" />
    <script src="js/openForm.js" type="text/javascript"></script>
    <title>Grocery shop</title>
    <link rel="icon" href="images/fu.ico" type="images/x-icon" />
    <title></title>
</head>

<body>
    <br />
    <br />
    <div class="container" id="box-container">
        <br />
        <nav class="navbar navbar-dark bg-dark">
            <button type="button" class="btn btn-dark" id="butt1" onclick="openForm('loginTab')">Login</button>
            <button type="button" class="btn btn-dark" id="butt2" onclick="openForm('registrationTab')">Registration</button>
        </nav>
        <br />
        <div class="formPages" id="registrationTab" style="display: none">
            <legend class="registration-box" style="text-align: center; color: #000;">Register with US!</legend>
            <div class="control-group">
                <form action="login_logout&registration/registration.php" method="post">
                    <input class="form-control" type="text" placeholder="Username" name="username" oninvalid="alert('The username field must be filled');" required>
                    <input class="form-control" type="password" placeholder="Password" name="password" oninvalid="alert('The password field must be filled');" required>
                    <br />
                    <div class="text-center">
                        <button class="btn btn-outline-warning" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="formPages" id="loginTab">
            <legend class="login-box" style="text-align: center; color: #000;">Login Page</legend>
            <div class="loginPage">
                <form class="form" action="login_logout&registration/loginProcess.php" method="post">
                    <input class="form-control" type="text" placeholder="Username" name="username" oninvalid="alert('No username entered');" required>
                    <input class="form-control" type="password" placeholder="Password" name="password" oninvalid="alert('No password entered');" required>
                    <br />
                    <div class="text-center">
                        <button class="btn btn-outline-success" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>