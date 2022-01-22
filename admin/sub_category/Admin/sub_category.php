<?php

// include_once("./php_controler/insert.php");

?>


<!DOCTYPE html>
<html>




<!--//&......... head Part...................... -->
<?php
include("../view/layout/head.php");
?>

<body>
  <div class="wrapper">

    <!-- <a href=""></a> -->


    <!--//& ..........Sidebar Holder -->
    <?php
    include("../view/Layout/sideNavBar.php");
    ?>





    <div id="content">

      <!--//& ..........Navbar Holder -->
      <?php
      include("../view/Layout/navbar.php");
      ?>





      <!-- //&..........Body Content Holder................... -->
      <?php
      include("../view/Layout/body_content.php");
      ?>
    </div>
  </div>







  <!-- //&..........  foot part ...........................-->
  <?php
  include("../view/Layout/foot.php");
  ?>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./Controler/JsControler.js"></script> -->

</body>

</html>