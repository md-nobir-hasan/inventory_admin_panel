     <?php
        include("../../Module/DB_conn.php");
        ?>
     <?php
        $cat_name = $cat_code = "";
        //  if($_SERVER["REQUEST_METHOD"]=="POST"){
        $encrition_id = $_GET["id"];
        $ciphering = "AES-128-CTR";
        $encription_key = "1413348874";
        $option = 0;
        $encrition_iv = "1988406007151846";
        $id = openssl_decrypt($encrition_id, $ciphering, $encription_key, $option, $encrition_iv);


        $sqle = "SELECT * FROM sub_category WHERE sub_cat_id =$id";
        $exequtee = mysqli_query($conn, $sqle);
        if ($exequtee) {

            $data = mysqli_fetch_assoc($exequtee);
            $cat_name = $data['cat_name'];
            $cat_code = $data['cat_code'];
        } else {
            echo "id: $id";
            echo  " don't exequte";
        }

        $success = $err = $exist = '';


        function check($input_value)
        {
            $data = htmlspecialchars($input_value);
            $data = stripslashes($input_value);
            $data = trim($input_value);
            return $data;
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cat_name = check($_POST["cat_name"]);
            $cat_code = check($_POST["cat_code"]);
            echo $cat_code;


            $sql1 = "SELECT * FROM sub_category WHERE sub_cat_code='$cat_code' ";
            $execute1 = mysqli_query($conn, $sql1);
            if ($execute1->num_rows > 0) {
                $exist = "<span style='color:red; size:20px'>Try another code</span>";
            } else {

                $sql = "UPDATE sub_category SET sub_cat_name='$cat_name',sub_cat_code='$cat_code',sub_cat_details='$sub_cat_details'  WHERE sub_cat_id ='$id'";
                $statment = mysqli_query($conn, $sql);
                if ($statment) {

                    $success = "Sucessfully Updaded";
                    echo $success;
                    header("location: ../index.php");
                } else {
                    $err = "Opps err";
                    echo $err;
                }
            }
        }








        ?>

     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">

         <title>Collapsible sidebar using Bootstrap 4</title>

         <!-- Bootstrap CSS CDN -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
         <!-- Our Custom CSS -->

         <!-- Font Awesome JS -->
         <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
         <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

     </head>

     <body>


         <div class="container mt-5">
             <div class="row">
                 <div class="col-md-6 offset-md-3">
                     <div class="mb-3">
                         <h3>Update Categories</h3>
                     </div>
                     <span id="emptyAll" style="color:red;"></span>

                     <form class="shadow p-4" method="POST">
                         <div class="mb-3">
                             <label for="cat_name">Category Name</label><span style='color:red' ;> * </span><?php if (!empty($errmsg1)) {
                                                                                                                echo $errmsg1;
                                                                                                            } ?>
                             <input type="text" class="form-control" name="cat_name" id="cat_name" value="<?php echo $cat_name; ?>">
                             <span id="emptyName" style="color:red;"></span>
                         </div>

                         <div class="mb-3">
                             <label for="cat_code">Category code</label><span style='color:red' ;> * </span> <?php if (!empty($errmsg2)) {
                                                                                                                    echo $errmsg2;
                                                                                                                } ?>
                             <input type="text" value="<?php echo $cat_code ?>" class="form-control" name="cat_code" id="cat_code">
                         </div>

                         <div class="mb-3">
                             <span id="msg" style="display: none; color:violet;">Data Successfully Inserted</span>
                             <button type="submit" class="btn btn-primary">Update Category</button>
                             <?php echo $exist; ?>
                         </div>

                     </form>
                 </div>
             </div>
         </div>


     </body>

     </html>


     <!-- <?php
            include("../../view/Layout/head.php");
            ?> -->