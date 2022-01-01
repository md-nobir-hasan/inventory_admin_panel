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
        <th>Sub Categories Name</th>
        <th>Sub Categories Code</th>
        <th>Sub Categories Code</th>
        <th>Edit Sub Categories details</th>
        <th>Delete Sub Categories</th>
     </tr>
  </thead>";

$sql2 = "SELECT * FROM `sub_category` ORDER by id DESC limit $start_page,$row_per_page";
$execute = mysqli_query($conn, $sql2);
$row_no = $execute->num_rows;
if ($execute) {

   while ($row = mysqli_fetch_assoc($execute)) {
      $id = $row['id'];

      $output .= "<tbody>
                  <tr>
                  <td class='" . $row['id'] . "'>" . $row['sub_cat_name'] . "</td>

                  <td class='" . $row['id'] . "'>" . $row['sub_cat_code'] . "</td>

                  <td class='" . $row['id'] . "'>" . $row['sub_cat_details'] . "</td>

                  <td> <a href= '  ./php_controler/edit.php?id=" . $row['id'] . "' class='btn btn-success'>Edit</a> </td>
                  <td class='btn btn-danger' id='" . $row['id'] . "'>Delete</td>
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
   $sql = "SELECT * FROM `sub_category` ORDER by id DESC";
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
