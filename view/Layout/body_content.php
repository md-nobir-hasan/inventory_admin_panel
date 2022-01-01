<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <h3>Add Categories</h3>
            </div>
            <span id="emptyAll" style="color:red;"></span>

            <form class="shadow p-4">
                <div class="mb-3">
                    <label for="cat_name">Category Name</label><span style='color:red' ;> * </span><?php if (!empty($errmsg1)) {
                                                                                                        echo $errmsg1;
                                                                                                    } ?>
                    <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Category Name">
                    <span id="emptyName" style="color:red;"></span>
                </div>

                <div class="mb-3">
                    <label for="cat_details">Category code</label><span style='color:red' ;> * </span> <?php if (!empty($errmsg2)) {
                                                                                                            echo $errmsg2;
                                                                                                        } ?>
                    <input type="text" value="<?php if (!empty($cat_code)) {
                                                    echo $cat_code;
                                                } ?>" class="form-control" name="cat_code" id="cat_code" placeholder="Category Code">
                    <span id="emptyCode" style="color:red;"></span>
                </div>

                <div class="mb-3">
                    <span id="msg" style="display: none;">Data Successfully Inserted</span>
                    <button type="button" class="btn btn-primary" onclick="DataInsertj()">Add Category</button>
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