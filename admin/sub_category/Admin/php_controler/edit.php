     <?php
        include("../../Module/DB_conn.php");
        ?>
     <?php
        // $cat_name = $cat_code = "";
        //  if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST['id'];
        // $name = $_POST['name'];
        // $code = $_POST['code'];

        $success = $err = $exist = '';


        function check($input_value)
        {
            $data = htmlspecialchars($input_value);
            $data = stripslashes($input_value);
            $data = trim($input_value);
            return $data;
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sub_cat_name = check($_POST["name"]);
            $sub_cat_code = check($_POST["code"]);
            $sub_cat_details = check($_POST["details"]);

            $sql1 = "SELECT * FROM sub_category WHERE sub_cat_code='$sub_cat_code' ";
            $execute1 = mysqli_query($conn, $sql1);
            if ($execute1->num_rows > 0) {
                echo "These values are existed";
            } else {

                $sql = "UPDATE sub_category SET sub_cat_name='$sub_cat_name',sub_cat_code='$sub_cat_code',sub_cat_details='$sub_cat_details'  WHERE sub_cat_id ='$id'";
                $statment = mysqli_query($conn, $sql);
                if ($statment) {

                    $success = "Sucessfully Updaded";
                    echo $success;
                    // header("location: ../sub_category.php");
                } else {
                    $err = "Opps err";
                    echo $err;
                }
            }
        }








        ?>
