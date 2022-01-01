$(document).ready(
    function() {
        show_data();
    }

)

function DataInsertj() {
    var cat_name = document.getElementById("cat_name").value;
    var cat_code = document.getElementById("cat_code").value;

    if (cat_name == "" & cat_code == "") {
        var emty_all = " fill up the form";
        document.getElementById("emptyAll").innerHTML = emty_all;
        document.getElementById("emptyAll").style.display = "block";
        document.getElementById("emptyName").style.display = "none";
        document.getElementById("emptyCode").style.display = "none";
    } else if (!cat_name.match(/([A-Za-z]){1,20}/)) {
        var emty_name = "Name fill up with only letter with in 15 character";
        document.getElementById("emptyName").innerHTML = emty_name;
        document.getElementById("emptyName").style.display = "block";
        document.getElementById("emptyAll").style.display = "none";
        document.getElementById("emptyCode").style.display = "none";
    } else if (!cat_code.match(/([A-Za-z1-9]){4}/)) {
        var emty_code = "fill up code's length must be 4 with character or/and letter ";
        document.getElementById("emptyCode").innerHTML = emty_code;
        document.getElementById("emptyCode").style.display = "block";
        document.getElementById("emptyAll").style.display = "none";
        document.getElementById("emptyName").style.display = "none";

    } else {
        document.getElementById("emptyAll").style.display = "none";
        document.getElementById("emptyName").style.display = "none";
        document.getElementById("emptyCode").style.display = "none";
        document.getElementById("show_div").style.display = "block";
        // document.getElementById("show_divt").style.display="block";



        $.ajax({
            method: "POST",
            url: "./php_controler/insert.php",
            data: {
                name: cat_name,
                code: cat_code
            },
            success: function(data) {

                show_data();

                if (data == 1) {
                    alert("This code is exist .Try another.");
                } else if (data == 2) {
                    document.getElementById("msg").style.display = "block";
                } else {
                    document.getElementById("errmsg").style.display = "block";
                }



            }
        })

    }
}

function show_data() {
    $.ajax({
        cache: false,
        url: "./php_controler/shows.php",
        method: "POST",
        success: function(data) {
            $("#show_data").html(data);
        }
    });
}

function pagination(page) {
    $.ajax({
        url: "./php_controler/shows.php",
        method: "POST",
        data: { page: page },
        success: function(data) {
            //   alert(data);
            $("#show_data").html(data);
        }
    });
}

$(document).on("click", ".pagination_link", function() {
    var page = $(this).attr("id");
    //   alert(page);
    pagination(page);
})