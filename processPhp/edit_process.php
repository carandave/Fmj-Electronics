<?php 

require_once("../connection.php");

    if(isset($_POST['action']) && $_POST['action'] == "editProduct"){
        $edit_product_Id = $_POST['edit_product_Id'];
        // $edit_item_code = $_POST['edit_item_code'];
        // $edit_category_Id = $_POST['edit_category_Id'];
        // $edit_category_product_Id = $_POST['edit_category_product_Id'];
        // $edit_product_type_Id = $_POST['edit_product_type_Id'];
        // $edit_type_Id = $_POST['edit_type_Id'];
        $stocks = $_POST['stocks'];
        $prize = $_POST['prize'];
        
        $sqlu = "UPDATE products SET stocks='$stocks', prize='$prize' WHERE product_Id='$edit_product_Id'";
        $result = $conn->query($sqlu);

        if($result){
            echo "editedSuccess";
        }

        else{
            echo "error";
        }
    }



    // EDIT CATEGORY 

    if(isset($_POST['action']) && $_POST['action'] == "editCategory"){
        $edit_categoryId = $_POST['edit_categoryId'];
        $edit_categoryName = $_POST['edit_categoryName'];
        
        $sqlu = "UPDATE category_table SET category_Name='$edit_categoryName' WHERE category_Id='$edit_categoryId'";
        $result = $conn->query($sqlu);

        if($result){
            echo "editedSuccess";
        }

        else{
            echo "error";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "editCategoryProduct"){
        $edit_categoryId = $_POST['edit_categoryId'];
        $edit_category_productId = $_POST['edit_category_productId'];
        $edit_categoryName = $_POST['edit_categoryName'];
        
        $sqlu = "UPDATE category_product_table SET category_Id='$edit_categoryId', product_Name='$edit_categoryName' WHERE category_product_Id='$edit_category_productId'";
        $result = $conn->query($sqlu);

        if($result){
            echo "editedSuccess";
        }

        else{
            echo "error";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "editCategoryProductItem"){
        $edit_categoryId = $_POST['edit_categoryId'];
        $edit_category_productId = $_POST['edit_category_productId'];
        $edit_category_product_itemId = $_POST['edit_category_product_itemId'];
        $edit_ItemName = $_POST['edit_ItemName'];
        
        $sqlu = "UPDATE category_product_item_table SET category_Id='$edit_categoryId', category_product_Id='$edit_category_productId', product_item_name='$edit_ItemName' WHERE category_product_item_Id='$edit_category_product_itemId'";
        $result = $conn->query($sqlu);

        if($result){
            echo "editedSuccess";
        }

        else{
            echo "error";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "editCategoryProductItemType"){
        $edit_categoryId = $_POST['edit_categoryId'];
        $edit_category_productId = $_POST['edit_category_productId'];
        $edit_category_product_itemId = $_POST['edit_category_product_itemId'];
        $edit_category_product_itemTypeId = $_POST['edit_category_product_itemTypeId'];
        $edit_ItemTypeName = $_POST['edit_ItemTypeName'];
        
        $sqlu = "UPDATE category_product_item_type_table SET category_Id='$edit_categoryId', category_product_Id='$edit_category_productId', category_product_item_Id='$edit_category_product_itemId', product_item_type_name='$edit_ItemTypeName' WHERE category_product_item_type_Id='$edit_category_product_itemTypeId'";
        $result = $conn->query($sqlu);

        if($result){
            echo "editedSuccess";
        }

        else{
            echo "error";
        }
    }

    // Edit Accounts

    if(isset($_POST['action']) && $_POST['action'] == "editAccount"){
        $edit_officials_Id = $_POST['edit_officials_Id'];
        $edit_first_name = $_POST['edit_first_name'];
        $edit_last_name = $_POST['edit_last_name'];
        $edit_email_address = $_POST['edit_email_address'];
        $edit_userType = $_POST['edit_userType'];
        
        $sqlu = "UPDATE officials SET first_name='$edit_first_name', last_name='$edit_last_name', email_address='$edit_email_address', user_type='$edit_userType' WHERE officials_Id='$edit_officials_Id'";
        $result = $conn->query($sqlu);

        if($result){
            echo "editedSuccess";
        }

        else{
            echo "error";
        }
    }

?>