<?php 
    function error_emitter($data){
        if(isset($data['no-data'])){
            $error = $data['no-data'];
            unset($data['no-data']);

            return "Please fill the title!";

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/templates/admin/styles/admin-articles-edit.style.css">
    <title>Document</title>
</head>
<body>
    <?php echo error_emitter($data); ?>
    <h2>Add a new article</h2>
    <div id="Edit-Container">
        <form method="POST">
        <fieldset>
            <div class="Input-Container">
                <label for="title">Title: </label>
                <input class="text" type="text" name="title" placeholder="Enter the new title.." required/>
            </div>
            <div class="Input-Container">
                <label for="description">Description: </label>
                <input class="text" type="text" name="description" placeholder="Enter the new title.." />
            </div>
            <div class="Input-Container">
                <label for="content">Content: </label>
                <textarea cols="20" rows="7" class="text" name="content" placeholder="Enter the new title.."></textarea>
            </div>
            <input type="submit" name="add" value="publish" />
        </fieldset>
        </form>
    </div>
</body>
</html>