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
      $cat_code = check($_POST["code"]);
      $sub_cat_details = check($_POST["details"]);

      $sql1 = "SELECT * FROM sub_category WHERE sub_cat_code='$cat_code'";
      $execute1 = mysqli_query($conn, $sql1);
      if ($execute1->num_rows > 0) {
         echo (1);
      } else {


         $sql = "INSERT INTO sub_category (sub_cat_name,sub_cat_code,sub_cat_details) VALUES(?,?,?)";

         $statment = mysqli_prepare($conn, $sql);
         if ($statment) {
            mysqli_stmt_bind_param($statment, "sss", $name, $code, $details);
            $name = $cat_name;
            $code = $cat_code;
            $details = $sub_cat_details;
            $execute = mysqli_stmt_execute($statment);
            if ($execute) {
               echo (2);
            } else {
               $err = "no";
            }
         }
      }
   }




   ?>