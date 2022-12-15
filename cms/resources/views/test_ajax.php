<h1>Hi from AJAX Revision</h1>

<div>
    <button id="get-posts">Get Posts</button>
    <button id="create-post">Create Post</button>
</div>

<div>
    <form id="posts_form">
        <input id="form-user-id" type="hidden" name="user_id" value="1">
        <input id="form-title" type="text" name="title">
        <textarea id="form-content" name="content" cols="30" rows="10"></textarea>
    </form>
</div>

<div id="posts-container">

</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    $('#get-posts').click(function() {
        $.ajax({
            type: "get",
            url: "http://coh91-cms.local/api/posts",
            success: function(response) {
                response.body.forEach(element => {
                    $('#posts-container').append(`
                    <div>
                        <h2>${element.title}</h2>
                        <p>${element.content}</p>
                    </div>
                    `);
                });
            }
        });
    });

    $('#create-post').click(function(e) {
        e.preventDefault();
        let data = {
            user_id: $('#form-user-id').val(),
            title: $('#form-title').val(),
            content: $('#form-content').val(),
        };

        $.ajax({
            type: "post",
            url: "http://coh91-cms.local/api/posts/create",
            data: JSON.stringify(data),
            success: function(response) {
                alert('done')
            },
            error: function(e) {
                alert('not done');
            }
        });
    });
</script>