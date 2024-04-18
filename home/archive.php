<?php 

    require_once("../connection.php");

    session_start();

    if(!isset($_SESSION['officials_Id'])){
        header('Location: ../index.php');
    }

    if($_SESSION['user_type']=="Cashier" || $_SESSION['user_type']=="Staff") {
        header('Location: dashboard.php');
    }

    $user_type = $_SESSION['user_type'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMJ ELECTRONICS</title>

    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Links Start-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Links End-->

    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

</head>




<body>
        <?php require_once("../templates/topNav.php")?>

        <div class="main-container">

            <div class="left-container">
                <?php require_once("../templates/leftNav.php")?>
            </div>

            <div class="right-container">
                <div class="row m-0 p-0">
                    <div class="col-md-12">
                        <div class="main-title">
                            <i class="fa-solid fa-layer-group"></i><span>ARCHIVES</span>
                        </div>

                        <a href="settings.php" class="btn btn-dark text-light mt-3" >
                        Back
                        </a>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 p-3" id="cold" style="border-radius: 5px; border-top: 10px solid #606FF2; border-left: 10px solid #606FF2; border-right: 10px solid #606FF2;">
                                        <div class="nav flex-column nav-pills"  id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link nav-link-archive active text-center font-weight-bold"  id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">CATEGORIES</a>
                                            <a class="nav-link nav-link-archive text-center mt-2 font-weight-bold" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">PRODUCTS</a>
                                            <a class="nav-link nav-link-archive text-center mt-2 font-weight-bold" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ACCOUNTS</a>
                                            <a class="nav-link nav-link-archive text-center mt-2 font-weight-bold" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">SUPPLIERS</a>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <div class="table-container">
                                                    <table class="table table-hover table-border table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="d-none">CATEGORY ID</th>
                                                                <th scope="col" class="text-center">CATEGORY NAME</th>
                                                                <th scope="col" class="text-center">ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $sql = "SELECT * FROM category_table WHERE archive='Yes' ORDER BY category_Id DESC";
                                                                $result = $conn->query($sql);
                                                            ?>
                                                            <?php if($result->num_rows > 0){?>
                                                                <?php while($row = $result->fetch_assoc()){?>
                                                                    <tr>
                                                                        <td class="d-none"><?php echo $row['category_Id'];?></td>
                                                                        <td><?php echo $row['category_Name'];?></td>
                                                                        <td class="d-flex justify-content-around align-items-center">
                                                                            <button type="button" class="btn btn-danger btn-sm" data-id="<?php echo $row['category_Id'];?>" onclick="confirmDelete(this);">
                                                                                UNARCHIVE
                                                                            </button>

                                                                            <div id="myModal" class="modal fade" >
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">

                                                                                        <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px; width: 100%; flex-direction: column;  ">
                                                                                            <p class="h5">Are you sure you want to Restore Category?</p>
                                                                                            <form action="" id="form-archive-category">
                                                                                                <input type="text" name="id" class="d-none">
                                                                                            </form>

                                                                                            <div class="d-flex justify-content-center align-items-center mt-3 px-5" style="flow-direction: column; width: 100%;" >
                                                                                                <button type="button" style="width: 49%;" class="btn btn-default mr-1" data-dismiss="modal">Close</button>
                                                                                                <button type="submit" style="width: 49%;" form="form-delete-user" class="btn btn-danger ml-1" id="archive_btn" data-dismiss="modal">Update</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                <?php 
                                                                } ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <div class="table-container">
                                                    <table class="table table-hover table-border table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-center d-none" style="font-size: 20px; font-weight: 700">PRODUCT ID</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">ITEM CODE</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">BARCODE</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">CATEGORY</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">PRODUCT</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">PRODUCT TYPES</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">TYPES</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">STOCKS</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">PRIZE</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tableBody">
                                                            <?php 

                                                            $sql = "SELECT p.product_Id, p.item_code, p.barcode, p.category_Id, p.category_product_Id, p.product_type_Id, p.type_Id, p.stocks, p.prize, p.archive, c.category_Id, c.category_Name, cp.category_product_Id, cp.product_Name, cpi.category_product_item_Id, cpi.product_item_name, cpit.category_product_item_type_Id, cpit.product_item_type_name FROM products p INNER JOIN category_table c ON p.category_Id = c.category_Id INNER JOIN category_product_table cp ON p.category_product_Id = cp.category_product_Id INNER JOIN category_product_item_table cpi ON p.product_type_Id = cpi.category_product_item_Id INNER JOIN category_product_item_type_table cpit ON p.type_Id = cpit.category_product_item_type_Id WHERE p.archive='Yes'";
                                                            $result = $conn->query($sql);
                                                            
                                                            ?>

                                                            <?php if($result->num_rows > 0){?>
                                                                <?php while($row = $result->fetch_assoc()){?>
                                                            <tr>
                                                                <td class="td-product text-center d-none" style="font-size: 18px; font-weight: 700"><?php echo $row['product_Id'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['item_code'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['barcode'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['category_Name'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['product_Name'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['product_item_name'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['product_item_type_name'];?>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['stocks'];?></td>
                                                                <td class="td-product text-center" style="font-size: 18px; font-weight: 700"><?php echo $row['prize'];?></td>
                                                                <td class="d-flex justify-content-around align-items-center">
                                                                    <!-- <button type="button" class="btn btn-danger btn-sm ml-2" data-id="<?php echo $row['product_Id'];?>" onclick="confirmDeleteProduct(this);">
                                                                        ARCHIVE
                                                                    </button>

                                                                    <div id="myModal" class="modal fade" >
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">

                                                                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px; width: 100%; flex-direction: column;  ">
                                                                                    <p class="h5">Are you sure you want to Restore Product?</p>
                                                                                    <form action="" id="form-archive-product">
                                                                                        <input type="text" name="id" class="d-none">
                                                                                    </form>

                                                                                    <div class="d-flex justify-content-center align-items-center mt-3 px-5" style="flow-direction: column; width: 100%;" >
                                                                                        <button type="button" style="width: 49%;" class="btn btn-default mr-1" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" style="width: 49%;" form="form-delete-user" class="btn btn-danger ml-1" id="archive_product_btn" data-dismiss="modal">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <button type="button" class="btn btn-danger btn-sm" data-id="<?php echo $row['product_Id'];?>" onclick="confirmDeleteProduct(this);">
                                                                        UNARCHIVE
                                                                    </button>

                                                                    <div id="myModalProduct" class="modal fade" >
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">

                                                                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px; width: 100%; flex-direction: column;  ">
                                                                                    <p class="h5">Are you sure you want to Restore Products?</p>
                                                                                    <form action="" id="form-archive-product">
                                                                                        <input type="text" name="id" class="d-none">
                                                                                    </form>

                                                                                    <div class="d-flex justify-content-center align-items-center mt-3 px-5" style="flow-direction: column; width: 100%;" >
                                                                                        <button type="button" style="width: 49%;" class="btn btn-default mr-1" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" style="width: 49%;" form="form-delete-user" class="btn btn-danger ml-1" id="archive_product_btn" data-dismiss="modal">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <div class="table-container mt-3">
                                                    <table class="table table-hover table-border table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-center d-none" style="font-size: 20px; font-weight: 700">ID</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">FIRST NAME</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">LAST NAME</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">EMAIL</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">USER TYPE</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">STATUS</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">DATE CREATED</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody >

                                                            <?php 
                                                            
                                                            $sql = "SELECT * FROM officials WHERE status='Inactive' ORDER BY officials_Id DESC";
                                                            $result = $conn->query($sql);
                                                            
                                                            ?>
                                                            
                                                            <?php if($result->num_rows > 0){?>
                                                                <?php while($row = $result->fetch_assoc()){?>
                                                            <tr>
                                                                <td class="text-center d-none" style="font-size: 20px;" ><?php echo $row['officials_Id'];?></td>
                                                                <td class="text-center" style="font-size: 20px;" ><?php echo $row['first_name'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['last_name'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['email_address'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['user_type'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['status'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo date("F j Y", strtotime($row['date_created']));?></td>
                                                                <td class="d-flex justify-content-around align-items-center">
                                                                    <button type="button" class="btn btn-danger btn-sm ml-2" data-id="<?php echo $row['officials_Id'];?>" onclick="confirmDeleteAccount(this);">
                                                                        UNARCHIVE
                                                                    </button>

                                                                    <div id="myModalAccount" class="modal fade" >
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">

                                                                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px; width: 100%; flex-direction: column;  ">
                                                                                    <p class="h5">Are you sure you want to Restore this Account?</p>
                                                                                    <form action="" id="form-archive-account">
                                                                                        <input type="text" name="id" class="d-none">
                                                                                    </form>

                                                                                    <div class="d-flex justify-content-center align-items-center mt-3 px-5" style="flow-direction: column; width: 100%;" >
                                                                                        <button type="button" style="width: 49%;" class="btn btn-default mr-1" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" style="width: 49%;" form="form-delete-user" class="btn btn-danger ml-1" id="archive_account_btn" data-dismiss="modal">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                                <?php 
                                                                } ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <div class="table-container mt-3">
                                                    <table class="table table-hover table-border table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-center d-none" style="font-size: 20px; font-weight: 700">ID</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">DATE CREATED </th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">SUPPLIER </th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">CONTACT PERSON</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">STATUS</th>
                                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="">

                                                            <?php 
                                
                                                                $sql = "SELECT * FROM supplier WHERE status='Inactive' ORDER BY supplier_Id DESC";
                                                                $result = $conn->query($sql);
                                                            ?>
                                                            
                                                            <?php if($result->num_rows > 0){?>
                                                                <?php while($row = $result->fetch_assoc()){?>
                                                            <tr>
                                                                <td class="text-center d-none" style="font-size: 20px;" ><?php echo $row['supplier_Id'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo date("F j Y", strtotime($row['date_created']));?></td>
                                                                <td class="text-center" style="font-size: 20px;" ><?php echo $row['name'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['contact_person'];?></td>
                                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['status'];?></td>
                                                                
                                                                <td class="d-flex justify-content-center align-items-center">
                                                                    <button type="button" class="btn btn-danger btn-sm ml-2" data-id="<?php echo $row['supplier_Id'];?>" onclick="confirmDeleteSupplier(this);">
                                                                        UNARCHIVE
                                                                    </button>

                                                                    <div id="myModalSupplier" class="modal fade" >
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">

                                                                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px; width: 100%; flex-direction: column;  ">
                                                                                    <p class="h5">Are you sure you want to Restore this Supplier?</p>
                                                                                    <form action="" id="form-archive-supplier">
                                                                                        <input type="text" name="id" class="d-none">
                                                                                    </form>

                                                                                    <div class="d-flex justify-content-center align-items-center mt-3 px-5" style="flow-direction: column; width: 100%;" >
                                                                                        <button type="button" style="width: 49%;" class="btn btn-default mr-1" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" style="width: 49%;" form="form-delete-user" class="btn btn-danger ml-1" id="archive_supplier_btn" data-dismiss="modal">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                </td>

                                                                

                                                            </tr>
                                                                <?php 
                                                                } ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                
                            </div>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Sweetalert Cdn Start -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->

    <script>
        function confirmDelete(self){
            var id = self.getAttribute("data-id");

            document.getElementById("form-archive-category").id.value = id;
            $("#myModal").addClass("animate__fadeInDown");
            $("#myModal").modal("show");
            
        }

        function confirmDeleteProduct(self){
            var id = self.getAttribute("data-id");

            document.getElementById("form-archive-product").id.value = id;
            $("#myModalProduct").addClass("animate__fadeInDown");
            $("#myModalProduct").modal("show");
            
        }

        function confirmDeleteAccount(self){
            var id = self.getAttribute("data-id");

            document.getElementById("form-archive-account").id.value = id;
            $("#myModalAccount").addClass("animate__fadeInDown");
            $("#myModalAccount").modal("show");
            
        }

        function confirmDeleteSupplier(self){
            var id = self.getAttribute("data-id");

            document.getElementById("form-archive-supplier").id.value = id;
            $("#myModalSupplier").addClass("animate__fadeInDown");
            $("#myModalSupplier").modal("show");
            
        }


        // UNARCHIVE REQUEST AJAX

        $("#archive_btn").click(function(e){
                e.preventDefault();
                console.log("napindot si a");
                // e.preventDefault();

                $.ajax({
                    url: "../processPhp/archive_process.php",
                    method: "POST",
                    data: $("#form-archive-category").serialize() + "&action=restoreCategory",
                    success : function (response){

                        if(response == "successArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Restore!',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }

                        else if(response == "errorArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'There is an error, Please try again',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }
                        
                    }
                })
        })


        $("#archive_product_btn").click(function(e){
                e.preventDefault();
                console.log("napindot si a");
                // e.preventDefault();

                $.ajax({
                    url: "../processPhp/archive_process.php",
                    method: "POST",
                    data: $("#form-archive-product").serialize() + "&action=restoreProduct",
                    success : function (response){

                        if(response == "successArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Restore!',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }

                        else if(response == "errorArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'There is an error, Please try again',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }
                        
                    }
                })
        })

        $("#archive_account_btn").click(function(e){
                e.preventDefault();
                console.log("napindot si a");
                // e.preventDefault();

                $.ajax({
                    url: "../processPhp/archive_process.php",
                    method: "POST",
                    data: $("#form-archive-account").serialize() + "&action=restoreAccount",
                    success : function (response){

                        if(response == "successArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Restore!',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }

                        else if(response == "errorArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'There is an error, Please try again',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }
                        
                    }
                })
        })


        $("#archive_supplier_btn").click(function(e){
                e.preventDefault();
                console.log("napindot si a");
                // e.preventDefault();

                $.ajax({
                    url: "../processPhp/archive_process.php",
                    method: "POST",
                    data: $("#form-archive-supplier").serialize() + "&action=restoreSupplier",
                    success : function (response){

                        if(response == "successArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Restore!',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }

                        else if(response == "errorArchive"){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'There is an error, Please try again',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "archive.php";
                                })
                        }
                        
                    }
                })
        })

    </script>

</body>
</html>