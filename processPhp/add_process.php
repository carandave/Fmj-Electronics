<?php 

    require_once("../connection.php");

    // ADD PRODUCTS

    if(isset($_POST['action']) && $_POST['action'] == "addProducts"){
        $category_id = $_POST['category_id'];
        $product_id = $_POST['product_id'];
        $produt_type_id = $_POST['produt_type_id'];
        $type_id = $_POST['type_id'];
        $stocks = $_POST['stocks'];
        $prize = $_POST['prize'];
        $archive = "No";

        $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $itemcode = '';

        for($i = 0; $i < 7; $i++){
            $itemcode .= $char[rand(0, strlen($char) - 1)];
        }

        $sqli = "INSERT INTO products (item_code, category_Id, category_product_Id, product_type_Id, type_Id, stocks, prize, archive) VALUES ('$itemcode', '$category_id', '$product_id', '$produt_type_id', '$type_id', '$stocks', '$prize', '$archive')";
        $result = $conn->query($sqli);

        if($result){
            echo "addedSuccess";
        }

        else{
            echo "error";
        }
    }





    // ADD CATEGORY 

    if(isset($_POST['action']) && $_POST['action'] == "addCategory"){
        $categoryName = $_POST['categoryName'];
        $archive = "No";
        
        $sqli = "INSERT INTO category_table (category_Name, archive) VALUES ('$categoryName', '$archive')";
        $result = $conn->query($sqli);

        if($result){
            echo "addedSuccess";
        }

        else{
            echo "error";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "addCategoryProduct"){
        $categoryId = $_POST['categoryId'];
        $categoryProductName = $_POST['categoryProductName'];
        $archive = "No";


        $sqli = "INSERT INTO category_product_table (category_Id, product_Name, archive) VALUES ('$categoryId', '$categoryProductName', '$archive')";
        $result = $conn->query($sqli);

        if($result){
            echo "addedSuccess";
        }

        else{
            echo "error";
        }
    }
    
    if(isset($_POST['action']) && $_POST['action'] == "addProductItem"){
        $categoryId = $_POST['categoryId'];
        $categoryProductId = $_POST['categoryProductId'];
        $categoryProductItemName = $_POST['categoryProductItemName'];
        $archive = "No";

        $sqli = "INSERT INTO category_product_item_table (category_Id, category_product_Id, product_item_name, archive) VALUES ('$categoryId', '$categoryProductId', '$categoryProductItemName', '$archive')";
        $result = $conn->query($sqli);

        if($result){
            echo "addedSuccess";
        }

        else{
            echo "error";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "addProductItemType"){
        $categoryId = $_POST['categoryId'];
        $categoryProductId = $_POST['categoryProductId'];
        $categoryProductItemId = $_POST['categoryProductItemId'];
        $categoryProductItemTypeName = $_POST['categoryProductItemTypeName'];
        $archive = "No";

        $sqli = "INSERT INTO category_product_item_type_table (category_Id, category_product_Id, category_product_item_Id, product_item_type_name, archive) VALUES ('$categoryId', '$categoryProductId', '$categoryProductItemId', '$categoryProductItemTypeName', '$archive')";
        $result = $conn->query($sqli);

        if($result){
            echo "addedSuccess";
        }

        else{
            echo "error";
        }
    }

    if(isset($_POST['carts'])){
        
        $carts = $_POST['carts'];
        $totalAmount = $_POST['totals'];
        $payments = $_POST['payments'];
        $changes = $_POST['changes'];
        $transactioNumbers = $_POST['transactioNumbers'];


        // print_r($carts);

        foreach($carts as $item){

             $transactionNo =  $item["transactionNo"];
             $product_Id =  $item["product_Id"]; 
             $selectedOptionTextPicker =  $item["selectedOptionTextPicker"]; 
             $itemCode =  $item["itemCode"]; 
             $price =  $item["price"]; 
             $stocks =  $item["stocks"]; 
             $quantity =  $item["quantity"];
             $amount =  $item["amount"];
             $date_added = date("Y-m-d H:i:s");
            

            // $sqli = "INSERT INTO transactions_table (transaction_Number, product_Id, item_code, qty, price, total_amount, final_total_amount, payment, change, date_added) VALUES ('$transactionNo', '$product_Id', '$itemCode', '$quantity', '$price', '$amount', '$totalAmount', '$payments', '$changes', '$date_added')";
            $sqli = "INSERT INTO `transactions_table` (`transaction_Number`, `product_Id`, `item_code`, `qty`, `price`, `total_amount`, `final_total_amount`, `payment`, `change`, `date_added`) VALUES ('$transactioNumbers', '$product_Id', '$itemCode', '$quantity', '$price', '$amount', '$totalAmount', '$payments', '$changes', '$date_added')";
            $resulti = $conn->query($sqli);

            if($resulti){

                $newStocks = $stocks - $quantity;

                $sqlu = "UPDATE products SET stocks='$newStocks' WHERE product_Id='$product_Id'";
                $resultu = $conn->query($sqlu);

            }
    
            else{
                echo "error";
            }
        }

        if($resultu){

            session_start();

            $officials_Id = $_SESSION['officials_Id'];

            $action = "Added Transaction";

            $sqli = "INSERT INTO audit_trail_table (action, officials_Id) VALUES ('$action', '$officials_Id')";
            $result = $conn->query($sqli);

            echo "addedSuccess";

        }

        else{
            echo "error";
        }

         
    }

    // ADD ACOUNT


    if(isset($_POST['action']) && $_POST['action'] == "addAccount"){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email_address = $_POST['email_address'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $user_type = $_POST['userType'];
        $date_added = date("Y-m-d H:i:s");

        $sql = "SELECT email_address FROM officials WHERE email_address = '$email_address'";
        $results = $conn->query($sql);

        if($results->num_rows == 1){
            echo "sameemail";
        }

        else{

            if($password == $cpassword){
                $password = sha1($password);
    
                $sqli = "INSERT INTO officials (first_name, last_name, email_address, password, user_type, date_created) VALUES ('$first_name', '$last_name', '$email_address', '$password', '$user_type', '$date_added')";
                $result = $conn->query($sqli);
    
                if($result){
                    echo "addedSuccess";
                }
    
                else{
                    echo "error";
                }
            }
    
            else{
                echo "NotEqual";
            }

        }

        

        
    }

?>