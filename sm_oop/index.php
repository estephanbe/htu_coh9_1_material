<?php
require './student.php';

// DB Management Tool
// Students Management Tool

$student = new Student();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-light px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Students Management System</a>
            </div>
        </nav>
    </header>

    <div class="container my-5 py-5">

        <div class="row">
            <div class="col-6">
                <form class="w-75" action="./add_student.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">DOB</label>
                        <input type="text" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-check">
                        <p class="m-0">Gender:</p>
                        <div>
                            <label for="radio-male">Male</label>
                            <input class="form-check-input" type="radio" id="radio-male" value="male" name="gender">
                        </div>
                        <div>
                            <label for="radio-female">Female</label>
                            <input class="form-check-input" type="radio" id="radio-female" value="female" name="gender">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($student->get_students() as $student_row) : ?>
                            <tr>
                                <td><?= $student_row->id ?></td>
                                <td><?= $student_row->full_name ?></td>
                                <td><?= $student_row->dob ?></td>
                                <td><?= $student_row->phone ?></td>
                                <td><?= $student_row->email ?></td>
                                <td><?= $student_row->gender ?></td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>