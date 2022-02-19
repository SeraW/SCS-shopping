<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <div id="login">
        <div id="loginarea">
            <h1>Sign <span>In</span></h1>
            <form action="" method="POST">
                <label for="username" style="width:90%">Username</label>
                <input id="username bar" type="text" name = "username" style="width:90%"  required><br>
                <label for="password" style="width:90%">Password</label>
                <input id="password bar" type="password" name="password" style="width:90%"  required><br>
                <span class="helper-text" data-error="wrong" data-success="right">Don't have an account? <a href="register.php"><u>Create an Account</u></a></span><br>
                <button class="btn waves-effect waves-light save-button" type="submit" name="signin" style="margin-top:30px;background:#149BBB">Sign In
                    <i class="material-icons right">send</i>
                </button><br>
            </form>
        </div>
    </div>
</body>
</html>