<?php
include("../../Module/DB_conn.php");

$output = '';
$page = '';
$row_per_page = 5;
if (isset($_POST['page'])) {
   $page = $_POST['page'];
} else {
   $page = 1;
}
$start_page = ($page - 1) * $row_per_page;

$output .= " <div>
  <table class='table table-hover'>
  <thead>
  <tr>
        <th>Categories Name</th>
        <th>Categories Code</th>
        <th>Sub Categories Name</th>
        <th>Sub Categories Code</th>
        <th>Sub Categories Details</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
  </thead>";

$sql2 = "SELECT cat_fsub_id,categories.cat_name,categories.cat_code,sub_category.sub_cat_name,sub_category.sub_cat_code,sub_category.sub_cat_details FROM ((cat_sub INNER JOIN categories on cat_sub.cat_id = categories.cat_id) INNER JOIN sub_category on cat_sub.sub_cat_id = sub_category.sub_cat_id) ORDER BY cat_fsub_id DESC LIMIT $start_page,$row_per_page";

$execute = mysqli_query($conn, $sql2);
$row_no = $execute->num_rows;
if ($execute) {

   while ($row = mysqli_fetch_assoc($execute)) {
      $id = $row['cat_fsub_id'];
      $id = (string)$id;
      $ciphering = "AES-128-CTR";
      $encription_key = "1413348874";
      $option = 0;
      $encription_iv = "1988406007151846";

      $encript_id = openssl_encrypt($id, $ciphering, $encription_key, $option, $encription_iv);

      $output .= "<tbody>
                  <tr>
                  <td class='" . $encript_id . "'>" . $row['cat_name'] . "</td>
                  <td class='" . $encript_id . "'>" . $row['cat_code'] . "</td>
                  
                  <td class='" . $encript_id . "'>" . $row['sub_cat_name'] . "</td>
                  <td class='" . $encript_id . "'>" . $row['sub_cat_code'] . "</td>
                  <td class='" . $encript_id . "'>" . $row['sub_cat_details'] . "</td>

                  <td> <a href= '  ./php_controler/edit.php?id=" . $encript_id . "' class='btn btn-success'>Edit</a> </td>
                  <td class='btn btn-danger' id='" . $encript_id . "'>Delete</td>
                  </tr>
                  </tbody>
            ";
      // <!--  echo "<tr>"; 
      //   echo "<td> ".$row['cat_name']." </td>";
      //   echo "<td> ".$row['cat_code']." </td>";
      //   echo '<td class="btn btn-success"> <a href= "  ./php_controler/edit.php?id='.$row['id'].'">Edit</a></td>';

      //   echo "</tr>";-->

   }
   $output .= "</table></div> <div>";
   $sql = "SELECT * FROM cat_sub ORDER by cat_fsub_id DESC";
   $page_result = mysqli_query($conn, $sql);
   $total_page = mysqli_num_rows($page_result);
   $page_number = ceil($total_page / $row_per_page);
   for ($i = 1; $i <= $page_number; $i++) {
      $output .= "<button class='pagination_link' id='" . $i . "'>$i</button> &#160;";
   }
   $output .= "</div>";


   echo $output;
} else {
   echo "Data base execute err";
}
