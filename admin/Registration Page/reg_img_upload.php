<?php
if(isset($_POST["file"]["name"])){
    $file_name =$_POST["file"]["name"];
    echo $file_name;
}
else{
    echo "file not uploaded";
}

?>
