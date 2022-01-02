<?php
include("../Module/DB_conn.php");
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


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <h3>Add Cat Sub Categories</h3>
            </div>
            <span id="emptyAll" style="color:red;"></span>

            <form class="shadow p-4">
                <div class="mb-3">
                    <label for="cat_name">Category Name</label><span style='color:red' ;> * </span>


                    <select class="form-control" name="cat_name" id="cat_name" value=" ">
                        <?php
                        // if (isset($output1)) {
                        echo $output1;
                        // }
                        ?>

                    </select>
                    <span id="emptyName" style="color:red;"></span>
                </div>

                <div class="mb-3">

                    <label for="sub_cat_name">Sub Category Name</label><span style='color:red' ;> * </span>

                    <select class="form-control" name="name" id="sub_cat_name">

                        <?php
                        echo $output2;
                        ?>

                    </select>

                    <span id="emptyCode" style="color:red;"></span>
                </div>


                <div class="mb-3">
                    <span id="msg" style="display: none;">Data Successfully Inserted</span>
                    <button type="button" class="btn btn-primary" onclick="DataInsert()">Add Cat-Sub Category</button>
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
                <!-- <table class="table table-hover">
    <thead>
    <tr id="show_divt" style="display: none;">
        <th>Categories Name</th>
        <th align="center">Categories Code</th>
      </tr>
    </thead>
    <tbody>
    <tr id="show_data">
     
    </tr>
   //show data from show.php by javascript
    </tbody>
  </table> -->
            </div>
        </div>
    </div>
</div>