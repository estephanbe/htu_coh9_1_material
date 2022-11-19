<?php
include './header.php';





?>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Check Customer</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach (get_customers() as $customer) : ?>
            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['firstname'] ?></td>
                <td><?= $customer['lastname'] ?></td>
                <td>
                    <a href="./customer.php?id=<?= $customer['id'] ?>" class="btn btn-success">
                        Check Customer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>


<?php include './footer.php' ?>