<?php
include 'database.php';
$mysqli = getDatabaseConnection();

if(isset($_GET['q'])) {
    $query = $_GET['q'];

    $results = [];
    $stmt = $mysqli->prepare("SELECT productTitle, images, brand FROM Products WHERE productTitle LIKE ? LIMIT 5");
    $likeQuery = "%" . $query . "%";
    $stmt->bind_param('s', $likeQuery);
    $stmt->execute();
    $stmt->bind_result($productTitle, $images, $brand);

    while($stmt->fetch()) {
        $imageArray = explode(',', $images);
        $results[] = ['productTitle' => $productTitle, 'image' => $imageArray[0], 'brand' => $brand];
    }

    $stmt->close();
    header('Content-Type: application/json');
    echo json_encode($results);
}
?>
