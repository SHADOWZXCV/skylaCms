<?php
    function error_emitter(){
        if(isset($_SESSION['delete-no-article-found'])){
            $id = $_SESSION['delete-no-article-found'];
            unset($_SESSION['delete-no-article-found']);

            return "No article found by the ID: (" . $id . ") !";

        } else if(isset($_SESSION['edit-no-article-found'])){
            $id = $_SESSION['edit-no-article-found'];
            unset($_SESSION['edit-no-article-found']);

            return "No change on the article, or no article found by the ID: (" . $id . ") !";

        } else if(isset($_SESSION['article-errors'])){
            $error = $_SESSION['article-errors'];
            unset($_SESSION['article-errors']);

            return "Error in the last operation: (" . $error . ") !";
        }
    }

    function successfulDeletion(){
        if(isset($_SESSION['deleted-article'])){
            $articleId = $_SESSION['deleted-article'];
            unset($_SESSION['deleted-article']);
            return "Successfully deleted article, ID: (" . $articleId . ") !";
        }
    }

    function successfulEdit(){
        if(isset($_SESSION['edited-article'])){
            $articleId = $_SESSION['edited-article'];
            unset($_SESSION['edited-article']);
            return "Successfully edited article, ID: (" . $articleId . ") !";
        }
    }

    function successfulAdd(){
        if(isset($_SESSION['added-article'])){
            $articleId = $_SESSION['added-article'];
            unset($_SESSION['added-article']);
            return "Successfully added a new article article, ID: (" . $articleId . ") !";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/templates/styles/admin-articles.style.css">
    <title>Document</title>
</head>
<body>
    <?php echo error_emitter(); ?>
    <?php echo successfulDeletion(); ?>
    <?php echo successfulEdit(); ?>
    <?php echo successfulAdd(); ?>
    <h1>Welcome to skyla ( admin articles section )!</h1>
    <h4>The simplest cms you've ever seen..</h4>
    <div class="row">
        <h2>Articles list</h2>
        <a href="/admin/articles/add">+ Add a new article</a>
    </div>
    <?php if($data): ?>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Publication date</th>
                <th>Options</th></tr>
        </thead>
        <tbody>
            <?php foreach ($data as $article): ?>
            <tr class="article">
                <td><?= $article->id ?></td>
                <td><?= $article->title ?></td>
                <td><?=  $article->publicationDate ?></td>
                <td id="options">
                    <form method="GET">
                        <input type="hidden" name="id" value="<?= $article->id; ?>" />
                        <input type="hidden" name="title" value="<?= $article->title; ?>" />
                        <input type="submit" name="op" value="delete" />
                    </form>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $article->id; ?>" />
                        <input type="hidden" name="title" value="<?= $article->title; ?>" />
                        <input type="hidden" name="description" value="<?= $article->description; ?>" />
                        <input type="hidden" name="content" value="<?= $article->content; ?>" />
                        <input type="submit" name="op" value="edit" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <h2 style="text-align: center;">No data available.</h2>
    <?php endif; ?>
</body>
</html>