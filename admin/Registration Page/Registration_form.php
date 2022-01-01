<!-- <?php

        //include_once("../php_controler/registration.php")
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
</head>

<body>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <input type="submit" name="" value="Login" /><br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Registration </h3>



                        <form name="form">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <!-- Main Messege -->
                                    <span id="main_msg" style="color: red;" align="center"></span>
                                    <!--  Name  -->
                                    <span id="name_msg" style="color: red;"></span>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Fullt Name *" value="" />
                                    </div>

                                    <!-- Password            -->
                                    <span id="password_msg" style="color: red;"></span>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="Password *" value="" />
                                    </div>

                                    <!-- Confirm password  -->
                                    <span id="f_fassword_msg" style="color: red;"></span>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="f_password" placeholder="Confirm Password *" value="" onchange="pass_match()" />
                                    </div>

                                    <!-- Gender  -->
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" id="gender" value="male" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" id="gender" value="female">
                                                <span>Female </span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- file Upload -->
                                    <span id="file_msg" style="color: red;"></span>
                                    <div class="form-group">
                                        <input type="file" id="file" value="" onchange="pass_match()" />
                                        <input type="button" id="file_button" class="btn btn-secondery" value="upload" onclick="upload()" />
                                        <div id="image" style="border-color: black; border: 1px solid; height: 110px; width: 100px; margin-left: 100px;">
                                            <img src="" alt="">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <!-- E-mail  -->
                                    <span id="main_msg" style="color: red;"></span>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" value="" />
                                    </div>

                                    <!-- Phone Number  -->
                                    <span id="main_msg" style="color: red;"></span>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                                    </div>

                                    <!-- Question  -->
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option class="hidden" selected disabled>Please select your Sequrity Question</option>
                                            <option>What is your Birthdate?</option>
                                            <option>What is Your old Phone Number</option>
                                            <option>What is your Pet Name?</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Your Answer *" value="" />
                                    </div>
                                    <!-- Submit Button Onclick event -->
                                    <input type="button" class="btnRegister" value="Register" onclick="Value_re()" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Hirer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div> -->
                </div>
            </div>
        </div>

    </div>
    <script src="../JS Controler/registration.js"></script>
</body>

</html>