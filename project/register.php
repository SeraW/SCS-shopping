<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/register.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <div id="register">
        <div id="regarea">
            <h1>Create an <span>Account</span></h1>
            <form action="" method="POST">
                <label for="fname" style="width:90%">First Name</label><br>
                <input id="fname bar" type="text" name = "fname" style="width:90%"  required><br>
                <label for="lname" style="width:90%">Last Name</label><br>
                <input id="lname bar" type="text" name = "lname" style="width:90%"  required><br>
                <label for="email" style="width:90%">Email</label><br>
                <input id="email bar" type="email" name = "email" style="width:90%" required><br>
                <label for="phone" style="width:90%">Phone Number</label><br>
                <input id="phone bar" type="tel" name = "phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" style="width:90%" required><br>
                <label for="address" style="width:90%">Address</label><br>
                <input id="address bar" type="text" name = "address" style="width:90%"  required><br>
                <label for="postal" style="width:90%">Postal Code</label><br>
                <input id="postal bar" type="text" name = "postal" style="width:90%" required><br>
                <label for="username" style="width:90%">Username</label><br>
                <input id="username bar" type="text" name = "username" style="width:90%" required><br>
                <label for="password" style="width:90%">Password</label><br>
                <input id="password bar" type="password" name="password" style="width:90%"   required><br>
                <span class="helper-text" data-error="wrong" data-success="right">Already have an account? <a href="login.php"><u>Sign in</u></a></span><br>
                <button class="btn waves-effect waves-light save-button" type="submit" name="signin" style="margin-top:30px;background:#149BBB">Create Account
                    <i class="material-icons right">send</i>
                </button><br>
            </form>
        </div>
    </div>
</body>
</html>