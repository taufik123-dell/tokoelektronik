<?php
include 'db.php';

$action = $_GET['action'];

if ($action == 'create') {

    $electronic_id = $_POST['id'];

    if ($electronic_id > 0) {
        $sql = "INSERT INTO favorites (electronic_id) VALUES ('$electronic_id')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Recipe added to favorites"]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "fail", "message" => "Invalid recipe ID"]);
    }
}

if ($action == 'read') {
    $sql = "SELECT electronics.*, categories.category_name FROM electronics LEFT JOIN categories ON electronics.category_id = categories.id JOIN favorites ON electronics.id = favorites.electronic_id";
    $result = $conn->query($sql);
    $favorites = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $favorites[] = $row;
        }
        echo json_encode($favorites);
    } else {
        echo json_encode([]);
    }
}


if ($action == 'delete') {
    $electronic_id = $_POST['id'];

    if ($electronic_id > 0) {
        $sql = "DELETE FROM favorites WHERE electronic_id = '$electronic_id'";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Recipe removed from favorites"]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "fail", "message" => "Invalid recipe ID"]);
    }
}

$conn->close();
?>
