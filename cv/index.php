<?php include './header.php'; ?>


<div class="d-flex flex-column justify-content-center align-items-center my-5">
    <form class="w-50" action="./process_cv_submission.php" method="POST">

        <div class="cv-info-1">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">DOB</label>
                <input type="text" class="form-control" id="dob" name="dob">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>

        <div class="cv-info-2">
            <div class="mb-3">
                <label for="objective" class="form-label">Objective</label>
                <textarea class="form-control" id="objective" name="objective" rows="15"></textarea>
            </div>
        </div>

        <div class="cv-info-3">
            <h3 class="form-label">Education</h3>
            <div class="mb-3">
                <label for="institute" class="form-label">Institute</label>
                <input type="text" class="form-control" id="institute" name="institute">
            </div>
            <div class="mb-3">
                <label for="gdate" class="form-label">Graduation Date</label>
                <input type="date" class="form-control" id="gdate" name="gdate">
            </div>
        </div>

        <div class="cv-info-4">
            <h3 class="form-label">Working Experience</h3>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="mb-3">
                <label for="sdate" class="form-label">Starting Date</label>
                <input type="date" class="form-control" id="sdate" name="sdate">
            </div>
        </div>

        <div class="cv-info-5">
            <h3 class="form-label">Photo</h3>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>
    </form>

    <div class="w-50 mt-4 px-3 d-flex justify-content-end align-items-center">
        <button id="back" class="btn btn-danger d-none">Back</button>
        <button id="next" class="btn btn-success">Next</button>
    </div>
</div>



<?php include './footer.php'; ?>