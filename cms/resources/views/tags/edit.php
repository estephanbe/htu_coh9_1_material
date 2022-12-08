<h1>Edit Post</h1>

<form action="/tags/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->tag->id ?>">
    <div class="mb-3">
        <label for="tag-name" class="form-label">Tag Name</label>
        <input type="text" class="form-control" id="tag-name" name="name" value="<?= $data->tag->name ?>">
    </div>
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>