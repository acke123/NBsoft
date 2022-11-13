<?php
require_once 'Database.php';

class TableConnectionData extends Database
{
    public function getDataFromTable()
    {
        $db = $this->getConnection();
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT* FROM formdata";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }

    public function setData($firstname, $lastname, $gender, $year, $address, $city, $textarea, $languages)
    {
        if ($gender == 'male') {
            $gender = 0;
        } else {
            $gender = 1;
        }
        $sql = "INSERT INTO formdata (first_name, last_name, gender, year, address, city, about_you) 
VALUES ('$firstname', '$lastname', '$gender', '$year', '$address', '$city', '$textarea')";
        $conn = $this->getConnection();
        mysqli_query($conn, $sql);

        $tableData = $this->getDataFromTable();
        $userId = end($tableData)[0];
        foreach ($languages as $language) {
            $sql = "INSERT INTO user_skills (skill_name, user_id) VALUES ('$language', '$userId')";
            $conn = $this->getConnection();
            mysqli_query($conn, $sql);
        }
    }
}
