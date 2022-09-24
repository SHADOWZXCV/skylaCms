<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/templates/admin/styles/admin-articles.style.css">
    <title>Document</title>
</head>
<body>
    <h1>Are you sure you want to delete the following article ?</h1>
    <h4>ID No.: <?php echo $data['id']; ?></h4>
    <h4>Title: <?php echo $data['title']; ?></h4>
    <form method="POST">
        <input type="hidden" name="id" value=<?php echo $data['id']; ?> />
        <input type="submit" name="delete" value="yes" />
        <input type="submit" name="delete" value="no" />
    </form>
</body>
</html>