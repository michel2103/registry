<?php include('server.php') ?>
<!doctype html>

<html>
    <head>
        <title> Login </title>
    </head>
    <body>
        <div class="container"> 
            <div class="header">
                <h2> Login </h2>
            </div>
        
            <form action="login.php" method="POST"> 

                <div>
                    <label for="username"> Username </label>
                    <input type="text" name="username" placeholder= "Insert your username here" required>
                </div>

                <div>
                    <label for="password"> Password </label>
                    <input type="password" name="password_1" placeholder= "Insert your password here"  required>
                </div>

                <button type="submit" name="login_user"> Log in </button>

                <p2> Not a user? <a href="registration.php"><b> Register here </b></a></p>

             </form>

        </div>
    </body>
</html>