<h5 id="msg"></h5>
<div class="form-group">
    <label>Sub Category Type Name</label>
    <input type="text" value="" name="name" id="sub_name" class="form-control" />
</div>

<div class="form-group">
    <label>Sub Category Type Code</label>
    <input type="text" name="code" id="sub_code" value="" class="form-control" />
</div>

<div class="form-group">
    <label>Sub Category Type details</label>
    <input type="text" name="details" id="sub_details" value="" class="form-control" />
</div>


<script>
    $(document).ready(function() {
        var name = localStorage.getItem('name');
        var code = localStorage.getItem('code');
        var sub_details = localStorage.getItem('details');
        // document.getElementById("nobir").innerHTML = "yes possible";
        // $('#nobir').html("name");
        // alert(name);
        //var id = localStorage.getItem('id');
        $('#sub_name').val(name);
        $('#sub_code').val(code);
        $('#sub_details').val(sub_details);

        //   $('#gender').val(gender);
        //   $('#designation').val(designation);
        //   $('#age').val(age);
        //   if(images != '')
        //   {
        //    $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
        //    $('#hidden_images').val(images);
        //   }
    });
</script>