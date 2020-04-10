<?php
    //starting a session

    session_start();

    //initializing variables

    $username = "";
    $email    = "";
    $errors   = array();

    //connect to DB

    $db = new mysqli('localhost', 'root', '96389347', 'php') or die("Could not connect to Database");


    //User registration

    if (isset($_POST['reg_user'])) {
        $name       = mysqli_real_escape_string($db, $_POST['name']);
        $username   = mysqli_real_escape_string($db, $_POST['username']);
        $email      = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        //form validation

        if ( empty($name) )               array_push($errors, "Name is required!") ;
        if ( empty($username) )           array_push($errors, "Username is required!") ;
        if ( empty($email) )              array_push($errors, "E-mail is required!");
        if ( empty($password_1) )         array_push($errors, "Password is required!");
        if ( $password_1 != $password_2 ) array_push($errors, "Passwords does not match");

        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";

        $result = mysqli_query($db, $user_check_query);
        $user   = mysqli_fetch_assoc($result);


        if($user) {

            if($user['username'] === $username) array_push($errors, "Username already exists!");
            if($user['email']    === $username) array_push($errors, "This E-mail id already has a registred username!");

       }

        //register the user if no errors

        if(count($errors) == 0 ) {

            $created  = date("Y-m-d H:i:s");
            $password = md5($password_1); //encrypt password
            $query    = "INSERT INTO users (name, email, username, password, created) VALUES ('$name', '$email', '$username', '$password', '$created' )";

            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "Registration success!";

            header("Location: login.php");
        }
    }


    //User login

    if(isset($_POST['login_user'])) {

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password_1']);

        if(empty($username)) {

            array_push($errors, "Username is required!");
        }

        if(empty($password)) {
        
            array_push($errors, "Password is required!");
        }

        if(count($errors) == 0) {
        
            $password = md5($password);

        }

        $query   = "SELECT * FROM users WHERE username = '$username' AND password='$password' ";
        $results =  mysqli_query($db, $query);

        if(mysqli_num_rows($results)) {

            $_SESSION['username'] = $username;
            $_SESSION['success']  = "Logged in successfully";

            header("Location: index.php");

        } else {

            array_push($errors, "Wrong username or password, please try again.");
         }

    }
?>