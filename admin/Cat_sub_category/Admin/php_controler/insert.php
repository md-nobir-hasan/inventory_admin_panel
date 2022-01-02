 <?php

   //^  Database Connect
   include("../../Module/DB_conn.php");
   ?>

 <?php

   $success = $err = '';

   function check($input_value)
   {
      $data = htmlspecialchars($input_value);
      $data = stripslashes($input_value);
      $data = trim($input_value);
      return $data;
   }


   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $cat_name = check($_POST["name"]);
      $Sub_cat_name = check($_POST["name2"]);
      // Sub-category table transection
      $sql1 = "SELECT * FROM categories WHERE cat_name='" . $cat_name . "'";
      $execute1 = mysqli_query($conn, $sql1);
      if ($execute1) {
         $db_value = mysqli_fetch_assoc($execute1);
         $cat_id_db = $db_value['cat_id'];
         $cat_name_db = $db_value['cat_name'];
      } else {
         echo "categories table cann't connect";
      }

      // Sub-category table transection
      $sql2 = "SELECT * FROM sub_category WHERE sub_cat_name='" . $Sub_cat_name . "'";

      $execute2 = mysqli_query($conn, $sql2);

      if ($execute2) {
         $db_value = mysqli_fetch_assoc($execute2);
         $sub_cat_id_db = $db_value['sub_cat_id'];
         $sub_cat_name_db = $db_value['sub_cat_name'];
      } else {
         echo "sub category table can't connect";
      }
      //Cat-Sub-category table is used for validation
      $sql = "SELECT * FROM cat_sub";
      $execute = mysqli_query($conn, $sql);
      if ($execute) {
         $valu_db = mysqli_fetch_assoc($execute);
         $cat_id_vali = $valu_db['cat_id'];
         $sub_cat_id_vali = $valu_db['sub_cat_id'];


         if ($cat_id_vali == $cat_id_db && $sub_cat_id_vali == $sub_cat_id_db) {
            echo (2);
         } else {

            $sql = "INSERT INTO cat_sub (cat_id,sub_cat_id) VALUES(?,?)";

            $statment = mysqli_prepare($conn, $sql);
            if ($statment) {
               mysqli_stmt_bind_param($statment, "ii", $name, $code);
               $name = $cat_id_db;
               $code = $sub_cat_id_db;
               $execute = mysqli_stmt_execute($statment);
               if ($execute) {
                  echo (1);
               }
            }
         }
      } else {
         echo "<br> sub_cat table can't connect";
      }
   }





   ?>