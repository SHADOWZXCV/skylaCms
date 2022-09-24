<?php
    function error_emitter($data){
        if(isset($data['signup-errors'])){
            $error = $data['signup-errors'];
            switch($error){
                case 1062:
                    return "A user with the same username already exists!";
                case 1:
                    return "Please fill all your data!";
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
    <h1>Welcome to skyla ( admin signup section )!</h1>
    <h4>The simplest cms you've ever seen..</h4>
    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" placeholder="enter username" required/>
        <br>
        <label for="password">password</label>
        <input type="password" name="password" placeholder="enter password" required/>
        <p><?php echo error_emitter($data); ?></p>
        <input type="submit" value="signup"/>
    </form>
</body>
</html>