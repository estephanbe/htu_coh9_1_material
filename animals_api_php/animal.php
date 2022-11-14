<?php include "./header.php";

if (!empty($_GET)) :
?>

    <div id="animal-template" class="row my-5 py-5">
        <div class="col">
            <img src="<?= $_GET['image_link'] ?>" class="img-fluid" alt="<?= $_GET['name'] ?>">
        </div>
        <div class="col">
            <div class="d-flex flex-row-reverse">
                <a href="./add_to_fav.php?id=<?= $_GET['id'] ?>" class="btn btn-danger">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> id </td>
                        <td><?= $_GET['id'] ?> </td>
                    </tr>
                    <tr>
                        <td> name </td>
                        <td><?= $_GET['name'] ?> </td>
                    </tr>
                    <tr>
                        <td> latin_name </td>
                        <td><?= $_GET['latin_name'] ?> </td>
                    </tr>
                    <tr>
                        <td> animal_type </td>
                        <td><?= $_GET['animal_type'] ?> </td>
                    </tr>
                    <tr>
                        <td> active_time </td>
                        <td><?= $_GET['active_time'] ?> </td>
                    </tr>
                    <tr>
                        <td> length_min </td>
                        <td><?= $_GET['length_min'] ?> </td>
                    </tr>
                    <tr>
                        <td> length_max </td>
                        <td><?= $_GET['length_max'] ?> </td>
                    </tr>
                    <tr>
                        <td> weight_min </td>
                        <td><?= $_GET['weight_min'] ?> </td>
                    </tr>
                    <tr>
                        <td> weight_max </td>
                        <td><?= $_GET['weight_max'] ?> </td>
                    </tr>
                    <tr>
                        <td> lifespan </td>
                        <td><?= $_GET['lifespan'] ?> </td>
                    </tr>
                    <tr>
                        <td> habitat </td>
                        <td><?= $_GET['habitat'] ?> </td>
                    </tr>
                    <tr>
                        <td> diet </td>
                        <td><?= $_GET['diet'] ?> </td>
                    </tr>
                    <tr>
                        <td> geo_range </td>
                        <td><?= $_GET['geo_range'] ?> </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

<?php
endif;
include "./footer.php" ?>