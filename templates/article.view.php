<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/styles/article.style.css">
    <title>Document</title>
</head>
<body>
    <?php if($data): ?>
        <div class="article-container">
            <?php foreach ($data as $article): ?>
            <!-- // TODO: replacec viewArticle with category system! -->
            <div class="article">
                <h1><?= $article->title ?></h1>
                <?php if(isset($article->publicationDate)) :?>
                    <p><i>Published at: </i> <?= $article->publicationDate ?></p>
                <?php endif; ?>
                <?php if(isset($article->description)) :?>
                    <p><i>Description:</i> <?=  $article->description ?></p>
                <?php endif; ?>
                <?php if(isset($article->content)) :?>
                    <div class="content-container">
                    <p><?=  $article->content ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
                </div>
        <?php else: ?>
        <h2 style="text-align: center;">Sorry, looks like this article has been removed!</h2>
    <?php endif; ?>
</body>
</html>