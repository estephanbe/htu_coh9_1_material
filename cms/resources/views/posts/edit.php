<h1>Edit Post</h1>

<form action="/posts/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->post->id ?>">
    <div class="mb-3">
        <label for="post-title" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="post-title" name="title" value="<?= $data->post->title ?>">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Your post content.." id="post-content" style="height: 100px" name="content"><?= $data->post->content ?></textarea>
        <label for="post-content">Post Content</label>
    </div>
    <div class="my-3">
        <label for="post-tags">Tags</label>
        <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
            <?php foreach ($data->post->tags as $tag) : ?>
                <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>