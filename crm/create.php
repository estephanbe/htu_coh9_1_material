<?php include './header.php' ?>
<form class="w-50" method="POST" action="./store.php">
    <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname" name="firstname" required>
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lastname" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <div class="mb-3">
        <label for="sales" class="form-label">Sales Quantity</label>
        <input type="number" class="form-control" id="sales" name="sales">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include './footer.php' ?>