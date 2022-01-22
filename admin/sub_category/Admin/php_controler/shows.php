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
  <tr align='center'>
        <th>Sub Categories Name</th>
        <th>Sub Categories Code</th>
        <th>Sub Categories Code</th>
        <th align='center'>Action</th>
     </tr>
  </thead>";

$sql2 = "SELECT * FROM `sub_category` ORDER by sub_cat_id  DESC limit $start_page,$row_per_page";
$execute = mysqli_query($conn, $sql2);
// $row_no = $execute->num_rows;
if ($execute) {

   while ($row = mysqli_fetch_assoc($execute)) {
      $id = $row['sub_cat_id'];
      $id = (string)$id;
      $ciphering = "AES-128-CTR";
      $encription_key = "1413348874";
      $option = 0;
      $encription_iv = "1988406007151846";

      $encript_id = openssl_encrypt($id, $ciphering, $encription_key, $option, $encription_iv);

      $output .= "<tbody>
                  <tr>
                  <td value='' id='name' class='" . $encript_id . "'>" . $row['sub_cat_name'] . "</td>

                  <td id='code' class='" . $encript_id . "'>" . $row['sub_cat_code'] . "</td>

                  <td id='details' class='" . $encript_id . "'>" . $row['sub_cat_details'] . "</td>

                  <td><button id='{$encript_id}' type='button' class='edit btn btn-success'>Edit</button></td>

                  <td> <button id='{$encript_id}' type='button' class='Del btn btn-danger'>Delete</button></td>
                  </tr>
                  </tbody>
            ";
      // link 
      //<a href= '  ./php_controler/edit.php?id=" . $encript_id . "' class='edit btn btn-success'>Edit</a>
      // <!--  echo "<tr>"; 
      //   echo "<td> ".$row['cat_name']." </td>";
      //   echo "<td> ".$row['cat_code']." </td>";
      //   echo '<td class="btn btn-success"> <a href= "  ./php_controler/edit.php?id='.$row['id'].'">Edit</a></td>';

      //   echo "</tr>";-->

   }
   $output .= "</table></div> <div>";
   $sql = "SELECT * FROM `sub_category` ORDER by sub_cat_id  DESC";
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

?>

<script>
   $(document).ready(function() {
      $(".edit").on("click", function() {
         var encrition_id = $(this).attr('id');
         $.ajax({
            url: "./php_controler/data_fetch.php",
            method: "POST",
            data: {
               encrition_id: encrition_id
            },
            dataType: 'json',
            success: function(data) {
               // alert(data[0].sub_cat_id);
               localStorage.setItem("name", data[0].sub_cat_name);
               localStorage.setItem("code", data[0].sub_cat_code);
               localStorage.setItem("details", data[0].sub_cat_details);
               var options = {
                  ajaxPrefix: ''
               };
               new Dialogify('./php_controler/edit_data.php', options)
                  .title("Edit Sub Cat Type Data")
                  .buttons([{
                        text: "Cancle",
                        type: Dialogify.BUTTON_DANGER,
                        click: function(e) {
                           this.close();
                        }
                     },
                     {
                        text: 'Edit',
                        type: Dialogify.BUTTON_PRIMARY,
                        click: function(e) {
                           var form_data = new FormData();
                           form_data.append('name', $('#sub_name').val());
                           form_data.append('code', $('#sub_code').val());
                           form_data.append('details', $('#sub_details').val());
                           form_data.append('id', data[0].sub_cat_id);
                           // alert(JSON.stringify(form_data));
                           $.ajax({
                              method: "POST",
                              url: './php_controler/edit.php',
                              data: form_data,
                              // dataType:'json',
                              contentType: false,
                              cache: false,
                              processData: false,
                              success: function(value) {
                                 alert(value);
                                 $.ajax({
                                    cache: false,
                                    url: "./php_controler/shows.php",
                                    method: "POST",
                                    success: function(data) {
                                       $("#show_data").html(data);
                                    }
                                 });

                              }
                           });
                        }
                     }
                  ]).showModal();
            }
         });

      });
   });
</script>