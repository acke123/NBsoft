<?php
require '../connection/TableConnectionData.php';

class TableData extends Database
{
    public function taskB($id)
    {
        $db = $this->getConnection();
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT user.firstname, user.lastname, orders.id, orders.value FROM user,orders WHERE orders.userId = $id AND user.id = $id";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }

    public function taskC()
    {
        $db = $this->getConnection();
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT userId FROM orders GROUP BY userId HAVING COUNT(id) >1;";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }

    public function taskE(){
        $db = $this->getConnection();
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT orderId FROM orderitem GROUP BY orderId HAVING COUNT(id) >1;";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }

    public function getUser($id)
    {
        $db = $this->getConnection();
        $intId = (int)$id;
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT firstname, lastname FROM user WHERE id = $intId";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }

    public function getOrderInfo($id)
    {
        $db = $this->getConnection();
        $intId = (int)$id;
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT userId FROM orders WHERE id = $intId";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }
}

$id = 1;

$obj = new tableData();

$taskB = $obj->taskB($id);
print_r($taskB);
echo '<br>';

$taskC = $obj->taskC();
$customerInfo = [];
foreach ($taskC as $data) {
    foreach ($data as $info) {
        $customerInfo[] = $obj->getUser($info);
    }
}
print_r($customerInfo);
echo '<br>';

$taskE = $obj->taskE();

$orderItemInfo = [];
foreach ($taskE as $data) {
    foreach ($data as $info) {
        $orderItemInfo[] = $obj->getOrderInfo($info);
    }
}
$customerOrderInfo = [];
foreach ($taskC as $data) {
    foreach ($data as $info) {
        $customerOrderInfo[] = $obj->getUser($info);
    }
}

print_r($customerOrderInfo);
echo '<br>';

echo 'test';
