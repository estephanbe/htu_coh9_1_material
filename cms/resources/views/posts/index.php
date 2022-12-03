<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Agency</title>
</head>

<body>

    <h1 class="d-flex justify-content-around">Posts List</h1>

    <?php foreach ($posts as $post) : ?>
        <div>
            <h2><?= $post->title ?></h2>
            <p><?= $post->content ?></p>
        </div>
    <?php endforeach; ?>

</body>

</html>