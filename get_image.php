<?php
include 'connect.php'; // Include your database connection file

$ref_prod = isset($_GET['ref_prod']) ? $_GET['ref_prod'] : '';

if ($ref_prod) {
    $sql = "SELECT image FROM produit WHERE ref_prod = :ref_prod";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ref_prod', $ref_prod);
    $stmt->execute();
    $stmt->bindColumn('image', $image, PDO::PARAM_LOB);
    $stmt->fetch(PDO::FETCH_BOUND);

    // Set appropriate headers for image display
    header("Content-Type: image/jpeg");
    echo $image;
} else {
    echo 'Invalid or missing ref_prod parameter.';
}
?>
