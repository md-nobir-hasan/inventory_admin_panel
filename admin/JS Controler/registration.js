function Value_re() {
    var Name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var f_password = document.getElementById("f_password").value;
    // var gender = document.getElementById("gender").value;

    // alert(f_password);
    // alert(l_Name);
    // alert(gender);
    if (Name == "" && password == "" && f_password == "") {
        document.getElementById("main_msg").innerHTML = "Please Fill up The Form";
    } else if (Name == "") {
        document.getElementById("name_msg").innerHTML = "Please Fill up First Name";
    } else if (Name.length < 5) {
        document.getElementById("name_msg").innerHTML = "Name should be getter than 4 letter";
    } else if (password == '') {
        document.getElementById("password_msg").innerHTML = "Please Fill up Password";

    } else if (f_password == '') {
        document.getElementById("f_fassword_msg").innerHTML = "Please Fill up Confirm Password";

    } else {
        $full_name = Name.charAt(0).toUpperCase() + Name.slice(1);
        alert($full_name);


    }

}

function pass_match() {
    var password = document.forms['form']['password'].value;
    var f_password = document.forms['form']['f_password'].value;
    if (password != "" && f_password != "") {

        if (password == f_password) {
            document.getElementById("f_fassword_msg").innerHTML = "Password match";
            document.getElementById("f_fassword_msg").style.color = 'green';
        } else {

            document.getElementById("f_fassword_msg").innerHTML = "Password don't match";
            document.getElementById("f_fassword_msg").style.color = 'red';
        }
    }
}

function upload() {

    var fd = new FormData();
    var files = $("#file")[0].files;
    // alert(files);

    if (files.length > 0) {
        fd.append("file", files[0]);

        $.ajax({
            url: "../php_controler/upload.php",
            type: "post",
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 2) {
                    $("#img").attr("src", response);
                    $("$image").show();
                } else {
                    alert("image not uploaded yet");
                }
            }

        });

    }


}