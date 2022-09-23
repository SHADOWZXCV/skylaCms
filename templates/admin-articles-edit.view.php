<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/templates/styles/admin-articles-edit.style.css">
    <title>Document</title>
</head>
<body>
    <h2>Edit article: <?= $data['title']; ?></h2>
    <div id="Edit-Container">
        <form method="POST">
        <fieldset>
            <div class="Input-Container">
                <label for="title">Title: </label>
                <input class="text" type="text" name="title" value="<?= $data['title'] ?>" placeholder="Enter the new title.." />
            </div>
            <div class="Input-Container">
                <label for="description">Description: </label>
                <input class="text" type="text" name="description" value="<?= $data['description'] ?>" placeholder="Enter the new title.." />
            </div>
            <div class="Input-Container">
                <label for="content">Content: </label>
                <textarea cols="20" rows="7" class="text" name="content" placeholder="Enter the new title.."><?= $data['content'] ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $data['id'] ?>" />
            <input type="submit" name="confirmEdit" value="edit" />
        </fieldset>
        </form>
    </div>
</body>
</html>