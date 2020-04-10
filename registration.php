<?php include('server.php'); ?>
<!doctype html>

<html>
    <head>
        <title> Registration </title>
    </head>
    <body>
        <div class="container"> 
            <div class="header">
                <h2> Register </h2>
            </div>
        
            <form action="registration.php" method="POST"> 

                <?php include('errors.php') ?>

                <div>
                    <label for="name"> Name </label>
                    <input type="text" name="name" placeholder="Insert your name here" required>
                </div>

                <div>
                    <label for="email"> E-mail </label>
                    <input type="email" name="email" placeholder="Insert your e-mail here" required>
                </div>
            
                <div>
                    <label for="username"> Username </label>
                    <input type="text" name="username" placeholder="Insert your username here" required>
                </div>

                <div>
                    <label for="password"> Password </label>
                    <input type="password" name="password_1" placeholder="Insert your password here" required>
                </div>
            
                <div>
                    <label for="password"> Confirm Password </label>
                    <input type="password" name="password_2" placeholder="Insert your password confirmation" required>
                </div>

                <button type="submit" name="reg_user"> subscribe </button>

                <p2> Already a user? <a href="login.php"><b> log in here </b></a></p>

             </form>

        </div>
    </body>
</html>