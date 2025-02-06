<?php
require "include/conn.php";

$criteria = $_POST['criteria'];
$weight = $_POST['weight'];
$attribute = $_POST['attribute'];

$sql = "INSERT INTO saw_criterias (criteria, weight, attribute) VALUES ('$criteria', '$weight', '$attribute')";

if ($db->query($sql) === true) {
    header("Location: bobot.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
?>
