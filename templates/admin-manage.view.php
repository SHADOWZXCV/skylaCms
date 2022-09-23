<?php
    function is_from_successful_signin(){
        // echo $_SESSION;
        if(isset($_SESSION['signin-successful'])) {
            unset($_SESSION['signin-successful']);
            return "successful signin!";
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
    <p><?php echo is_from_successful_signin(); ?></p>
    <h1>Welcome to skyla ( admin manage section )!</h1>
    <h4>The simplest cms you've ever seen..</h4>
    <a href="/admin/articles">Articles</a>
</body>
</html>