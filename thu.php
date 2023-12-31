<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

try {
    
    require_once __DIR__ . '/db_config.php';

    // Connecting to the database using PDO
    $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);

    // get all products from products table
    $query = "SELECT * FROM nhacungcap";
    $stmt = $pdo->query($query);

    // check for empty result
    if ($stmt->rowCount() > 0) {
        // products node
        $response["nhacungcap"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // temp user array
            $product = array();
            
            $product["MaNcc"] = $row["MaNcc"];
            $product["TenNcc"] = $row["TenNcc"];
            $product["Diachi"] = $row["Diachi"];
            $product["Sdt"] = $row["Sdt"];
            
            // push single product into final response array
            array_push($response["nhacungcap"], $product);
        }
        // success
        $response["success"] = 1;

    } else {
        // no products found
        $response["success"] = 0;
        $response["message"] = "No products found";
    }
} catch (PDOException $e) {
    // error connecting to database
    $response["success"] = 0;
    $response["message"] = "Database Error: " . $e->getMessage();
}

// echoing JSON response
echo json_encode($response);

?>
