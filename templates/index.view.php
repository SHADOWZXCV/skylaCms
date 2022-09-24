<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/styles/index.style.css">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to skyla!</h1>
    <h4>The simplest cms you've ever seen..</h4>
    <h1>Articles</h1>
    <?php if($data): ?>
        <?php foreach ($data as $article): ?>
        <!-- // TODO: replacec viewArticle with category system! -->
        <div class="article" onclick="redirect_new_view('/viewArticle?id=<?= $article->id ?>');">
            <h2><?= $article->title ?></h2>
            <?php if(isset($article->publicationDate)) :?>
                <p><i>Published at: </i> <?= $article->publicationDate ?></p>
            <?php endif; ?>
            <?php if(isset($article->description)) :?>
                <p><i>Description:</i> <?=  $article->description ?></p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2 style="text-align: center;">No aricles are published yet!</h2>
    <?php endif; ?>
    <script src="/templates/js/url_utils.js"></script>
</body>
</html>