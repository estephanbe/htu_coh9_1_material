<div class="my-5">
    <!-- for public -->
    <h1 class="text-center mb-5">
        <?= $data->post->title ?>
    </h1>

    <?php if (!empty($data->post->author)) : ?>
        <p class="mb-3">
            Author: <?= $data->post->author ?>
        </p>
    <?php endif; ?>

    <p class="mb-3">
        Created: <?= $data->post->created_at ?>
    </p>

    <p class="mb-3">
        Tags: <?php
                foreach ($data->post->tags as $tag) {
                    echo "#$tag ";
                }
                ?>
    </p>

    <p>
        <?= $data->post->content ?>
    </p>
</div>