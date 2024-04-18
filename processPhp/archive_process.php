<?php 

require_once("../connection.php");

// ARCHIVE MAIN PRODUCT


if(isset($_POST['action']) && $_POST['action'] == "archivemainProduct"){
    $productId = $_POST['id'];
    $archive = "Yes";

    $sqlu = "UPDATE products SET archive='$archive' WHERE product_Id='$productId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}


// ARCHIVE CATEGORY
if(isset($_POST['action']) && $_POST['action'] == "archiveCategory"){
    $categoryId = $_POST['id'];
    $archive = "Yes";

    $sqlu = "UPDATE category_table SET archive='$archive' WHERE category_Id='$categoryId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}


if(isset($_POST['action']) && $_POST['action'] == "archiveProduct"){
    $productId = $_POST['id'];
    $archive = "Yes";

    $sqlu = "UPDATE category_product_table SET archive='$archive' WHERE category_product_Id='$productId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}


if(isset($_POST['action']) && $_POST['action'] == "archiveProductType"){
    $productTypeId = $_POST['id'];
    $archive = "Yes";

    $sqlu = "UPDATE category_product_item_table SET archive='$archive' WHERE category_product_item_Id='$productTypeId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}

if(isset($_POST['action']) && $_POST['action'] == "archiveType"){
    $typeId = $_POST['id'];
    $archive = "Yes";

    $sqlu = "UPDATE category_product_item_type_table SET archive='$archive' WHERE category_product_item_type_Id='$typeId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}


// RESTORE ARCHIVE

if(isset($_POST['action']) && $_POST['action'] == "restoreCategory"){

    $categoryId = $_POST['id'];
    $archive = "No";

    $sqlu = "UPDATE category_table SET archive='$archive' WHERE category_Id='$categoryId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}

if(isset($_POST['action']) && $_POST['action'] == "restoreProduct"){

    $productId = $_POST['id'];
    $archive = "No";

    $sqlu = "UPDATE products SET archive='$archive' WHERE product_Id='$productId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}

if(isset($_POST['action']) && $_POST['action'] == "restoreAccount"){

    $officialsId = $_POST['id'];
    $archive = "Active";

    $sqlu = "UPDATE officials SET status='$archive' WHERE officials_Id='$officialsId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}

if(isset($_POST['action']) && $_POST['action'] == "restoreSupplier"){

    $supplierId = $_POST['id'];
    $archive = "Active";

    $sqlu = "UPDATE supplier SET status='$archive' WHERE supplier_Id='$supplierId'";
    $resultu = $conn->query($sqlu);

    if($resultu){
        echo "successArchive";
    }

    else{
        echo "errorArchive";
    }

    
}

?>