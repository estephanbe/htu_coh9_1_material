<div class="mt-5 d-flex flex-row-reverse gap-3">
    <a href="/posts/edit?id=<?= $data->post->id ?>" class="btn btn-warning">Edit</a>
    <a href="/posts/delete?id=<?= $data->post->id ?>" class="btn btn-danger">Delete</a>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->post->title ?>
    </h1>

    <p>
        <?= $data->post->content ?>
    </p>
</div>