<?php include './header.php';

if (empty($_GET['id']))
    die('You are accessing directly');

$customer = get_customer($_GET['id']);


?>
<form class="w-50" method="POST" action="./update.php">
    <input type="hidden" name="id" value="<?= $customer['id'] ?>">
    <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname" name="firstname" required value="<?= $customer['firstname'] ?>">
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lastname" required value="<?= $customer['lastname'] ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $customer['email'] ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer['phone'] ?>">
    </div>
    <div class="mb-3">
        <label for="sales" class="form-label">Sales Quantity</label>
        <input type="number" class="form-control" id="sales" name="sales" value="<?= $customer['sales'] ?>">
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
</form>
<?php include './footer.php' ?>