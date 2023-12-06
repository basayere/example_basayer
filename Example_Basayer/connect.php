<?php

$id_card = $_POST['id_card'];
$pass = $_POST['pass'];

// database connection
$conn = mysqli_connect('127.0.0.1:3310', 'root', '', 'example_basayer');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO example_basayer (id_card, pass) VALUES (?, ?)");

    // Check if prepare() was successful
    if ($stmt === false) {
        die('Prepare Failed: ' . $conn->error);
    }

    $stmt->bind_param("ss", $id_card, $pass);

    // Check if bind_param() was successful
    if ($stmt === false) {
        die('Bind Param Failed: ' . $stmt->error);
    }

    $stmt->execute();

    // Check if execute() was successful
    if ($stmt === false) {
        die('Execute Failed: ' . $stmt->error);
    }

    echo "register ok...";
    $stmt->close();
    $conn->close();
}

?>