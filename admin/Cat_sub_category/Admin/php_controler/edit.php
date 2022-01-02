     <?php
        include("../../Module/DB_conn.php");
        ?>
     <?php
        $output1 = "";
        $output2 = "";
        $sql1 = $sql2 = "SELECT * FROM `categories`";
        $sql2 = $sql2 = "SELECT * FROM `sub_category`";
        $execute1 = mysqli_query($conn, $sql1);
        $execute2 = mysqli_query($conn, $sql2);


        if ($execute1) {
            while ($row = mysqli_fetch_assoc($execute1)) {
                $id = $row['cat_id'];
                $name = $row['cat_name'];
                $code = $row['cat_code'];
                $output1 .= "<option value='" . $name . "' id='" . $id . "'>" . $name . "</option>";
            }
        }

        if ($execute2) {
            while ($row = mysqli_fetch_assoc($execute2)) {
                $id = $row['sub_cat_id'];
                $name = $row['sub_cat_name'];
                $code = $row['sub_cat_code'];
                $details = $row['sub_cat_details'];

                $output2 .= "<option value='" . $name . "' id='" . $id . "'>" . $name . "</option>";
            }
        }
        ?>


     <?php
        $cat_name = $cat_code = "";
        $id = $_GET["id"];

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
            $sub_cat_name = check($_POST["sub_cat_name"]);

            $sql1 = "SELECT * FROM categories WHERE cat_name='" . $cat_name . "'";
            $execute1 = mysqli_query($conn, $sql1);
            if ($execute1) {
                $db_value = mysqli_fetch_assoc($execute1);

                $cat_id = $db_value['cat_id'];
                $cat_name_db = $db_value['cat_name'];
            } else {
                echo "categories table cann't connect";
            }

            // Sub-category table transection
            $sql2 = "SELECT * FROM sub_category WHERE sub_cat_name='" . $sub_cat_name . "'";
            $execute2 = mysqli_query($conn, $sql2);

            if ($execute2) {
                $db_value = mysqli_fetch_assoc($execute2);

                $sub_cat_id = $db_value['sub_cat_id'];
                $sub_cat_name_db = $db_value['sub_cat_name'];
            } else {
                echo "sub category table can't connect";
            }

            $sql = "SELECT * FROM cat_sub";
            $execute = mysqli_query($conn, $sql);
            if ($execute) {

                $db_value = mysqli_fetch_assoc($execute);
                $cat_id_vali = $db_value['cat_id'];
                $sub_cat_id_vali = $db_value['sub_cat_id'];

                if ($cat_id_vali == $cat_id && $sub_cat_id_vali == $sub_cat) {
                    $exist = "This value is exist";
                } else {

                    $sql = "UPDATE cat_sub SET cat_id='$cat_id',sub_cat_id='$sub_cat_id'  WHERE cat_fsub_id='$id'";
                    $statment = mysqli_query($conn, $sql);
                    if ($statment) {

                        $success = "Sucessfully Updaded";
                        header("location: ../cat_sub_category.php");
                    } else {
                        $err = "Opps err";
                    }
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
                 <div class="col-md-6">
                     <div class="mb-3">
                         <h3>Update Cat Sub Categories</h3>
                         <?php
                            if (isset($success)) {
                                echo $success;
                            } elseif ($exist) {
                                echo $exist;
                            } else {
                                echo $err;
                            }
                            ?>
                     </div>
                     <span id="emptyAll" style="color:red;"></span>

                     <form method="POST" action="#" class="shadow p-4">
                         <div class="mb-3">
                             <label for="cat_name">Category Name</label><span style='color:red' ;> * </span>


                             <select class="form-control" name="cat_name" id="cat_name">
                                 <?php
                                    if (isset($output1)) {
                                        echo $output1;
                                    }
                                    ?>

                             </select>
                             <span id="emptyName" style="color:red;"></span>
                         </div>

                         <div class="mb-3">

                             <label for="sub_cat_name">Sub Category Name</label><span style='color:red' ;> * </span>

                             <select class="form-control" name="sub_cat_name" id="sub_cat_name">

                                 <?php
                                    echo $output2;
                                    ?>

                             </select>

                             <span id="emptyCode" style="color:red;"></span>
                         </div>


                         <div class="mb-3">
                             <span id="msg" style="display: none;">Data Successfully Inserted</span>
                             <button type="submit" class="btn btn-primary">Update Cat-Sub Category</button>
                         </div>
                         <span id="errmsg" style="display: none; color:red">Data is not inserted</span>



                     </form>
                 </div>
                 <div>

                     <!-- //^Show Table -->
                     <div class="container">
                         <h2 id="show_div">Show Data</h2>
                         <div id="show_data">

                         </div>
                     </div>
                 </div>
             </div>
         </div>


     </body>

     </html>