<?php
    session_start();
    function is_from_successful_signup(){
        if(isset($_SESSION['signup-successful'])) {
            unset($_SESSION['signup-successful']);
            return "successful signup!";
        }
    }

    function error_emitter($data){
        if(isset($data['signup-errors'])){
            $error = $data['signup-errors'];
            switch($error){
                case -1:
                    return "Incorrect username or password!";
                default: break;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo is_from_successful_signup(); ?></p>
    <h1>Welcome to skyla ( admin login section )!</h1>
    <h4>The simplest cms you've ever seen..</h4>
    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" placeholder="enter username" required/>
        <label for="password">password</label>
        <input type="password" name="password" placeholder="enter password" required/>
        <p><?php echo error_emitter($data); ?></p>
        <input type="submit" value="login"/>
    </form>

    <a href="/adminsignup">Signup!</a>
</body>
</html>