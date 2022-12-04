<h1 class="text-center">Welome to Our News Agency</h1>


<div class="row my-5">

    <?php foreach ($data->posts as $post) : ?>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <?= $post->title ?>
                    </h5>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="./front/post?id=<?= $post->id ?>" class="btn btn-primary">Check News</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>