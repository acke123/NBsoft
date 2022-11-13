<?php
require '../connection/TableConnectionData.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$year = $_POST['year'];
$address = $_POST['address'];
$city = $_POST['city'];
$textarea = $_POST['textarea'];
if (isset($_POST['languages'])) {
    $languages = $_POST['languages'];
} else {
    $languages = null;
}
$intYear = (int)$year;
$data = [
    'firstname' => $firstname,
    'lastname' => $lastname,
    'gender' => $gender,
    'year' => $year,
    'address' => $address,
    'city' => $city,
    'textarea' => $textarea,
    'languages' => $languages
];

$firstnameJson = json_encode($data);

echo $firstnameJson;

$displayName = new TableConnectionData();
$displayName->setData($firstname, $lastname, $gender, $intYear, $address, $city, $textarea, $languages);


