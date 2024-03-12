<?php 

    require_once("../connection.php");

    session_start();

    if(!isset($_SESSION['officials_Id'])){
        header('Location: ../index.php');
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

    <!-- Bootstrap Select Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>
<body>
        <?php require_once("../templates/topNav.php")?>

        <div class="main-container">

            <div class="left-container">
                <?php require_once("../templates/leftNav.php")?>
            </div>

            <!-- <i class="fa-solid fa-user"></i>
                            <i class="fa-solid fa-receipt"></i> -->

            <div class="right-container">
                <div class="row m-0 p-0">
                    <div class="col-md-12">
                        <div class="main-title">
                            <i class="fa-solid fa-layer-group"></i><span>ACCOUNTS</span>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <?php 
                                
                                    $sql = "SELECT * FROM officials ORDER BY officials_Id DESC";
                                    $result = $conn->query($sql);
                                ?>

                                <button type="button" class="btn btn-info addBtn" data-toggle="modal" data-target="#addModal">ADD ACCOUNT</button>

                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="add-form">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label for="" ><span class="text-danger">* </span>First Name</label>
                                                    <input type="text" value="" name="first_name" id="first_name" class="form-control" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""><span class="text-danger">* </span>Last Name</label>
                                                    <input type="text" value="" name="last_name" id="last_name" class="form-control" >
                                                </div>
                                            </div>


                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label for=""><span class="text-danger">* </span>Email</label>
                                                    <input type="email" value="" name="email_address" id="email_address" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label for=""><span class="text-danger">* </span>Select User Type</label>
                                                    <!-- <input type="text" value="" id="status" class="form-control" > -->
                                                    <select name="userType" id="userType" class="form-control" >
                                                        <option value="">Select User Type:</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label for=""><span class="text-danger">* </span>Password</label>
                                                    <input type="password" value="" name="password" id="email_address" class="form-control" >
                                                </div>

                                                <div class="col-md-6">
                                                    <label for=""><span class="text-danger">* </span>Confirm Password</label>
                                                    <input type="password" value="" name="cpassword" id="email_address" class="form-control" >
                                                </div>
                                            </div>

                                            

                                            <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                                <input type="submit" name="addBtn" id="addBtn" value="Submit" class="btn btn-info">

                                                <!-- Dito na tayo sa form ang pag eedit ng status  -->
                                            </div>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>


                                <div class="table-container mt-3">
                                    <table class="table table-hover table-border table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center d-none" style="font-size: 20px; font-weight: 700">ID</th>
                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">FIRST NAME</th>
                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">LAST NAME</th>
                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">EMAIL</th>
                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">USER TYPE</th>
                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">DATE CREATED</th>
                                                <th scope="col" class="text-center" style="font-size: 20px; font-weight: 700">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cartTable">
                                            
                                            <?php if($result->num_rows > 0){?>
                                                <?php while($row = $result->fetch_assoc()){?>
                                            <tr>
                                                <td class="text-center d-none" style="font-size: 20px;" ><?php echo $row['officials_Id'];?></td>
                                                <td class="text-center" style="font-size: 20px;" ><?php echo $row['first_name'];?></td>
                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['last_name'];?></td>
                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['email_address'];?></td>
                                                <td class="text-center" style="font-size: 20px;"><?php echo $row['user_type'];?></td>
                                                <td class="text-center" style="font-size: 20px;"><?php echo date("F j Y", strtotime($row['date_created']));?></td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <button type="button" class="btn btn-secondary editBtn" data-toggle="modal" data-target="#edit<?php echo $row['officials_Id'];?>"> EDIT</button>
                                                </td>

                                                <!-- Modal -->
                                            <div class="modal fade" id="edit<?php echo $row['officials_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="edit-form">
                                                            <div class="row">

                                                                <input type="text" value="<?php echo $row['officials_Id'];?>" name="edit_officials_Id" id="officials_Id " class="form-control d-none " >

                                                                <div class="col-md-6">
                                                                    <label for="">First Name</label>
                                                                    <input type="text" value="<?php echo $row['first_name'];?>" name="edit_first_name" id="first_name" class="form-control" >
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="">Last Name</label>
                                                                    <input type="text" value="<?php echo $row['last_name'];?>" name="edit_last_name" id="last_name" class="form-control" >
                                                                </div>
                                                            </div>


                                                            <div class="row mt-3">
                                                                <div class="col-md-12">
                                                                    <label for="">Email</label>
                                                                    <input type="email" value="<?php echo $row['email_address'];?>" name="edit_email_address" id="email_address" class="form-control" >
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-12">
                                                                    <label for="">Select User Type</label>
                                                                    <!-- <input type="text" value="" id="status" class="form-control" > -->
                                                                    <select name="edit_userType" id="userType" class="form-control" >
                                                                        <option value="<?php echo $row['user_type'];?>"><?php echo $row['user_type'];?></option>
                                                                        <option value="Staff">Staff</option>
                                                                        <option value="Admin">Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-12">
                                                                    <label for="">Date Created</label>
                                                                    <input type="text" value="<?php echo $row['date_created'];?>" name="capacity" id="capacity" class="form-control" readonly="true">
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                                                <input type="submit" name="editBtn" id="editBtn" value="Update" class="btn btn-info">

                                                                <!-- Dito na tayo sa form ang pag eedit ng status  -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                                </div>

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
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Sweetalert Cdn Start -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->

    <!-- Bootstrap Select Picker -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>

        $(document).ready(function(){

            $("#addBtn").click(function(e){
            console.log("napindot");
            e.preventDefault();

            $.ajax({
                url: "../processPhp/add_process.php",
                method: "POST",
                data: $("#add-form").serialize() + "&action=addAccount",
                success : function (response){
                    if(response == "addedSuccess"){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Added Account!',
                            showConfirmButton: false,
                            timer: 1300  
                        }).then(function(){
                            window.location = "accounts.php";
                        })
                    }

                    else if(response == "error"){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'There is an error Please try again Thankyou!',
                            showConfirmButton: false,
                            timer: 1300  
                        })
                    }

                    else if(response == "sameemail"){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'The email is already registered. Please try again Thankyou!',
                            showConfirmButton: false,
                            timer: 2500  
                        })
                    }

                    else if(response == "NotEqual"){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Make sure the password and confirm password is same. Please try again Thankyou!',
                            showConfirmButton: false,
                            timer: 3000  
                        })
                    }
                }
            })

        })

            // console.log("Hello World")
        $("#editBtn").click(function(e){
            console.log("napindot");
            e.preventDefault();

            $.ajax({
                url: "../processPhp/edit_process.php",
                method: "POST",
                data: $("#edit-form").serialize() + "&action=editAccount",
                success : function (response){
                    if(response == "editedSuccess"){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Edited Account!',
                            showConfirmButton: false,
                            timer: 1300  
                        }).then(function(){
                            window.location = "accounts.php";
                        })
                    }

                    else if(response == "error"){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'There is an error Please try again Thankyou!',
                            showConfirmButton: false,
                            timer: 1300  
                        })
                    }
                }
            })

        })

        })

        

    </script>

</body>
</html>