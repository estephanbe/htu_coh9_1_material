<h1 class="d-flex justify-content-around mb-5">Users List (<?= $data->users_count ?>)</h1>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Display Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->users as $user) : ?>
                <tr>
                    <td><?= $user->display_name ?></td>
                    <td><a href="./user?id=<?= $user->id ?>" class="btn btn-primary">Check User</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>