<?php include './header.php';
$cv_id = !empty($_GET['id']) ? $_GET['id'] : null;
$cvs = json_decode(file_get_contents('./cvs.json'));
$cv = array_filter($cvs, function ($item) use ($cv_id) {
    return $item->id == $cv_id;
});
$cv = $cv[array_key_first($cv)];

$html = <<<EOD
<div>
    <strong>%s</strong>
    <span>%s</span>
</div>
EOD;

$institutes = '';

foreach ($cv->institute as $i_key => $institute_name) {
    $institutes .= sprintf($html, $institute_name, $cv->gdate[$i_key]);
}

$w_expreince = '';

foreach ($cv->company as $c_key => $company_name) {
    $w_expreince .= sprintf($html, $company_name, $cv->sdate[$c_key]);
}

foreach ($cv as $key => $value) {
    switch ($key):
        case 'fname':
            // echo sprintf($html, "First Name: ", $value);
            printf($html, "First Name: ", $value);
            break;
        case 'lname':
            printf($html, "Last Name: ", $value);
            break;
        case 'dob':
            printf($html, "Date of Birth: ", $value);
            break;
        case 'phone':
            printf($html, "Phone: ", $value);
            break;
        case 'email':
            printf($html, "Email: ", $value);
            break;
        case 'address':
            printf($html, "Address: ", $value);
            break;
        case 'objective':
            printf($html, "Objective: ", $value);
            break;
        case 'institute':
            echo "Education: $institutes";
            break;
        case 'company':
            echo "Working Experience: $w_expreince";
            break;
    endswitch;
} ?>


<img width="300" height="300" src="./cv_photos/<?= $cv->photo ?>">

<?php include './footer.php'; ?>